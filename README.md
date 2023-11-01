<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Feed 0.8.22

Feed with recent changes.

<p align="center"><img src="feed-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install an extension

[Download ZIP file](https://github.com/annaesvensson/yellow-feed/archive/main.zip) and copy it into your `system/extensions` folder. [Learn more about extensions](https://github.com/annaesvensson/yellow-update).

## How to use a feed

The feed is available on your website as `http://website/feed/` and `http://website/feed/page:feed.xml`. It's a feed for the entire website, only visible pages are included.

If you don't want that a page is visible, set `Status: unlisted` in the [page settings](https://github.com/annaesvensson/yellow-core#settings-page) at the top of a page.

## How to customise a feed

If you don't want to list the entire website in a feed, you can use different filters to customise a feed. The `author:` filter shows pages by a specific author. The `language:` filter shows pages in a specific language. The `tag:` filter shows pages with a specific tag. The `folder:` shows finds pages in a specific folder. 

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

Layout file with additional link to blog feed:

    <!DOCTYPE html>
    <html lang="<?php echo $this->yellow->page->getHtml("language") ?>">
    <head>
    <title><?php echo $this->yellow->page->getHtml("titleHeader") ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?php echo $this->yellow->page->getHtml("description") ?>" />
    <meta name="author" content="<?php echo $this->yellow->page->getHtml("author") ?>" />
    <meta name="generator" content="Datenstrom Yellow" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="alternate" type="application/rss+xml" href="<?php echo $this->yellow->page->getBase(true)."/feed/folder:blog/page:feed.xml" ?>" />
    <?php echo $this->yellow->page->getExtraHtml("header") ?>
    </head>
    ...

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`:

`FeedLocation` = feed location  
`FeedFileXml` = file name for RSS feed  
`FeedPaginationLimit` = number of entries to show per page, 0 for unlimited  

The following files can be customised:

`system/layouts/feed.html` = layout file for feed  
`system/layouts/header.html` = layout file for default HTML header  

## Developer

Anna Svensson. [Get help](https://datenstrom.se/yellow/help/).
