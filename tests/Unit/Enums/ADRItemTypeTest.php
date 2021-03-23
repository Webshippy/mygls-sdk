<?php

namespace Enums;

use UnexpectedValueException;
use Webapix\GLS\Enums\ADRItemType;
use Webapix\GLS\Tests\TestCase;

class ADRItemTypeTest extends TestCase
{
    public function testEq(): void
    {
        $itemType = ADRItemType::Eq();

        $this->assertSame(1, intval((string)$itemType));
        $this->assertSame('EQ', $itemType->label());
    }

    public function testLq(): void
    {
        $itemType = ADRItemType::Lq();

        $this->assertSame(2, intval((string)$itemType));
        $this->assertSame('LQ', $itemType->label());
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
        $itemType = ADRItemType::from($value);

        $this->assertSame($expectedLabel, $itemType->label());
        $this->assertSame($expectedValue, intval((string)$itemType));
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
        $itemType = ADRItemType::tryFrom($value);

        $this->assertSame($expectedLabel, $itemType->label());
        $this->assertSame($expectedValue, intval((string)$itemType));
    }

    public function fromProvider(): array
    {
        return [
            'EQ by int value' => [
                'value' => 1,
                'expectedLabel' => 'EQ',
                'expectedValue' => 1,
            ],
            'EQ by string value' => [
                'value' => 'EQ',
                'expectedLabel' => 'EQ',
                'expectedValue' => 1,
            ],
            'LQ by int value' => [
                'value' => 2,
                'expectedLabel' => 'LQ',
                'expectedValue' => 2,
            ],
            'LQ by string value' => [
                'value' => 'LQ',
                'expectedLabel' => 'LQ',
                'expectedValue' => 2,
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

        ADRItemType::from($value);
    }

    /**
     * @dataProvider fromValueErrorProvider
     *
     * @param mixed $value
     */
    public function testTryFromNull($value)
    {
        $this->assertNull(ADRItemType::tryFrom($value));
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
            ADRItemType::Eq(),
            ADRItemType::Lq(),
        ], ADRItemType::cases());
    }
}