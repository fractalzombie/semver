<?php

namespace Fractal\SemVer\Tests;


use Fractal\SemVer\Operator;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class TestCase extends BaseTestCase
{
    protected const VALID_TEST_VERSION_ONE = '1.0.1';
    protected const VALID_TEST_VERSION_TWO = '1.0.2';
    protected const VALID_TEST_VERSION_THREE = '1.1.3';
    protected const VALID_TEST_VERSION_FOUR = '2.1.0';
    protected const NOT_VALID_TEST_VERSION = '1.0';

    protected $operators = [
        Operator::GREATER,
        Operator::GREATER_OR_EQUAL,
        Operator::LESS,
        Operator::LESS_OR_EQUAL,
        Operator::EQUAL,
        Operator::NOT_EQUAL,
    ];

    protected $fakeOperators = [
        Operator::GREATER . '_NOT',
        Operator::GREATER_OR_EQUAL . '_NOT',
        Operator::LESS . '_NOT',
        Operator::LESS_OR_EQUAL . '_NOT',
        Operator::EQUAL . '_NOT',
        Operator::NOT_EQUAL . '_NOT',
    ];
}