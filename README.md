# Bildarchiv

This repository contains the code used for [archiv.juergstraumann.ch](https://archiv.juergstraumann.ch/).

It contains a static HTML file used as the landing page.

The image folder is hosted on a volume on the host which is mounted into the `archiv` application

| Host | Application |
|---|---|
| `/var/lib/dokku/data/storage/archiv/images` | `/app/www/images` |

All required configuration is contained in the repo. To update, just make the required changes and push the application to the Dokku server.
