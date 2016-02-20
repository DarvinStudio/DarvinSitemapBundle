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
class SitemapGenerator implements SitemapGeneratorInterface
{
    /**
     * @var \Darvin\SitemapBundle\Url\SitemapUrlProviderInterface[]
     */
    private $urlProviders;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->urlProviders = array();
    }

    /**
     * {@inheritdoc}
     */
    public function addUrlProvider(SitemapUrlProviderInterface $urlProvider)
    {
        $class = get_class($urlProvider);

        if (isset($this->urlProviders[$class])) {
            throw new GeneratorException(sprintf('Sitemap URL provider "%s" already added to sitemap generator.', $class));
        }

        $this->urlProviders[$class] = $urlProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function generateSitemap()
    {
        // TODO: Implement generateSitemap() method.
    }
}
