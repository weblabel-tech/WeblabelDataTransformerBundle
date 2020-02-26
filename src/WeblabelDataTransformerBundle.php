<?php

declare(strict_types=1);

namespace Weblabel\DataTransformerBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Weblabel\DataTransformer\DecoderInterface;
use Weblabel\DataTransformerBundle\DependencyInjection\Compiler\DecoderCompilerPass;

class WeblabelDataTransformerBundle extends Bundle
{
    /**
     * Builds the bundle.
     *
     * @return void
     */
    public function build(ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(DecoderInterface::class)->addTag('weblabel_data_transformer.decoder');
        $container->addCompilerPass(new DecoderCompilerPass());
    }
}
