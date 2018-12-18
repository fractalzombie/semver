<?php

namespace Fractal\SemVer;


/**
 * Class Operator
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class Operator
{
    /**
     * Greater than operator.
     *
     * @const string
     */
    public const GREATER = '>';

    /**
     * Greater than or equal to operator.
     *
     * @const string
     */
    public const GREATER_OR_EQUAL = '>=';

    /**
     * Less than operator.
     *
     * @const string
     */
    public const LESS = '<';

    /**
     * Less than or equal to operator.
     *
     * @const string
     */
    public const LESS_OR_EQUAL = '<=';

    /**
     * Equal to operator.
     *
     * @const string
     */
    public const EQUAL = '=';

    /**
     * Not equal to operator.
     *
     * @const string
     */
    public const NOT_EQUAL = '<>';

    /**
     * Available operators
     *
     * @var array
     */
    protected static $operators = [
        self::GREATER,
        self::GREATER_OR_EQUAL,
        self::LESS,
        self::LESS_OR_EQUAL,
        self::EQUAL,
        self::NOT_EQUAL,
    ];

    /**
     * Checks operator for availability
     *
     * @param string $operator
     *
     * @return bool
     */
    public static function has(string $operator): bool
    {
        return \in_array($operator, static::$operators, true);
    }
}