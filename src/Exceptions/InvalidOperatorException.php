<?php

namespace Fractal\SemVer\Exceptions;


/**
 * Class InvalidOperatorException
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class InvalidOperatorException extends \LogicException
{
    /**
     * InvalidOperatorException constructor.
     *
     * @param string $operator
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $operator, int $code = 0, \Throwable $previous = null)
    {
        parent::__construct("Unrecognized operator: {$operator}.", $code, $previous);
    }
}