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

use Symfony\Component\Templating\EngineInterface;

/**
 * Sitemap renderer
 */
class SitemapRenderer implements SitemapRendererInterface
{
    /**
     * @var \Symfony\Component\Templating\EngineInterface
     */
    private $templating;

    /**
     * @var string
     */
    private $template;

    /**
     * @param \Symfony\Component\Templating\EngineInterface $templating Templating
     * @param string                                        $template   Template
     */
    public function __construct(EngineInterface $templating, $template)
    {
        $this->templating = $templating;
        $this->template = $template;
    }

    /**
     * {@inheritdoc}
     */
    public function renderSitemap(array $sitemapUrls)
    {
        if (!$this->templating->exists($this->template)) {
            throw new RendererException(sprintf('Sitemap template "%s" does not exist.', $this->template));
        }
        if (!$this->templating->supports($this->template)) {
            $message = sprintf(
                'Sitemap template "%s" is not supported by templating engine "%s".',
                $this->template,
                get_class($this->templating)
            );

            throw new RendererException($message);
        }

        return $this->templating->render($this->template, array(
            'urls' => $sitemapUrls,
        ));
    }
}
