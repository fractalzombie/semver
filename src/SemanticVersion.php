<?php

namespace Fractal\SemVer;


use Fractal\SemVer\Contracts\VersionInterface;
use Fractal\SemVer\Exceptions\ParseVersionException;
use Fractal\SemVer\Traits\Compares;

/**
 * Class SemanticVersion
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class SemanticVersion implements VersionInterface
{
    use Compares;

    /**
     * Regex patter for version validation.
     *
     * @var string
     */
    protected const REGEX_PATTERN = '/^([0-9]+)\.([0-9]+)\.([0-9]+)/i';

    /**
     * @var int
     */
    protected $major;

    /**
     * @var int
     */
    protected $minor;

    /**
     * @var int
     */
    protected $patch;

    /**
     * Version constructor.
     *
     * @param int $major
     * @param int $minor
     * @param int $patch
     */
    protected function __construct(int $major, int $minor, int $patch)
    {
        $this->major = $major;
        $this->minor = $minor;
        $this->patch = $patch;
    }

    /**
     * Creates new Version from string.
     *
     * @param string $version
     *
     * @return \Fractal\SemVer\Contracts\VersionInterface
     *
     * @throws \Fractal\SemVer\Exceptions\ParseVersionException
     */
    public static function fromString(string $version): VersionInterface
    {
        if (!preg_match(static::REGEX_PATTERN, $version)) {
            throw new ParseVersionException('major.minor.patch', $version);
        }

        [$major, $minor, $patch] = explode('.', $version);

        return new static((int)$major, (int)$minor, (int)$patch);
    }

    /**
     * Convert Version to string.
     *
     * @param bool $withPatch
     *
     * @return string
     */
    public function version(bool $withPatch = true): string
    {
        return ($withPatch)
            ? "{$this->major}.{$this->minor}.{$this->patch}"
            : "{$this->major}.{$this->minor}";
    }

    /**
     * Convert Version to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->version();
    }
}