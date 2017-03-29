# Base36

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Base36 string encode and decode.

## Install

Via Composer

```
$ composer require odan/base36
```

## Usage

```php
use Odan\Encoding\Base36;

$str = "abc 1234";

// Encode
$enc = Base32::encode($str); // MFRGGIBRGIZTI====

// Decode
echo Base32::decode($enc); // abc 1234
```

### Without padding and only lowercase

```php
$str = "abc 1234";

// Encode
$enc = Base32::encode($str, false);
$enc = strtolower($enc); // mfrggibrgizti

// Decode
echo Base32::decode(strtoupper($enc));
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

[ico-version]: https://img.shields.io/packagist/v/odan/base36.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/odan/base36/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/odan/base36.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/odan/base36.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/odan/base36.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/odan/base36
[link-travis]: https://travis-ci.org/odan/base36
[link-scrutinizer]: https://scrutinizer-ci.com/g/odan/base36/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/odan/base36
[link-downloads]: https://packagist.org/packages/odan/base36
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
