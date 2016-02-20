# DarvinSitemapBundle
This bundle provides simple sitemap generating functionality for Symfony2-based applications.

## Installation

1. Add bundle to "required" section of composer.json:

```json
    ...
    "require": {
        "darvinstudio/darvin-sitemap-bundle": "dev-master@dev"
    }
    ...
```

2. Download bundle using Composer:

$ /usr/bin/env php composer.phar update darvinstudio/darvin-sitemap-bundle

3. Register bundle in app/AppKernel.php:

```php
    public function registerBundles()
    {
        $bundles = array(
            ...
            new Darvin\SitemapBundle\DarvinSitemapBundle(),
            ...
        );
    }
```
