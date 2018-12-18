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
}