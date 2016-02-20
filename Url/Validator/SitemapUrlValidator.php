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

use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Sitemap URL validator
 */
class SitemapUrlValidator implements SitemapUrlValidatorInterface
{
    /**
     * @var \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    private $genericValidator;

    /**
     * @param \Symfony\Component\Validator\Validator\ValidatorInterface $genericValidator Generic validator
     */
    public function __construct(ValidatorInterface $genericValidator)
    {
        $this->genericValidator = $genericValidator;
    }

    /**
     * {@inheritdoc}
     */
    public function validateSitemapUrls(array $sitemapUrls)
    {
        foreach ($sitemapUrls as $key => $url) {
            $violations = $this->genericValidator->validate($url);

            if (!$violations->has(0)) {
                continue;
            }

            $violation = $violations->get(0);

            $message = sprintf(
                'Value of property "%s" of sitemap URL at position "%s" is invalid: "%s".',
                $violation->getPropertyPath(),
                $key,
                $violation->getMessage()
            );

            throw new UrlInvalidException($message);
        }
    }
}
