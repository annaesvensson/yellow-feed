<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Feed 0.8.25

Feed med senaste ändringarna

<p align="center"><img src="feed-screenshot.png?raw=true" alt="Skärmdump"></p>

## Hur man installerar ett tillägg

[Ladda ner ZIP-filen](https://github.com/annaesvensson/yellow-feed/archive/refs/heads/main.zip) och kopiera den till din `system/extensions` mapp. [Läs mer om tillägg](https://github.com/annaesvensson/yellow-update/tree/main/README-sv.md).

## Hur man använder en feed

Feeden finns tillgängligt på din webbplats som `http://website/feed/` och `http://website/feed/page:feed.xml`. Det är en feed för hela webbplatsen, endast synliga sidor ingår.

Om du inte vill att en sida ska synas, ställ in `Status: unlisted` i [sidinställningar](https://github.com/annaesvensson/yellow-core/tree/main/README-sv.md#inställningar-page) högst upp på en sida.

## Hur man anpassar en feed

Om du inte vill lista hela webbplatsen i feeden, kan du använda olika filter för att anpassa feeden. Du kan också ändra definitionen av senaste ändringarna. För att skapa en bloggfeed öppna filen `system/extensions/yellow-system.ini` och ändra `FeedRecentChanges: blog`. För att skapa en wikifeed öppna filen `system/extensions/yellow-system.ini` och ändra `FeedRecentChanges: wiki, wiki-start`.

## Exempel

Innehållsfil med länk till feed:

    ---
    Title: Exempelsida
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    [Se senaste ändringarna](/feed/). 
    [RSS feed](/feed/page:feed.xml).

Innehållsfil med länk till feed, av en specifik författare:

    ---
    Title: Exempelsida
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [Se senaste ändringarna av Datenstrom](/feed/author:datenstrom/). 
    [RSS feed](/feed/author:datenstrom/page:feed.xml).

Innehållsfil med länk till feed, för en specifik tagg:

    ---
    Title: Exempelsida
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [Se senaste ändringarna för exempel](/feed/tag:exempel/). 
    [RSS feed](/feed/tag:example/page:feed.xml).

Innehållsfil med länk till feed, i en specifik mapp:

    ---
    Title: Exempelsida
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [Se senaste ändringarna i hjälp](/feed/folder:help/). 
    [RSS feed](/feed/folder:help/page:feed.xml).

Layoutfil med länk till feed, i en specifik mapp:

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
    <link rel="alternate" type="application/rss+xml" href="<?php echo $this->yellow->page->getBase(true)."/feed/folder:help/page:feed.xml" ?>" title="<?php echo "Hjälp - ".$this->yellow->page->getHtml("sitename") ?>" />
    </head>
    ...

Konfigurera olika filter i inställningar:

```
FeedRecentChanges: auto
FeedRecentChanges: blog
FeedRecentChanges: blog, podcast, stream
FeedRecentChanges: wiki, wiki-start
```

## Inställningar

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`FeedLocation` = plats för feed  
`FeedFileXml` = filnamn för RSS feed  
`FeedPaginationLimit` = antal inlägg att visa per sida, 0 för obegränsad  
`FeedRecentChanges` = layouter att visa i feeden, `auto` för automatisk detektering, kommaseparerade  

Följande filer kan anpassas:

`system/layouts/feed.html` = layoutfil för feed  
`system/layouts/header.html` = layoutfil för standard HTML-header  

## Utvecklare

Anna Svensson. [Få hjälp](https://datenstrom.se/sv/yellow/help/).
