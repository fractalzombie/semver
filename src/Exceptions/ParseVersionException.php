<?php

namespace Fractal\SemVer\Exceptions;


/**
 * Class ParseVersionException
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class ParseVersionException extends \LogicException
{
    /**
     * ParseVersionException constructor.
     *
     * @param string $template
     * @param string $given
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $template, string $given, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct("Version template must be {$template}, given: {$given}.", $code, $previous);
    }
}
