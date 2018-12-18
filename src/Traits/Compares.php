<?php

namespace Fractal\SemVer\Traits;


use Fractal\SemVer\Comparator;
use Fractal\SemVer\Contracts\VersionInterface;

/**
 * Trait Compares
 *
 * @mixin \Fractal\SemVer\Contracts\VersionInterface
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
trait Compares
{
    /**
     * Compares version one greater than version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function gt(VersionInterface $version): bool
    {
        return Comparator::gt($this, $version);
    }

    /**
     * Compares version one greater than or equal to version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function gte(VersionInterface $version): bool
    {
        return Comparator::gte($this, $version);
    }

    /**
     * Compares version one less than version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function lt(VersionInterface $version): bool
    {
        return Comparator::lt($this, $version);
    }

    /**
     * Compares version one less than or equal to version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function lte(VersionInterface $version): bool
    {
        return Comparator::lte($this, $version);
    }

    /**
     * Compares version one equal to version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function eq(VersionInterface $version): bool
    {
        return Comparator::eq($this, $version);
    }

    /**
     * Compares version one not equal to version two
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function ne(VersionInterface $version): bool
    {
        return Comparator::ne($this, $version);
    }

}