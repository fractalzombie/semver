<?php

namespace Fractal\SemVer\Contracts;


/**
 * Interface CompareInterface
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
interface CompareInterface
{
    /**
     * Compares this greater than version
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function gt(VersionInterface $version): bool;

    /**
     * Compares this greater than or equal to version
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function gte(VersionInterface $version): bool;

    /**
     * Compares this less than version
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function lt(VersionInterface $version): bool;

    /**
     * Compares this less than or equal to version
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function lte(VersionInterface $version): bool;

    /**
     * Compares this equal to version
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function eq(VersionInterface $version): bool;

    /**
     * Compares this not equal to version
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $version
     *
     * @return bool
     *
     * @throws \Fractal\SemVer\Exceptions\InvalidOperatorException
     * @throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
     */
    public function ne(VersionInterface $version): bool;
}