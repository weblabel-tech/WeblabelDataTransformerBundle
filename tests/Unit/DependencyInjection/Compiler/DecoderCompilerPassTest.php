<?php

declare(strict_types=1);

namespace Weblabel\DataTransformerBundle\Tests\Unit\DependencyInjection\Compiler;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Weblabel\DataTransformerBundle\DependencyInjection\Compiler\DecoderCompilerPass;

class DecoderCompilerPassTest extends TestCase
{
    public function test_resolver_autoconfiguration()
    {
        $containerBuilder = new ContainerBuilder();
        $decoderResolverDefinition = $containerBuilder->register('weblabel_data_transformer.decoder_resolver.generic');
        $decoderDefinition = $containerBuilder->register('weblabel_data_transformer.decoder.json');
        $decoderDefinition->addTag('weblabel_data_transformer.decoder');

        $compilerPass = new DecoderCompilerPass();
        $compilerPass->process($containerBuilder);

        self::assertContainsEquals(new Reference('weblabel_data_transformer.decoder.json'), $decoderResolverDefinition->getArgument(0));
    }
}
