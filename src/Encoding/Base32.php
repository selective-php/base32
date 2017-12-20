<?php

namespace Odan\Encoding;

/**
 * Encode in Base32 based on RFC 4648.
 *
 * @author Bryan Ruiz
 */
class Base32
{
    /**
     * @var array
     */
    protected $map = array(
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', //  7
        'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', // 15
        'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', // 23
        'Y', 'Z', '2', '3', '4', '5', '6', '7', // 31
        '='  // padding char
    );

    /**
     * @var array
     */
    protected $flippedMap = array(
        'A' => '0', 'B' => '1', 'C' => '2', 'D' => '3', 'E' => '4', 'F' => '5', 'G' => '6', 'H' => '7',
        'I' => '8', 'J' => '9', 'K' => '10', 'L' => '11', 'M' => '12', 'N' => '13', 'O' => '14', 'P' => '15',
        'Q' => '16', 'R' => '17', 'S' => '18', 'T' => '19', 'U' => '20', 'V' => '21', 'W' => '22', 'X' => '23',
        'Y' => '24', 'Z' => '25', '2' => '26', '3' => '27', '4' => '28', '5' => '29', '6' => '30', '7' => '31'
    );

    /**
     * Encodes data with base32.
     *
     * @param string $input The original data, as a string.
     * @param bool $padding Use padding false when encoding for urls
     * @return string Base32 encoded string
     */
    public function encode($input, $padding = true)
    {
        if (empty($input)) {
            return "";
        }
        $input = str_split($input);
        $binaryString = "";
        $inputCount = count($input);
        for ($i = 0; $i < $inputCount; $i++) {
            $binaryString .= str_pad(base_convert(ord($input[$i]), 10, 2), 8, '0', STR_PAD_LEFT);
        }
        $fiveBitBinaryArray = str_split($binaryString, 5);
        $base32 = "";
        $i = 0;
        $fiveCount = count($fiveBitBinaryArray);
        while ($i < $fiveCount) {
            $base32 .= $this->map[base_convert(str_pad($fiveBitBinaryArray[$i], 5, '0'), 2, 10)];
            $i++;
        }
        if ($padding && ($x = strlen($binaryString) % 40) != 0) {
            if ($x == 8) {
                $base32 .= str_repeat($this->map[32], 6);
            } else {
                if ($x == 16) {
                    $base32 .= str_repeat($this->map[32], 4);
                } else {
                    if ($x == 24) {
                        $base32 .= str_repeat($this->map[32], 3);
                    } else {
                        if ($x == 32) {
                            $base32 .= $this->map[32];
                        }
                    }
                }
            }
        }
        return $base32;
    }

    /**
     * Decodes data encoded with base32.
     *
     * @param string $input The encoded data.
     * @return bool|string the original data or false on failure.
     */
    public function decode($input)
    {
        if (empty($input)) {
            return false;
        }
        $paddingCharCount = substr_count($input, $this->map[32]);
        $allowedValues = array(6, 4, 3, 1, 0);
        if (!in_array($paddingCharCount, $allowedValues)) {
            return false;
        }
        for ($i = 0; $i < 4; $i++) {
            if ($paddingCharCount == $allowedValues[$i] &&
                substr($input, -($allowedValues[$i])) != str_repeat($this->map[32], $allowedValues[$i])
            ) {
                return false;
            }
        }
        $input = str_replace('=', '', $input);
        $input = str_split($input);
        $binaryString = "";
        $count = count($input);
        for ($i = 0; $i < $count; $i = $i + 8) {
            $x = "";
            if (!in_array($input[$i], $this->map)) {
                return false;
            }
            for ($j = 0; $j < 8; $j++) {
                if (!isset($input[$i + $j])) {
                    continue;
                }
                $x .= str_pad(base_convert($this->flippedMap[$input[$i + $j]], 10, 2), 5, '0', STR_PAD_LEFT);
            }
            $eightBits = str_split($x, 8);
            $bitCount = count($eightBits);
            for ($z = 0; $z < $bitCount; $z++) {
                $binaryString .= (($y = chr(base_convert($eightBits[$z], 2, 10))) || ord($y) == 48) ? $y : "";
            }
        }
        // Converting a binary (\0 terminated) string to a PHP string
        $result = rtrim($binaryString, "\0");
        return $result;
    }
}
