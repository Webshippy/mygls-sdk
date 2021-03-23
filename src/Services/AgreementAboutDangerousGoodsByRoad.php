<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;
use Webapix\GLS\Enums\ADRItemType;
use Webapix\GLS\Enums\ADRAmountUnit;

/**
 * AgreementAboutDangerousGoodsByRoad Service.
 */
class AgreementAboutDangerousGoodsByRoad implements Service
{
    /**
     * @var ADRAmountUnit
     */
    private $itemType;

    /**
     * @var ADRItemType
     */
    private $amountUnit;

    /**
     * @var int
     */
    private $innerCount;

    /**
     * @var int
     */
    private $packSize;

    /**
     * @var int
     */
    private $unNumber;

    public function __construct(
        ADRItemType $itemType,
        ADRAmountUnit $amountUnit,
        int $innerCount,
        int $packSize,
        int $unNumber
    )
    {
        $this->itemType = $itemType;
        $this->amountUnit = $amountUnit;
        $this->innerCount = $innerCount;
        $this->packSize = $packSize;
        $this->unNumber = $unNumber;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'ADR',
            'ADRParameter' => [
                'AdrItemType' => intval((string)$this->itemType),
                'AmountUnit' => intval((string)$this->amountUnit),
                'InnerCount' => $this->innerCount,
                'PackSize' => $this->packSize,
                'UnNumber' => $this->unNumber,
            ],
        ];
    }
}
