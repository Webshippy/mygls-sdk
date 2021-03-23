<?php

namespace Webapix\GLS\Tests\Unit\Enums;

use UnexpectedValueException;
use Webapix\GLS\Enums\ADRAmountUnit;
use Webapix\GLS\Tests\TestCase;

class ADRAmountUnitTest extends TestCase
{
    public function testKg()
    {
        $amountUnit = ADRAmountUnit::Kg();

        $this->assertSame('kg', $amountUnit->label());
        $this->assertSame(1, intval((string)$amountUnit));
    }

    public function testG()
    {
        $amountUnit = ADRAmountUnit::G();

        $this->assertSame('g', $amountUnit->label());
        $this->assertSame(2, intval((string)$amountUnit));
    }

    public function testL()
    {
        $amountUnit = ADRAmountUnit::L();

        $this->assertSame('l', $amountUnit->label());
        $this->assertSame(3, intval((string)$amountUnit));
    }

    public function testMl()
    {
        $amountUnit = ADRAmountUnit::Ml();

        $this->assertSame('ml', $amountUnit->label());
        $this->assertSame(4, intval((string)$amountUnit));
    }

    public function testPcs()
    {
        $amountUnit = ADRAmountUnit::Pcs();

        $this->assertSame('pcs', $amountUnit->label());
        $this->assertSame(5, intval((string)$amountUnit));
    }

    public function testBlock()
    {
        $amountUnit = ADRAmountUnit::Block();

        $this->assertSame('block', $amountUnit->label());
        $this->assertSame(6, intval((string)$amountUnit));
    }

    public function testRoll()
    {
        $amountUnit = ADRAmountUnit::Roll();

        $this->assertSame('roll', $amountUnit->label());
        $this->assertSame(7, intval((string)$amountUnit));
    }

    public function testMg()
    {
        $amountUnit = ADRAmountUnit::Mg();

        $this->assertSame('mg', $amountUnit->label());
        $this->assertSame(8, intval((string)$amountUnit));
    }

    public function testSheet()
    {
        $amountUnit = ADRAmountUnit::Sheet();

        $this->assertSame('sheet', $amountUnit->label());
        $this->assertSame(9, intval((string)$amountUnit));
    }

    /**
     * @dataProvider fromProvider
     *
     * @param $value
     * @param string $expectedLabel
     * @param int $expectedValue
     */
    public function testFrom($value, string $expectedLabel, int $expectedValue)
    {
        $amountUnit = ADRAmountUnit::from($value);

        $this->assertSame($expectedLabel, $amountUnit->label());
        $this->assertSame($expectedValue, intval((string)$amountUnit));
    }

    /**
     * @dataProvider fromProvider
     *
     * @param $value
     * @param string $expectedLabel
     * @param int $expectedValue
     */
    public function testTryFrom($value, string $expectedLabel, int $expectedValue)
    {
        $amountUnit = ADRAmountUnit::tryFrom($value);

        $this->assertSame($expectedLabel, $amountUnit->label());
        $this->assertSame($expectedValue, intval((string)$amountUnit));
    }

    public function fromProvider(): array
    {
        return [
            'kg by int value' => [
                'value' => 1,
                'expectedLabel' => 'kg',
                'expectedValue' => 1,
            ],
            'kg by string value' => [
                'value' => 'kg',
                'expectedLabel' => 'kg',
                'expectedValue' => 1,
            ],
            'g by int value' => [
                'value' => 2,
                'expectedLabel' => 'g',
                'expectedValue' => 2,
            ],
            'g by string value' => [
                'value' => 'g',
                'expectedLabel' => 'g',
                'expectedValue' => 2,
            ],
            'l by int value' => [
                'value' => 3,
                'expectedLabel' => 'l',
                'expectedValue' => 3,
            ],
            'l by string value' => [
                'value' => 'l',
                'expectedLabel' => 'l',
                'expectedValue' => 3,
            ],
            'ml by int value' => [
                'value' => 4,
                'expectedLabel' => 'ml',
                'expectedValue' => 4,
            ],
            'ml by string value' => [
                'value' => 'ml',
                'expectedLabel' => 'ml',
                'expectedValue' => 4,
            ],
            'pcs by int value' => [
                'value' => 5,
                'expectedLabel' => 'pcs',
                'expectedValue' => 5,
            ],
            'pcs by string value' => [
                'value' => 'pcs',
                'expectedLabel' => 'pcs',
                'expectedValue' => 5,
            ],
            'block by int value' => [
                'value' => 6,
                'expectedLabel' => 'block',
                'expectedValue' => 6,
            ],
            'block by string value' => [
                'value' => 'block',
                'expectedLabel' => 'block',
                'expectedValue' => 6,
            ],
            'roll by int value' => [
                'value' => 7,
                'expectedLabel' => 'roll',
                'expectedValue' => 7,
            ],
            'roll by string value' => [
                'value' => 'roll',
                'expectedLabel' => 'roll',
                'expectedValue' => 7,
            ],
            'mg by int value' => [
                'value' => 8,
                'expectedLabel' => 'mg',
                'expectedValue' => 8,
            ],
            'mg by string value' => [
                'value' => 'mg',
                'expectedLabel' => 'mg',
                'expectedValue' => 8,
            ],
            'sheet by int value' => [
                'value' => 9,
                'expectedLabel' => 'sheet',
                'expectedValue' => 9,
            ],
            'sheet by string value' => [
                'value' => 'sheet',
                'expectedLabel' => 'sheet',
                'expectedValue' => 9,
            ],
        ];
    }

    /**
     * @dataProvider fromValueErrorProvider
     *
     * @param mixed $value
     */
    public function testFromValueError($value)
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage(
            sprintf('Cannot create instance from value %s', filter_var($value, FILTER_SANITIZE_STRING))
        );

        ADRAmountUnit::from($value);
    }

    /**
     * @dataProvider fromValueErrorProvider
     *
     * @param mixed $value
     */
    public function testTryFromNull($value)
    {
        $this->assertNull(ADRAmountUnit::tryFrom($value));
    }

    public function fromValueErrorProvider(): array
    {
        return [
            'array' => ['value' => []],
            'out of range integer #1' => ['value' => 0],
            'out of range integer #2' => ['value' => -1],
            'out of range integer #3' => ['value' => 1000],
            'empty string' => ['value' => ''],
            'null' => ['value' => null],
            'true' => ['value' => true],
            'false' => ['value' => false],
            'float' => ['value' => 3.14],
        ];
    }

    public function testCases(): void
    {
        $this->assertEquals([
            ADRAmountUnit::Kg(),
            ADRAmountUnit::G(),
            ADRAmountUnit::L(),
            ADRAmountUnit::Ml(),
            ADRAmountUnit::Pcs(),
            ADRAmountUnit::Block(),
            ADRAmountUnit::Roll(),
            ADRAmountUnit::Mg(),
            ADRAmountUnit::Sheet(),
        ], ADRAmountUnit::cases());
    }
}