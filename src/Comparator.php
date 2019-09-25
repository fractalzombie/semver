<?php

namespace Fractal\SemVer;


use Fractal\SemVer\Contracts\VersionInterface;
use Fractal\SemVer\Exceptions\InvalidOperatorException;
use Fractal\SemVer\Exceptions\VersionClassNotEqualException;

/**
 * Class Comparator
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
final class Comparator
{
    /**
     * Compares version one greater than version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public static function gt(VersionInterface $one, VersionInterface $two): bool
    {
        return static::compare($one, $two, Operator::GREATER);
    }

    /**
     * Compares version one greater than or equal to version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public static function gte(VersionInterface $one, VersionInterface $two): bool
    {
        return static::compare($one, $two, Operator::GREATER_OR_EQUAL);
    }

    /**
     * Compares version one less than version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public static function lt(VersionInterface $one, VersionInterface $two): bool
    {
        return static::compare($one, $two, Operator::LESS);
    }

    /**
     * Compares version one less than or equal to version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public static function lte(VersionInterface $one, VersionInterface $two): bool
    {
        return static::compare($one, $two, Operator::LESS_OR_EQUAL);
    }

    /**
     * Compares version one equal to version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public static function eq(VersionInterface $one, VersionInterface $two): bool
    {
        return static::compare($one, $two, Operator::EQUAL);
    }

    /**
     * Compares version one not equal to version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public static function ne(VersionInterface $one, VersionInterface $two): bool
    {
        return static::compare($one, $two, Operator::NOT_EQUAL);
    }

    /**
     * Compares version one and two by operator
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     * @param string $operator
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    protected static function compare(VersionInterface $one, VersionInterface $two, string $operator): bool
    {
        if (! Operator::has($operator)) {
            throw new InvalidOperatorException($operator);
        }

        if (\get_class($one) !== \get_class($two)) {
            throw new VersionClassNotEqualException($one, $two);
        }

        return version_compare($one, $two, $operator);
    }
}
