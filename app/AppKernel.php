<?php

/*
 * This file is part of the NuCms package.
 *
 * (c) Jacek Bednarek
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Nugato\Bundle\NuCmsBundle\Application\Kernel;

class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles(): array
    {
        $bundles = [
        ];

        return array_merge(parent::registerBundles(), $bundles);
    }
}

//use Symfony\Component\DependencyInjection\ContainerBuilder;
//use Symfony\Component\HttpKernel\Kernel;
//use Symfony\Component\Config\Loader\LoaderInterface;
//
//class AppKernel extends Kernel
//{
//    public function registerBundles()
//    {
//        $bundles = [
//            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
//            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
//            new Symfony\Bundle\TwigBundle\TwigBundle(),
//            new Symfony\Bundle\MonologBundle\MonologBundle(),
//            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
//            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
//            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
//            new AppBundle\AppBundle(),
//            new \Nugato\Bundle\NuCmsBundle\NugatoNuCmsBundle(),
//        ];
//
//        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
//            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
//            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
//            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
//
//            if ('dev' === $this->getEnvironment()) {
//                $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
//                $bundles[] = new Symfony\Bundle\WebServerBundle\WebServerBundle();
//            }
//        }
//
//        return $bundles;
//    }
//
//    public function getRootDir()
//    {
//        return __DIR__;
//    }
//
//    public function getCacheDir()
//    {
//        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
//    }
//
//    public function getLogDir()
//    {
//        return dirname(__DIR__).'/var/logs';
//    }
//
//    public function registerContainerConfiguration(LoaderInterface $loader)
//    {
//        $loader->load(function (ContainerBuilder $container) {
//            $container->setParameter('container.autowiring.strict_mode', true);
//            $container->setParameter('container.dumper.inline_class_loader', true);
//
//            $container->addObjectResource($this);
//        });
//        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
//    }
//}
