# Feed 0.9.3

Feed with recent changes. Developed by Anna Svensson.

<p align="center"><img src="screenshot.png" alt="Screenshot"></p>

## How to install an extension

[Download ZIP file](https://github.com/annaesvensson/yellow-feed/archive/refs/heads/main.zip) and copy it into your `system/extensions` folder. [Learn more about extensions](https://github.com/annaesvensson/yellow-update).

## How to use a feed

The feed is available on your website as `http://website/feed/` and `http://website/feed/page:feed.xml`. The first link is a human readable feed and the second link is a machine readable feed, commonly known as an RSS feed. It's a list of recent changes for the entire website, only visible pages are included.

If you don't want that a page is visible, set `Status: unlisted` in the [page settings](https://github.com/annaesvensson/yellow-core#settings-page) at the top of a page.

## How to customise a feed

If you don't want to list the entire website in a feed, you can use different filters to customise a feed. You can also change the definition of recent changes. To make a blog feed open file `system/extensions/yellow-system.ini` and change `FeedRecentChanges: blog`. To make a wiki feed open file `system/extensions/yellow-system.ini` and change `FeedRecentChanges: wiki, wiki-start`.

## Examples

Content file with link to feed:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    [See recent changes](/feed/). 
    [RSS feed](/feed/page:feed.xml).

Content file with link to feed, by a specific author:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [See recent changes by Datenstrom](/feed/author:datenstrom/). 
    [RSS feed](/feed/author:datenstrom/page:feed.xml).

Content file with link to feed, for a specific tag:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [See recent changes for example](/feed/tag:example/). 
    [RSS feed](/feed/tag:example/page:feed.xml).

Content file with link to feed, in a specific folder:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [See recent changes in help](/feed/folder:help/). 
    [RSS feed](/feed/folder:help/page:feed.xml).

Layout file with link to feed, in a specific folder:

    <!DOCTYPE html>
    <html lang="<?php echo $this->yellow->page->getHtml("language") ?>">
    <head>
    <title><?php echo $this->yellow->page->getHtml("titleHeader") ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?php echo $this->yellow->page->getHtml("description") ?>" />
    <meta name="author" content="<?php echo $this->yellow->page->getHtml("author") ?>" />
    <meta name="generator" content="Datenstrom Yellow" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php echo $this->yellow->page->getExtraHtml("header") ?>
    <link rel="alternate" type="application/rss+xml" href="<?php echo $this->yellow->page->getBase(true)."/feed/folder:help/page:feed.xml" ?>" title="<?php echo "Help - ".$this->yellow->page->getHtml("sitename") ?>" />
    </head>
    ...

Configuring different filters in the settings:

```
FeedRecentChanges: auto
FeedRecentChanges: blog
FeedRecentChanges: blog, podcast, stream
FeedRecentChanges: wiki, wiki-start
```

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`:

`FeedLocation` = feed location  
`FeedFileXml` = file name for RSS feed  
`FeedPaginationLimit` = number of entries to show per page, 0 for unlimited  
`FeedRecentChanges` = layout(s) to show in the feed, `auto` for automatic detection, comma separated  

The following files can be customised:

`system/layouts/feed.html` = layout file for feed  
`system/layouts/header.html` = layout file for default HTML header  

Do you have questions? [Get help](https://datenstrom.se/yellow/help/).
