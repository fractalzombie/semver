<?php

namespace Fractal\SemVer\Exceptions;


use Fractal\SemVer\Contracts\VersionInterface;

/**
 * Class VersionClassNotEqualException
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class VersionClassNotEqualException extends \LogicException
{
    /**
     * ParseVersionException constructor.
     *
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(VersionInterface $one, VersionInterface $two, int $code = 0, \Throwable $previous = null)
    {
        $first = \get_class($one);
        $second = \get_class($two);
        parent::__construct("Version class are not equals. First is: {$first}, Second: {$second}.", $code, $previous);
    }
}
