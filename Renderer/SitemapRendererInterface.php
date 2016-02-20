<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\SitemapBundle\Renderer;

/**
 * Sitemap renderer
 */
interface SitemapRendererInterface
{
    /**
     * @param \Darvin\SitemapBundle\Url\SitemapUrl[] $sitemapUrls Sitemap URLs
     *
     * @return string
     * @throws \Darvin\SitemapBundle\Renderer\RendererException
     */
    public function renderSitemap(array $sitemapUrls);
}
