<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\SitemapBundle\Url\Validator;

/**
 * Sitemap URL validator
 */
interface SitemapUrlValidatorInterface
{
    /**
     * @param \Darvin\SitemapBundle\Url\SitemapUrl[] $sitemapUrls Sitemap URLs
     */
    public function validateSitemapUrls(array $sitemapUrls);
}
