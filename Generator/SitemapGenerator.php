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

use Darvin\SitemapBundle\Renderer\SitemapRendererInterface;
use Darvin\SitemapBundle\Url\SitemapUrlProviderInterface;
use Darvin\SitemapBundle\Url\Validator\SitemapUrlValidatorInterface;

/**
 * Sitemap generator
 */
class SitemapGenerator implements SitemapGeneratorInterface
{
    /**
     * @var \Darvin\SitemapBundle\Renderer\SitemapRendererInterface
     */
    private $renderer;

    /**
     * @var \Darvin\SitemapBundle\Url\Validator\SitemapUrlValidatorInterface
     */
    private $urlValidator;

    /**
     * @var \Darvin\SitemapBundle\Url\SitemapUrlProviderInterface[]
     */
    private $urlProviders;

    /**
     * @param \Darvin\SitemapBundle\Renderer\SitemapRendererInterface          $renderer     Sitemap renderer
     * @param \Darvin\SitemapBundle\Url\Validator\SitemapUrlValidatorInterface $urlValidator Sitemap URL validator
     */
    public function __construct(SitemapRendererInterface $renderer, SitemapUrlValidatorInterface $urlValidator)
    {
        $this->renderer = $renderer;
        $this->urlValidator = $urlValidator;
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
        $urls = array();

        foreach ($this->urlProviders as $urlProvider) {
            $providedUrls = $urlProvider->getSitemapUrls();

            $this->urlValidator->validateSitemapUrls($providedUrls);

            $urls = array_merge($urls, $providedUrls);
        }

        return $this->renderer->renderSitemap($urls);
    }
}
