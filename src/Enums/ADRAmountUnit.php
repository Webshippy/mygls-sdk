<?php

namespace Webapix\GLS\Enums;

class ADRAmountUnit extends EnumAbstract
{
    private const KG = 1;
    private const G = 2;
    private const L = 3;
    private const ML = 4;
    private const PCS = 5;
    private const BLOCK = 6;
    private const ROLL = 7;
    private const MG = 8;
    private const SHEET = 9;

    private const LABELS = [
        self::KG => 'kg',
        self::G => 'g',
        self::L => 'l',
        self::ML => 'ml',
        self::PCS => 'pcs',
        self::BLOCK => 'block',
        self::ROLL => 'roll',
        self::MG => 'mg',
        self::SHEET => 'sheet',
    ];

    public static function Kg(): self
    {
        return new static(self::KG);
    }

    public static function G(): self
    {
        return new static(self::G);
    }

    public static function L(): self
    {
        return new static(self::L);
    }

    public static function Ml(): self
    {
        return new static(self::ML);
    }

    public static function Pcs(): self
    {
        return new static(self::PCS);
    }

    public static function Block(): self
    {
        return new static(self::BLOCK);
    }

    public static function Roll(): self
    {
        return new static(self::ROLL);
    }

    public static function Mg(): self
    {
        return new static(self::MG);
    }

    public static function Sheet(): self
    {
        return new static(self::SHEET);
    }

    protected static function getLabels(): array
    {
        return self::LABELS;
    }

    public static function cases(): array
    {
        return [
            self::Kg(),
            self::G(),
            self::L(),
            self::Ml(),
            self::Pcs(),
            self::Block(),
            self::Roll(),
            self::Mg(),
            self::Sheet(),
        ];
    }
}