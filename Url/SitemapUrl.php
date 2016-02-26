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
 * Sitemap URL
 */
class SitemapUrl
{
    const CHANGE_FREQ_ALWAYS  = 'always';
    const CHANGE_FREQ_HOURLY  = 'hourly';
    const CHANGE_FREQ_DAILY   = 'daily';
    const CHANGE_FREQ_WEEKLY  = 'weekly';
    const CHANGE_FREQ_MONTHLY = 'monthly';
    const CHANGE_FREQ_YEARLY  = 'yearly';
    const CHANGE_FREQ_NEVER   = 'never';

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Length(max="2048")
     * @Assert\Url
     */
    private $location;

    /**
     * @var \DateTime
     */
    private $lastModifiedAt;

    /**
     * @var string
     *
     * @Assert\Choice(choices={"always", "hourly", "daily", "weekly", "monthly", "yearly", "never"})
     */
    private $changeFrequency;

    /**
     * @var float
     *
     * @Assert\Range(min="0.0", max="1.0")
     */
    private $priority;

    /**
     * @var \Darvin\SitemapBundle\Url\AlternateLink[]
     *
     * @Assert\Valid
     */
    private $alternateLinks;

    /**
     * @param string                                    $location        Location
     * @param \DateTime                                 $lastModifiedAt  Last modified at
     * @param string                                    $changeFrequency Change frequency
     * @param float                                     $priority        Priority
     * @param \Darvin\SitemapBundle\Url\AlternateLink[] $alternateLinks  Alternate links
     */
    public function __construct(
        $location,
        \DateTime $lastModifiedAt = null,
        $changeFrequency = null,
        $priority = null,
        array $alternateLinks = array()
    ) {
        $this->location = $location;
        $this->lastModifiedAt = $lastModifiedAt;
        $this->changeFrequency = $changeFrequency;
        $this->priority = $priority;
        $this->alternateLinks = $alternateLinks;
    }

    /**
     * @param string $location location
     *
     * @return SitemapUrl
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param \DateTime $lastModifiedAt lastModifiedAt
     *
     * @return SitemapUrl
     */
    public function setLastModifiedAt(\DateTime $lastModifiedAt = null)
    {
        $this->lastModifiedAt = $lastModifiedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastModifiedAt()
    {
        return $this->lastModifiedAt;
    }

    /**
     * @param string $changeFrequency changeFrequency
     *
     * @return SitemapUrl
     */
    public function setChangeFrequency($changeFrequency)
    {
        $this->changeFrequency = $changeFrequency;

        return $this;
    }

    /**
     * @return string
     */
    public function getChangeFrequency()
    {
        return $this->changeFrequency;
    }

    /**
     * @param float $priority priority
     *
     * @return SitemapUrl
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return float
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param \Darvin\SitemapBundle\Url\AlternateLink[] $alternateLinks alternateLinks
     *
     * @return SitemapUrl
     */
    public function setAlternateLinks(array $alternateLinks)
    {
        $this->alternateLinks = $alternateLinks;

        return $this;
    }

    /**
     * @return \Darvin\SitemapBundle\Url\AlternateLink[]
     */
    public function getAlternateLinks()
    {
        return $this->alternateLinks;
    }

    /**
     * @param \Darvin\SitemapBundle\Url\AlternateLink $alternateLink Alternate link
     *
     * @return SitemapUrl
     */
    public function addAlternateLink(AlternateLink $alternateLink)
    {
        $this->alternateLinks[] = $alternateLink;

        return $this;
    }
}
