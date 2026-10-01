<?php
// Feed extension, https://github.com/annaesvensson/yellow-feed

class YellowFeed {
    const VERSION = "1.0.2";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("feedLocation", "/feed/");
        $this->yellow->system->setDefault("feedXmlLocation", "/feed.xml");
        $this->yellow->system->setDefault("feedPaginationLimit", "30");
        $this->yellow->system->setDefault("feedRecentChanges", "auto");
    }
    
    // Handle request
    public function onRequest($scheme, $address, $base, $location, $fileName) {
        $statusCode = 0;
        if ($this->isFeedXmlLocation($location)) {
            $this->yellow->page->fileName = $this->yellow->lookup->findFileFromContentLocation($this->yellow->content->getHomeLocation($location), true).basename($this->yellow->system->get("feedXmlLocation"));
            $this->yellow->page->parseMeta("", 200);
            $this->yellow->language->set($this->yellow->page->get("language"));
            $this->onParsePageLayout($this->yellow->page, "feed");
            $this->yellow->page->setHeader("Last-Modified", $this->yellow->page->getLastModified(true));
            $statusCode = $this->yellow->sendData($this->yellow->page->statusCode, $this->yellow->page->headerData, $this->yellow->page->outputData);
        }
        return $statusCode;
    }

    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($name=="feed") {
            $pages = $this->yellow->content->index();
            if ($this->yellow->system->get("feedRecentChanges")!="auto") {
                $layouts = preg_split("/\s*,\s*/", $this->yellow->system->get("feedRecentChanges"));
                foreach ($pages as $pageFeed) {
                    $pageFeed->set("feedRecentChanges", in_array($pageFeed->get("layout"), $layouts) ? "show" : "hide");
                }
                $pages->filter("feedRecentChanges", "show");
            }
            $pagesFilter = array();
            if ($page->isRequest("tag")) {
                $pages->filter("tag", $page->getRequest("tag"));
                array_push($pagesFilter, $pages->getFilter());
            }
            if ($page->isRequest("author")) {
                $pages->filter("author", $page->getRequest("author"));
                array_push($pagesFilter, $pages->getFilter());
            }
            if ($page->isRequest("language")) {
                $pages->filter("language", $page->getRequest("language"));
                array_push($pagesFilter, $pages->getFilter());
            }
            if ($page->isRequest("folder")) {
                $pages->match("#/[\d\-\_\.]+".$page->getRequest("folder")."#i", false);
                array_push($pagesFilter, ucfirst($page->getRequest("folder")));
            }
            foreach ($pages as $pageFeed) {
                $feedGroup = $pageFeed->get($pageFeed->isExisting("published") ? "published" : "modified");
                $pageFeed->set("feedGroup", $feedGroup);
            }
            $pages->sort("feedGroup", false);
            if ($this->isFeedXmlLocation($page->location, $page->getRequest("page"))) {
                $paginationLimit = $this->yellow->system->get("feedPaginationLimit");
                if ($paginationLimit==0 || $paginationLimit>100) $paginationLimit = 100;
                $pages->limit($paginationLimit);
                if (!is_array_empty($pagesFilter) && $pages->isEmpty()) $page->error(404);
                if (!is_array_empty($pagesFilter)) {
                    $text = implode(" ", $pagesFilter);
                    $page->set("title", $text." - ".$this->yellow->system->get("sitename"));
                } else {
                    $page->set("title", $this->yellow->system->get("sitename"));
                }
                $page->setLastModified($pages->getModified());
                $page->setHeader("Content-Type", "application/rss+xml; charset=utf-8");
                $output = "<?xml version=\"1.0\" encoding=\"utf-8\"\077>\r\n";
                $output .= "<rss version=\"2.0\" xmlns:content=\"http://purl.org/rss/1.0/modules/content/\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\">\r\n";
                $output .= "<channel>\r\n";
                $output .= "<title>".$page->getHtml("title")."</title>\r\n";
                $output .= "<link>".$page->scheme."://".$page->address.$page->base."/"."</link>\r\n";
                $output .= "<description>".$this->yellow->language->getTextHtml("feedDescription")."</description>\r\n";
                $output .= "<language>".$page->getHtml("language")."</language>\r\n";
                foreach ($pages as $pageFeed) {
                    $timestamp = strtotime($pageFeed->get($pageFeed->isExisting("published") ? "published" : "modified"));
                    $content = $this->yellow->toolbox->createTextDescription($pageFeed->getContentHtml(), 0, false, "<!--more-->", "<a href=\"".$pageFeed->getUrl()."\">".$this->yellow->language->getTextHtml("blogMore")."</a>");
                    $output .= "<item>\r\n";
                    $output .= "<title>".$pageFeed->getHtml("title")."</title>\r\n";
                    $output .= "<link>".$pageFeed->getUrl()."</link>\r\n";
                    $output .= "<pubDate>".date(DATE_RSS, $timestamp)."</pubDate>\r\n";
                    $output .= "<guid isPermaLink=\"false\">".$pageFeed->getUrl()."?".$timestamp."</guid>\r\n";
                    $output .= "<dc:creator>".$pageFeed->getHtml("author")."</dc:creator>\r\n";
                    $output .= "<description>".$pageFeed->getHtml("description")."</description>\r\n";
                    $output .= "<content:encoded><![CDATA[".$content."]]></content:encoded>\r\n";
                    $output .= "</item>\r\n";
                }
                $output .= "</channel>\r\n";
                $output .= "</rss>\r\n";
                $page->setOutput($output);
            } else {
                if (!is_array_empty($pagesFilter)) {
                    $text = implode(" ", $pagesFilter);
                    $page->set("titleHeader", $text." - ".$page->get("sitename"));
                    $page->set("titleContent", $page->get("title").": ".$text);
                    $page->set("title", $page->get("title").": ".$text);
                }
                $page->setPages("feed", $pages);
                $page->setLastModified($pages->getModified());
            }
        }
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $feedXmlLocation = $this->yellow->system->get("coreServerBase").$this->getFeedXmlLocation($page->location);
            $output = "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"$feedXmlLocation\" title=\"".$page->getHtml("sitename")."\" />\n";
        }
        return $output;
    }
    
    // Return XML location
    public function getFeedXmlLocation($location) {
        return rtrim($this->yellow->content->getHomeLocation($location), "/").$this->yellow->system->get("feedXmlLocation");
    }
    
    // Check if XML format requested
    public function isFeedXmlLocation($location, $request = "") {
        $feedXmlLocation = $this->getFeedXmlLocation($location);
        return $location==$feedXmlLocation || $request==basename($feedXmlLocation);
    }
}
