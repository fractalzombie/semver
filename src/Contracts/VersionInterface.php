<?php

namespace Fractal\SemVer\Contracts;


/**
 * Interface VersionInterface
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
interface VersionInterface extends CompareInterface
{
    /**
     * Creates new Version from string.
     *
     * @param string $version
     *
     * @return \Fractal\SemVer\Contracts\VersionInterface
     *
     * @throws \Fractal\SemVer\Exceptions\ParseVersionException
     */
    public static function fromString(string $version): VersionInterface;

    /**
     * Convert Version to string.
     *
     * @param bool $withPatch
     *
     * @return string
     */
    public function version(bool $withPatch = true): string;

    /**
     * Convert Version to string.
     *
     * @return string
     */
    public function __toString(): string;
}