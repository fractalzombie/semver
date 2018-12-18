<?php

namespace Fractal\SemVer\Tests;


use Fractal\SemVer\Contracts\VersionInterface;
use Fractal\SemVer\Exceptions\ParseVersionException;
use Fractal\SemVer\SemanticVersion;

/**
 * Class SemanticVersionTest
 *
 * @author Mikhail Shtanko <fractalzombie@gmail.com>
 */
class SemanticVersionTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_created_from_valid_version_string()
    {
        $version = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);

        $this->assertInstanceOf(
            VersionInterface::class, $version
        );

        $this->assertTrue((string)$version === static::VALID_TEST_VERSION_ONE);
    }

    /**
     * @test
     */
    public function it_can_be_formatted_as_valid_version_string_from_to_string_method()
    {
        $version = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);

        $this->assertInstanceOf(
            VersionInterface::class, $version
        );

        $this->assertIsString($version->__toString());
        $this->assertTrue($version->__toString() === static::VALID_TEST_VERSION_ONE);
    }

    /**
     * @test
     */
    public function it_can_be_formatted_as_valid_version_string_from_version_method()
    {
        $version = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);

        $this->assertInstanceOf(
            VersionInterface::class, $version
        );

        $this->assertIsString($version->version());
        $this->assertTrue($version->version() === static::VALID_TEST_VERSION_ONE);
        $this->assertTrue($version->version(false) === static::NOT_VALID_TEST_VERSION);
    }

    /**
     * @test
     */
    public function it_cant_be_created_from_not_valid_version_string()
    {
        $this->expectException(ParseVersionException::class);
        $version = SemanticVersion::fromString(static::NOT_VALID_TEST_VERSION);

        $this->assertNotInstanceOf(
            VersionInterface::class, $version
        );
    }

    /**
     * @test
     */
    public function it_cant_compare_with_greater_than_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);

        $this->assertFalse($one->gt($two));
        $this->assertTrue($two->gt($one));
    }

    /**
     * @test
     */
    public function it_cant_compare_with_greater_than_or_equal_to_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $anotherOne = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);

        $this->assertFalse($one->gte($two));
        $this->assertTrue($two->gte($one));
        $this->assertTrue($one->gte($anotherOne));
    }

    /**
     * @test
     */
    public function it_cant_compare_with_less_than_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);

        $this->assertFalse($two->lt($one));
        $this->assertTrue($one->lt($two));
    }

    /**
     * @test
     */
    public function it_cant_compare_with_less_than_or_equal_to_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $anotherOne = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);

        $this->assertFalse($two->lte($one));
        $this->assertTrue($one->lte($two));
        $this->assertTrue($one->lte($anotherOne));
    }

    /**
     * @test
     */
    public function it_cant_compare_with_equal_to_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $anotherOne = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);

        $this->assertFalse($two->eq($one));
        $this->assertTrue($one->eq($anotherOne));
    }

    /**
     * @test
     */
    public function it_cant_compare_with_not_equal_to_operator()
    {
        $one = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $anotherOne = SemanticVersion::fromString(static::VALID_TEST_VERSION_ONE);
        $two = SemanticVersion::fromString(static::VALID_TEST_VERSION_TWO);

        $this->assertFalse($one->ne($anotherOne));
        $this->assertTrue($one->ne($two));
    }
}