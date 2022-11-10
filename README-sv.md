<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Feed 0.8.16

Feed med senaste ändringarna

<p align="center"><img src="feed-screenshot.png?raw=true" alt="Skärmdump"></p>

## Hur man använder en feed

Feeden finns tillgängligt på din webbplats som `http://website/feed/` och `http://website/feed/page:feed.xml`. Det är en feed för hela webbplatsen, endast synliga sidor ingår.

## Hur man anpassar en feed

Om du inte vill lista hela webbplatsen i feeden, kan du använda olika filter för att anpassa feeden. För att skapa en feed för wikin öppna filen `system/extensions/yellow-system.ini` och ändra `FeedFilterLayout: wiki`. För att skapa en feed för bloggen öppna systeminställningarnar och ändra `FeedFilterLayout: blog`.

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

## Inställningar

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`FeedLocation` = plats för feed  
`FeedFileXml` = filnamn för RSS feed  
`FeedFilterLayout` = filter för en specifik layout, `none` för att inaktivera  
`FeedPaginationLimit` = antal inlägg att visa per sida, 0 för obegränsad  

Följande filer kan anpassas:

`system/layouts/feed.html` = layoutfil för feed  

## Installation

[Ladda ner tillägg](https://github.com/annaesvensson/yellow-feed/archive/main.zip) och kopiera ZIP-fil till din `system/extensions` mapp. [Läs mer om tillägg](https://github.com/annaesvensson/yellow-update/tree/main/README-sv.md).

## Utvecklare

Anna Svensson. [Få hjälp](https://datenstrom.se/sv/yellow/help/).
