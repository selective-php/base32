<?php

namespace Selective\Base32\Test;

use PHPUnit\Framework\TestCase;
use Selective\Base32\Base32;

/**
 * Test.
 *
 * @coversDefaultClass \Selective\Base32\Base32
 */
class Base32Test extends TestCase
{

    /**
     * Test.
     *
     * @covers ::encode
     *
     * @return void
     */
    public function testEncode()
    {
        $base32 = new Base32();

        $enc = $base32->encode('');
        $this->assertEquals('', $enc);

        $enc = $base32->encode('abc 1234');
        $this->assertEquals('MFRGGIBRGIZTI===', $enc);

        $enc = $base32->encode('abc 1234', false);
        $this->assertEquals('MFRGGIBRGIZTI', $enc);

        $enc = $base32->encode("\0€ÿ", false);
        $this->assertEquals('ADRIFLGDX4', $enc);
    }

    /**
     * Test.
     *
     * @covers ::decode
     *
     * @return void
     */
    public function testDecode()
    {
        $base32 = new Base32();
        $dec = $base32->decode('');
        $this->assertSame('', $dec);

        $dec = $base32->decode('MFRGGIBRGIZTI====');
        $this->assertEquals('abc 1234', $dec);

        $dec = $base32->decode('MFRGGIBRGIZTI');
        $this->assertEquals('abc 1234', $dec);

        $dec = $base32->decode('ADRIFLGDX4');
        $this->assertEquals("\0€ÿ", $dec);

        $dec = $base32->decode('mfrggibrgizti');
        $this->assertEquals('abc 1234', $dec);
    }
}
