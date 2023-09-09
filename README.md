# Base32

[![Latest Version on Packagist](https://img.shields.io/github/release/selective-php/base32.svg)](https://packagist.org/packages/selective/base32)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE.md)
[![Build Status](https://github.com/selective-php/base32/workflows/build/badge.svg)](https://github.com/selective-php/base32/actions)
[![Coverage Status](https://scrutinizer-ci.com/g/selective-php/base32/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/selective-php/base32/code-structure)
[![Quality Score](https://scrutinizer-ci.com/g/selective-php/base32/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/selective-php/base32/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/selective/base32.svg)](https://packagist.org/packages/selective/base32/stats)

Base32 string encoder based on [RFC 4648](https://tools.ietf.org/html/rfc4648#section-6).

## Installation

Via Composer

```
$ composer require selective/base32
```

## Requirements

* PHP 8.1+

## Usage

```php
<?php

use Selective\Base32\Base32;

$str = 'abc 1234';

$base32 = new Base32();

// Encode
// MFRGGIBRGIZTI====
$encoded = $base32->encode($str);

// Decode
// abc 1234
echo $base32->decode($encoded); 
```

### Without padding and only lowercase

```php
<?php

$str = 'abc 1234';

// Encode
$encoded = $base32->encode($str, false);

// mfrggibrgizti
$encoded = strtolower($enc); 

// Decode
echo $base32->decode($encoded);
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
