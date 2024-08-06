# PHP Archivsystem

## Development
Die letzte Version des Archivs verwendet automatisch generierte thumbnails, um die Download-Menge in der Übersicht von 11MB auf ~ 4MB zu beschränken.
Dafür wird die Standard-Erweiterung `gd` benötigt. Diese kann im `php.ini` file aktiviert werden.
Um das System lokal zu testen, kann ein lokaler PHP development server geöffnet werden.

```sh
php -S 127.0.0.1:8000
```

Das Archiv ist nun unter [http://localhost:8000](http://localhost:8000) erreichbar.

Damit die Projekt- bzw. Kameraerkennung korrekt funktioniert, müssen die Dateien dieses Repos in dem Ordner P0000-ProjektName/cam000/ sein.