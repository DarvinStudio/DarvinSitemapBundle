<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\SitemapBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Add sitemap URL providers to sitemap generator compiler pass
 */
class AddSitemapUrlProvidersPass implements CompilerPassInterface
{
    const SITEMAP_GENERATOR_ALIAS  = 'darvin_sitemap.generator';
    const SITEMAP_URL_PROVIDER_TAG = 'darvin_sitemap.url_provider';

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasAlias(self::SITEMAP_GENERATOR_ALIAS)) {
            return;
        }

        $generatorId = (string) $container->getAlias(self::SITEMAP_GENERATOR_ALIAS);

        if (!$container->hasDefinition($generatorId)) {
            return;
        }

        $urlProviderIds = $container->findTaggedServiceIds(self::SITEMAP_URL_PROVIDER_TAG);

        if (empty($urlProviderIds)) {
            return;
        }

        $generatorDefinition = $container->getDefinition($generatorId);

        foreach ($urlProviderIds as $id => $tags) {
            $reference = new Reference($id);

            foreach ($tags as $tag) {
                $generatorDefinition->addMethodCall('addUrlProvider', array(
                    $reference,
                ));
            }
        }
    }
}
