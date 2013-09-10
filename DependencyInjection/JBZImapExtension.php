<?php

namespace JBZ\ImapBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class JBZImapExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('jbz_imap.host', $config['host']);
        $container->setParameter('jbz_imap.username', $config['username']);
        $container->setParameter('jbz_imap.password', $config['password']);
        $container->setParameter('jbz_imap.port', $config['port']);
        $container->setParameter('jbz_imap.ssl', $config['ssl']);
        $container->setParameter('jbz_imap.folder', $config['folder']);
    }
}
