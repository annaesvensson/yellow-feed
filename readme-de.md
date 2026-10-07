# Feed 1.0.3

Feed mit letzten Änderungen. Entwickelt von Anna Svensson.

<p align="center"><img src="screenshot.png" alt="Bildschirmfoto" /></p>

## Wie man eine Erweiterung installiert

[ZIP-Datei herunterladen](https://github.com/annaesvensson/yellow-feed/archive/refs/heads/main.zip) und in dein `system/extensions`-Verzeichnis kopieren. [Weitere Informationen zu Erweiterungen](https://github.com/annaesvensson/yellow-update/tree/main/readme-de.md).

## Wie man einen Feed benutzt

Der Feed ist auf deiner Webseite vorhanden als `http://website/feed/` und `http://website/feed.xml`. Der erste Link ist ein menschenlesbarer Feed und der zweite Link ist ein maschinenlesbarer Feed, der gemeinhin als RSS-Feed bekannt ist. Es ist eine Liste der letzten Änderungen auf der gesamten Webseite, nur sichtbare Seiten sind enthalten.

Falls du nicht willst dass eine Seite sichtbar ist, kannst du `Status: unlisted` in den [Seiteneinstellungen](https://github.com/annaesvensson/yellow-core/tree/main/readme-de.md#einstellungen-seite) ganz oben auf einer Seite festlegen.

## Wie man einen Feed anpasst

Falls du nicht die gesamte Webseite im Feed auflisten willst, kannst du unterschiedliche Filter benutzen um den Feed anzupassen. Der Filter `author:` zeigt Seiten von einem bestimmten Autor. Der Filter `language:` zeigt Seiten in einer bestimmten Sprache. Der Filter `tag:` zeigt Seiten mit einem bestimmten Tag. Der Filter `folder:` zeigt Seiten in einem bestimmten Verzeichnis. Du kannst auch die Art des Feeds in den Einstellungen ändern. Um einen Blog-Feed zu machen, öffne die Datei `system/extensions/yellow-system.ini` und ändere `FeedRecentChanges: blog`. Um einen Wiki-Feed zu machen, öffne die Datei `system/extensions/yellow-system.ini` und ändere `FeedRecentChanges: wiki, wiki-start`. 

## Beispiele

Inhaltsdatei mit Link zum Feed:

    ---
    Title: Beispielseite
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    [Letzte Änderungen anzeigen](/feed/). 
    [RSS-Feed](/feed.xml).

Inhaltsdatei mit Link zum Feed, von einem bestimmter Autor:

    ---
    Title: Beispielseite
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    [Letzte Änderungen von Datenstrom anzeigen](/feed/author:datenstrom/). 
    [RSS-Feed für Datenstrom](/feed/author:datenstrom/page:feed.xml).

Inhaltsdatei mit Link zum Feed, mit einen bestimmten Tag:

    ---
    Title: Beispielseite
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    [Letzte Änderungen für Beispiel anzeigen](/feed/tag:beispiel/). 
    [RSS-Feed für Beispiel](/feed/tag:beispiel/page:feed.xml).

Inhaltsdatei mit Link zum Feed, in einen bestimmten Verzeichnis:

    ---
    Title: Beispielseite
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    [Letzte Änderungen in Hilfe anzeigen](/feed/folder:help/). 
    [RSS-Feed für Hilfe](/feed/folder:help/page:feed.xml).

Inhaltsdatei mit ungelisteter Seite:

    ---
    Title: Ungelistete Seite
    Status: unlisted
    ---
    Diese Seite ist im Feed nicht sichtbar.

Verschiedene Arten von Feeds in den Einstellungen festlegen:

```
FeedRecentChanges: auto
FeedRecentChanges: blog
FeedRecentChanges: blog, podcast, stream
FeedRecentChanges: wiki, wiki-start
```

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`FeedXmlLocation` = Ort des Feed als maschinenlesbares XML-Format  
`FeedPaginationLimit` = Anzahl der Einträge pro Seite, 0 für unbegrenzt  
`FeedRecentChanges` = Layouts im Feed, `auto` für automatische Erkennung, durch Komma getrennt   

Die folgenden Dateien können angepasst werden:

`system/layouts/feed.html` = Layoutdatei für Feed  

Hast du Fragen? [Hilfe finden](https://datenstrom.se/de/yellow/help/).
