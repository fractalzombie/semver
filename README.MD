# The package helps to work with semantic versions.

##### Coverage and Quality:
[![Coverage Status](https://coveralls.io/repos/github/fractalzombie/semver/badge.svg?branch=%28HEAD+detached+at+8700d1b%29)](https://coveralls.io/github/fractalzombie/semver?branch=%28HEAD+detached+at+8700d1b%29)
[![Code Coverage](https://scrutinizer-ci.com/g/fractalzombie/semver/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/fractalzombie/semver/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fractalzombie/semver/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/fractalzombie/semver/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/fractalzombie/semver/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![codecov.io](https://codecov.io/gh/fractalzombie/semver/branch/master/graphs/badge.svg?branch=master)](https://codecov.io/gh/fractalzombie/semver?branch=master)
##### Build:
[![Build Status](https://travis-ci.org/fractalzombie/semver.svg?branch=master)](https://travis-ci.org/fractalzombie/semver)
[![Build Status](https://scrutinizer-ci.com/g/fractalzombie/semver/badges/build.png?b=master)](https://scrutinizer-ci.com/g/fractalzombie/semver/build-status/master)
##### Other:
[![Latest Stable Version](https://poser.pugx.org/fractal/semver/v/stable)](https://packagist.org/packages/fractal/semver)
[![Total Downloads](https://poser.pugx.org/fractal/semver/downloads)](https://packagist.org/packages/fractal/semver)
[![License](https://poser.pugx.org/fractal/semver/license)](https://packagist.org/packages/fractal/semver)



## Features

* Simple package for semantic version manipulation.
* Compare semantic version.
* Validates semantic version.
* Throws exceptions if Versions are not instance of each other.

## Usage

#### Fractal\SemVer\SemanticVersion class:
```php
<?php
    
use Fractal\SemVer\SemanticVersion;
    
## Create instance of SemVer
## If SemVer not valid, throws \Fractal\SemVer\Exceptions\ParseVersionException
$version = SemanticVersion::fromString('1.0.0'); # \Fractal\SemVer\Contracts\VersionInterface
$other = SemanticVersion::fromString('0.1.0'); # \Fractal\SemVer\Contracts\VersionInterface

## Version can compare each other
## If compare operator not valid, throws \Fractal\SemVer\Exceptions\InvalidOperatorException
## If version and other version are not instance of each other, throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
$version->eq($other); # false
$version->gte($other); # true
```

#### Fractal\SemVer\Comparator class:
```php
<?php
    
use Fractal\SemVer\SemanticVersion;
use Fractal\SemVer\Comparator;
    
## Create instance of SemVer
## If SemVer not valid, throws \Fractal\SemVer\Exceptions\ParseVersionException
$version = SemanticVersion::fromString('1.0.0'); # \Fractal\SemVer\Contracts\VersionInterface
$other = SemanticVersion::fromString('0.1.0'); # \Fractal\SemVer\Contracts\VersionInterface

## Compare versions with comparator
## If compare operator not valid, throws \Fractal\SemVer\Exceptions\InvalidOperatorException
## If version and other version are not instance of each other, throws \Fractal\SemVer\Exceptions\VersionClassNotEqualException
Comparator::eq($version, $other); # false
Comparator::gte($version, $other); # true
```

## License

The SemVer package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
