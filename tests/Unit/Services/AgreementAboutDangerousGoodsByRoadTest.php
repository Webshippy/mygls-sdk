<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Enums\ADRItemType;
use Webapix\GLS\Enums\ADRAmountUnit;
use Webapix\GLS\Services\AgreementAboutDangerousGoodsByRoad;
use Webapix\GLS\Tests\TestCase;

class AgreementAboutDangerousGoodsByRoadTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new AgreementAboutDangerousGoodsByRoad(ADRItemType::from(2), ADRAmountUnit::from(5), 1, 1, 1002);

        $this->assertSame([
            'Code'         => 'ADR',
            'ADRParameter' => [
                'AdrItemType' => 5,
                'AmountUnit'  => 2,
                'InnerCount'  => 1,
                'PackSize'    => 1,
                'UnNumber'    => 1002,
            ],
        ], $service->toArray());
    }
}
