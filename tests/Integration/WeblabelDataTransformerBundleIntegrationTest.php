<?php

declare(strict_types=1);

namespace Weblabel\DataTransformerBundle\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Weblabel\DataTransformer\Decoder\JsonDecoder;
use Weblabel\DataTransformer\DecoderResolverInterface;

class WeblabelDataTransformerBundleIntegrationTest extends KernelTestCase
{
    public function testServiceConfiguration()
    {
        $kernel = self::bootKernel();

        $container = $kernel->getContainer();

        self::assertInstanceOf(DecoderResolverInterface::class, $container->get('weblabel_data_transformer.decoder_resolver'));
        self::assertInstanceOf(JsonDecoder::class, $container->get('test.weblabel_data_transformer.decoder.json'));
    }
}
