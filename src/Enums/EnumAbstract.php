<?php

namespace Webapix\GLS\Enums;

use UnexpectedValueException;

abstract class EnumAbstract
{
    abstract protected static function getLabels(): array;

    abstract public static function cases(): array;

    /**
     * @param int|string $value
     *
     * @return static
     *
     * @throws UnexpectedValueException
     */
    public static function from($value)
    {
        if (is_int($value)) {
            if (isset(static::getLabels()[$value])) {
                return new static($value);
            }
        }

        if (is_string($value)) {
            $index = array_search($value, static::getLabels());
            if ($index !== false) {
                return new static($index);
            }
        }

        throw new UnexpectedValueException(
            sprintf('Cannot create instance from value %s', filter_var($value, FILTER_SANITIZE_STRING))
        );
    }

    /**
     * @param int|string $value
     *
     * @return static|null
     */
    public static function tryFrom($value)
    {
        try {
            return static::from($value);
        } catch (UnexpectedValueException $error) {
            return null;
        }
    }

    public static function getLabel(EnumAbstract $value): string
    {
        return static::getLabels()[intval((string)$value)];
    }

    /**
     * @var int $value
     */
    private $value;

    protected function __construct(int $value)
    {
        $this->value = $value;
    }

    public function label(): string
    {
        return static::getLabel($this);
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }
}