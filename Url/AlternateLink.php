<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\SitemapBundle\Url;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Sitemap URL alternate link
 */
class AlternateLink
{
    /**
     * @var string
     *
     * @Assert\NotBlank
     */
    private $hrefLanguage;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $href;

    /**
     * @param string $hrefLanguage Href language
     * @param string $href         Href
     */
    public function __construct($hrefLanguage, $href)
    {
        $this->hrefLanguage = $hrefLanguage;
        $this->href = $href;
    }

    /**
     * @param string $hrefLanguage hrefLanguage
     *
     * @return AlternateLink
     */
    public function setHrefLanguage($hrefLanguage)
    {
        $this->hrefLanguage = $hrefLanguage;

        return $this;
    }

    /**
     * @return string
     */
    public function getHrefLanguage()
    {
        return $this->hrefLanguage;
    }

    /**
     * @param string $href href
     *
     * @return AlternateLink
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }
}
