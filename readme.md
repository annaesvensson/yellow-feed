# Feed 1.0.2

Feed with recent changes. Developed by Anna Svensson.

<p align="center"><img src="screenshot.png" alt="Screenshot" /></p>

## How to install an extension

[Download ZIP file](https://github.com/annaesvensson/yellow-feed/archive/refs/heads/main.zip) and copy it into your `system/extensions` folder. [Learn more about extensions](https://github.com/annaesvensson/yellow-update).

## How to use a feed

The feed is available on your website as `http://website/feed/` and `http://website/feed.xml`. The first link is a human readable feed and the second link is a machine readable feed, commonly known as an RSS feed. It's a list of recent changes for the entire website, only visible pages are included.

If you don't want that a page is visible, set `Status: unlisted` in the [page settings](https://github.com/annaesvensson/yellow-core#settings-page) at the top of a page.

## How to customise a feed

If you don't want to list the entire website in a feed, you can use different filters to customise a feed. The `author:` filter shows pages by a specific author. The `language:` filter shows pages in a specific language. The `tag:` filter shows pages with a specific tag. The `folder:` filter shows pages in a specific folder. You can also change the type of a feed in the settings. To make a blog feed open file `system/extensions/yellow-system.ini` and change `FeedRecentChanges: blog`. To make a wiki feed open file `system/extensions/yellow-system.ini` and change `FeedRecentChanges: wiki, wiki-start`.

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
    [RSS feed](/feed.xml).

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
    [RSS feed for Datenstrom](/feed/author:datenstrom/page:feed.xml).

Content file with link to feed, with a specific tag:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [See recent changes for example](/feed/tag:example/). 
    [RSS feed for example](/feed/tag:example/page:feed.xml).

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
    [RSS feed for help](/feed/folder:help/page:feed.xml).

Content file with unlisted page:

    ---
    Title: Unlisted page
    Status: unlisted
    ---
    This page is not visible in the feed.


Configuring different types of feeds in the settings:

```
FeedRecentChanges: auto
FeedRecentChanges: blog
FeedRecentChanges: blog, podcast, stream
FeedRecentChanges: wiki, wiki-start
```

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`:

`FeedLocation` = feed location  
`FeedXmlLocation` = feed location  s machine readable XML format  
`FeedPaginationLimit` = number of entries to show per page, 0 for unlimited  
`FeedRecentChanges` = layout(s) to show in the feed, `auto` for automatic detection, comma separated  

The following files can be customised:

`system/layouts/feed.html` = layout file for feed  

Do you have questions? [Get help](https://datenstrom.se/yellow/help/).
