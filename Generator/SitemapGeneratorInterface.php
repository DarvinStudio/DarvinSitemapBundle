<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\SitemapBundle\Generator;

use Darvin\SitemapBundle\Url\SitemapUrlProviderInterface;

/**
 * Sitemap generator
 */
interface SitemapGeneratorInterface
{
    /**
     * @param \Darvin\SitemapBundle\Url\SitemapUrlProviderInterface $urlProvider Sitemap URL provider
     */
    public function addUrlProvider(SitemapUrlProviderInterface $urlProvider);

    /**
     * @return string
     */
    public function generateSitemap();
}
