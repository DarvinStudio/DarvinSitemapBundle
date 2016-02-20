# DarvinSitemapBundle
This bundle provides simple sitemap generating functionality for Symfony2-based applications.

## Installation

#### 1. Add bundle to "required" section of composer.json:

```json
"require": {
    "darvinstudio/darvin-sitemap-bundle": "1.0.*"
}
```

#### 2. Download bundle using Composer:

$ /usr/bin/env php composer.phar update darvinstudio/darvin-sitemap-bundle

#### 3. Register bundle in AppKernel.php:

```php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Darvin\SitemapBundle\DarvinSitemapBundle(),
        // ...
    );
}
```

#### 4. Import routing configuration from bundle to app routing configuration:

```yaml
# app/config/routing.yml
darvin_sitemap:
    resource: "@DarvinSitemapBundle/Resources/config/routing.yml"
    prefix:   /
```

## Usage

#### 1. Create class implementing \Darvin\SitemapBundle\Url\SitemapUrlProviderInterface interface.

```php
// src/AppBundle/Sitemap/TestSitemapUrlProvider.php
<?php

namespace AppBundle\Sitemap;

use Darvin\SitemapBundle\Url\SitemapUrl;
use Darvin\SitemapBundle\Url\SitemapUrlProviderInterface;

class TestSitemapUrlProvider implements SitemapUrlProviderInterface
{
    public function getSitemapUrls()
    {
        $urls = array();
        
        $urls[] = new SitemapUrl('http://example.com', new \DateTime('2016-01-01'), 'always', 0.5);

        return $urls;
    }
}
```

#### 2. Define created class as a service and tag it with "darvin_sitemap.url_provider".

```yaml
# app/config/services.yml
app.sitemap.url_provider.test:
    class: AppBundle\Sitemap\TestSitemapUrlProvider
    tags:
        - { name: darvin_sitemap.url_provider }
```

#### 3. Target web browser to http://your-domain.com/sitemap.xml to get your sitemap.

## Configuration reference

```yaml
darvin_sitemap:
    cache_max_age: 3600 # Shared cache max age, 60 minutes
    # Read http://symfony.com/doc/current/book/http_cache.html to know how to enable shared cache, which is highly recommended
    template:
        DarvinSitemapBundle:Sitemap:sitemap.xml.twig
```
