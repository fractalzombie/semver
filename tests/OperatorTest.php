<?php

namespace Fractal\SemVer\Tests;


use Fractal\SemVer\Operator;

/**
 * Class OperatorTest
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class OperatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_has_got_needed_operator()
    {
        foreach ($this->operators as $operator) {
            $this->assertTrue(Operator::has($operator));
        }
    }

    /**
     * @test
     */
    public function it_hast_got_not_needed_operator()
    {
        foreach ($this->fakeOperators as $operator) {
            $this->assertFalse(Operator::has($operator));
        }
    }
}