# Base32

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Base32 string encoder based on [RFC 4648](https://tools.ietf.org/html/rfc4648#section-6).

## Installation

Via Composer

```
$ composer require odan/base32
```

## Requirements

* PHP 7.0+

## Usage

```php
use Odan\Encoding\Base32;

$str = "abc 1234";

// Encode
$base32 = new Base32();
$enc = $base32->encode($str); // MFRGGIBRGIZTI====

// Decode
echo $base32->decode($enc); // abc 1234
```

### Without padding and only lowercase

```php
$str = "abc 1234";

// Encode
$enc = $base32->encode($str, false);
$enc = strtolower($enc); // mfrggibrgizti

// Decode
echo $base32->decode(strtoupper($enc));
```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Credits
* Bryan Ruiz

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/odan/base32.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/odan/base32/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/odan/base32.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/odan/base32.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/odan/base32.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/odan/base32
[link-travis]: https://travis-ci.org/odan/base32
[link-scrutinizer]: https://scrutinizer-ci.com/g/odan/base32/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/odan/base32
[link-downloads]: https://packagist.org/packages/odan/base32
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
