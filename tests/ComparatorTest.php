<?php

namespace Fractal\SemVer\Tests;


use Fractal\SemVer\Comparator;
use Fractal\SemVer\Contracts\VersionInterface;
use Fractal\SemVer\Exceptions\InvalidOperatorException;
use Fractal\SemVer\Exceptions\VersionClassNotEqualException;
use Fractal\SemVer\Operator;
use Fractal\SemVer\SemanticVersion;
use Fractal\SemVer\Tests\Fixtures\TestVersion;

/**
 * Class ComparatorTest
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class ComparatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_compare_two_versions_with_greater_than_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);
        $three = SemanticVersion::fromString(static::VALID_TEST_VERSION_THREE);
        $four = SemanticVersion::fromString(static::VALID_TEST_VERSION_FOUR);

        $this->assertTrue(Comparator::gt($two, $one));
        $this->assertTrue(Comparator::gt($four, $one));
        $this->assertFalse(Comparator::gt($three, $four));
        $this->assertFalse(Comparator::gt($one, $two));
    }

    /**
     * @test
     */
    public function it_can_compare_two_versions_with_greater_than_or_equal_to_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);
        $three = SemanticVersion::fromString(static::VALID_TEST_VERSION_THREE);
        $four = SemanticVersion::fromString(static::VALID_TEST_VERSION_FOUR);

        $this->assertTrue(Comparator::gte($two, $one));
        $this->assertFalse(Comparator::gte($one, $two));
        $this->assertTrue(Comparator::gte($one, $one));
        $this->assertTrue(Comparator::gte($two, $two));
        $this->assertTrue(Comparator::gte($four, $one));
        $this->assertFalse(Comparator::gte($three, $four));
    }

    /**
     * @test
     */
    public function it_can_compare_two_versions_with_less_than_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);
        $three = SemanticVersion::fromString(static::VALID_TEST_VERSION_THREE);
        $four = SemanticVersion::fromString(static::VALID_TEST_VERSION_FOUR);

        $this->assertTrue(Comparator::lt($one, $two));
        $this->assertFalse(Comparator::lt($two, $one));
        $this->assertTrue(Comparator::lt($one, $four));
        $this->assertFalse(Comparator::lt($four, $three));
    }

    /**
     * @test
     */
    public function it_can_compare_two_versions_with_less_than_or_equal_to_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);
        $three = SemanticVersion::fromString(static::VALID_TEST_VERSION_THREE);
        $four = SemanticVersion::fromString(static::VALID_TEST_VERSION_FOUR);

        $this->assertTrue(Comparator::lte($one, $two));
        $this->assertFalse(Comparator::lte($two, $one));
        $this->assertTrue(Comparator::lte($one, $one));
        $this->assertTrue(Comparator::lte($two, $two));
        $this->assertTrue(Comparator::lte($one, $four));
        $this->assertFalse(Comparator::lte($four, $three));
    }

    /**
     * @test
     */
    public function it_can_compare_two_versions_with_equal_to_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $three = SemanticVersion::fromString(static::VALID_TEST_VERSION_FOUR);

        $this->assertTrue(Comparator::eq($one, $two));
        $this->assertFalse(Comparator::eq($one, $three));
    }

    /**
     * @test
     */
    public function it_can_compare_two_versions_with_not_equal_to_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $three = SemanticVersion::fromString(static::VALID_TEST_VERSION_FOUR);

        $this->assertFalse(Comparator::ne($one, $two));
        $this->assertTrue(Comparator::ne($one, $three));
    }

    /**
     * @test
     */
    public function it_can_compare_by_compare_method()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);
        $this->assertFalse($this->invokeCompareMethod($one, $two, Operator::GREATER));
    }

    /**
     * @test
     */
    public function compare_method_throws_exception_when_not_valid_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);

        foreach ($this->fakeOperators as $fakeOperator) {
            $this->expectException(InvalidOperatorException::class);
            $this->invokeCompareMethod($one, $two, $fakeOperator);
        }
    }

    /**
     * @test
     */
    public function compare_method_throws_exception_when_not_equals_two_version_class()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = TestVersion::fromString(static::VALID_TEST_VERSION_TWO);

        foreach ($this->operators as $operator) {
            $this->expectException(VersionClassNotEqualException::class);
            $this->invokeCompareMethod($one, $two, $operator);
        }
    }

    /**
     * @param \Fractal\SemVer\Contracts\VersionInterface $one
     * @param \Fractal\SemVer\Contracts\VersionInterface $two
     * @param string $operator
     *
     * @return bool
     */
    public function invokeCompareMethod(VersionInterface $one, VersionInterface $two, string $operator): bool
    {
        try {
            $reflection = new \ReflectionClass(Comparator::class);
            $method = $reflection->getMethod('compare');
            $method->setAccessible(true);

            return $method->invoke(null, $one, $two, $operator);
        } catch (\ReflectionException $e) {
            $this->addWarning($e->getMessage());

            return false;
        }
    }
}