<?php

declare(strict_types=1);

namespace Weblabel\DataTransformerBundle\Tests\Fixtures;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;
use Weblabel\DataTransformerBundle\WeblabelDataTransformerBundle;

class WeblabelDataTransformerTestKernel extends Kernel
{
    public function __construct()
    {
        parent::__construct('test', true);
    }

    /**
     * @return iterable<mixed, BundleInterface>
     */
    public function registerBundles()
    {
        return [
            new WeblabelDataTransformerBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/services.test.xml');
    }

    public function getProjectDir(): string
    {
        return __DIR__;
    }
}
