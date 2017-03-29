# Base36
Base36 string encode and decode.

## Usage

```php
$str = "abc 1234";

// Encode
$enc = Base32::encode($str);

// Decode
echo Base32::decode($enc);
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

## Credits to
* http://php.net/manual/de/function.base-convert.php#102232

