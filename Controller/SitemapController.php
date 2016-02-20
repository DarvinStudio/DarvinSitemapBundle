<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\SitemapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sitemap controller
 */
class SitemapController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sitemapAction()
    {
        $response = new Response($this->getSitemapGenerator()->generateSitemap(), 200, array(
            'Content-Type' => 'text/xml',
        ));

        return $response
            ->setPublic()
            ->setSharedMaxAge($this->getParameter('darvin_sitemap.cache_max_age'));
    }

    /**
     * @return \Darvin\SitemapBundle\Generator\SitemapGeneratorInterface
     */
    private function getSitemapGenerator()
    {
        return $this->get('darvin_sitemap.generator');
    }
}
