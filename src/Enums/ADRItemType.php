<?php

namespace Webapix\GLS\Enums;

class ADRItemType extends EnumAbstract
{
    public const EQ = 1;
    public const LQ = 2;

    private const LABELS = [
        self::EQ => 'EQ',
        self::LQ => 'LQ',
    ];

    public static function Eq(): self
    {
        return new static(self::EQ);
    }

    public static function Lq(): self
    {
        return new static(self::LQ);
    }

    protected static function getLabels(): array
    {
        return self::LABELS;
    }

    public static function cases(): array
    {
        return [
            self::Eq(),
            self::Lq(),
        ];
    }
}