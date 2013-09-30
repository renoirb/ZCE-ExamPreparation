<?php
/**
 * This file is part of the ZCE - Exam Preparation package.
 *
 * (c) Daniel Gomes <me@danielcsgomes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ZCE\StringsAndPatterns;

/**
 * Some String examples and functions usage
 *
 * @author Daniel Gomes <me@danielcsgomes.com>
 */
class Strings
{
    static $ONE     = 'hello';
    static $TWO     = 'Hello';
    static $THREE   = 'Portugal';
    static $FOUR    = 'Lisbon';
    static $FIVE    = "hello";
    static $SIX     = 'Ballot';
    static $EMAIL   = 'hello@hello.com';
    static $ARRAY_STRING = array(
        '@'    => ' at ',
        '.'    => ' dot '
    );

    static $IP      = '192.168.0.1';

    public static function asciiRange($start, $stop)
    {
        $out = '';

        if($stop > 256 || $stop < 0 || $start > 256 || $start < 0) {
            throw new Exception('ASCII range is limited to 0..256');
        }

        for ($i = $start; $i <= $stop; ++$i) {
          $out .= '    - chr('.$i.') will output "'.chr($i).'"'.PHP_EOL;
        }

        return $out;
    }

    public static function asciiValue($word)
    {
        $sum = 0;
        $len = strlen($word);
        die($len);
        for($i = 0;$i <= $len; ++$i) {
            $sum .= substr($word,$i);
        }

        return $sum;
    }

    /**
     * [AsciiToInt description]
     *
     * Origin: http://php.net/manual/en/function.ord.php
     *
     * @param string $char An ASCII valid character
     */
    public static function AsciiToInt($word){
        $success = "";
        $len = strlen($word);
        $sum = 0;
        if($len == 1) {
            return "char(".ord($word).")";
        } elseif($len > 256) {
            throw new Exception('Character "'.$word.'" is out of ASCII range');
        } else {
            for($i = 0; $i < $len; $i++){
                if($i == $len - 1) {
                    $success = $success.ord($word[$i]);
                } else {
                    $success = $success.ord($word[$i]).",";
                }
                $sum += ord($word[$i]);
            }
            return 'word "'.$word.'" has ASCII chars = {'.$success.'}, with sum: '.$sum;
        }
    }
}


echo PHP_EOL.'List ASCII character value and its position representation:'.PHP_EOL;
echo PHP_EOL.'  48..57 represent in ASCII 0..9 numbers:'.PHP_EOL;
echo Strings::asciiRange(48,57).PHP_EOL;
echo PHP_EOL.'  65..90 represent in ASCII alphabet UPPER case:'.PHP_EOL;
echo Strings::asciiRange(65,90).PHP_EOL;
echo PHP_EOL.'  97..122 represent in ASCII alphabet in lower CASE:'.PHP_EOL;
echo Strings::asciiRange(97,122).PHP_EOL;

echo PHP_EOL.'Sum of each letter ASCII value of a word:'.PHP_EOL;
echo '  - '.Strings::AsciiToInt('Hello').PHP_EOL;
echo '  - '.Strings::AsciiToInt('hello').PHP_EOL;
echo '  - '.Strings::AsciiToInt('Portugal').PHP_EOL;
echo '  - '.Strings::AsciiToInt('Lisbon').PHP_EOL;

/*
 *************************************
 * String Comparison
 *************************************
 * Ref: http://php.net/manual/en/function.strcmp.php
 *
 * Remember that it is neither the length of the word, nor
 * the difference. But the difference between the sum of
 */
// strcmp function - case-sensitive
echo PHP_EOL.'Using strcmp function - case-sensitive:'.PHP_EOL;
print_r(strcmp("hello", 'hello')    .PHP_EOL);  // -32
print_r(strcmp('hello',"hello")     .PHP_EOL);  // 0
print_r(strcmp('Portugal','Lisbon') .PHP_EOL);  // 4
print_r(strcmp('Lisbon','Portugal') .PHP_EOL);  // -4
print_r(strcmp('Hello', "hello")    .PHP_EOL);  // -32
print_r(strcmp('Hello', 'hello')    .PHP_EOL);  // -32
print_r(strcmp('hello', 'Hello')    .PHP_EOL);  // 32
print_r(strcmp('1', '0125')         .PHP_EOL);  // 1
print_r(strcmp('1', 1)              .PHP_EOL);  // 0
print_r(strcmp('1', 01)             .PHP_EOL);  // 0
print_r(strcmp('01', 01)            .PHP_EOL);  // -1
print_r(strcmp('1', '01')           .PHP_EOL);  // 1
print_r(strcmp('125', '25')         .PHP_EOL);  // -1
print_r(strcmp('50', '125')         .PHP_EOL);  // 4

// strcmp function - case-insensitive
echo PHP_EOL.'Using strcmp function - case-insensitive'.PHP_EOL;
print_r(strcasecmp(Strings::$ONE, Strings::$TWO)."\n");     // 'hello' vs 'Hello' = 0

// similar_text
echo PHP_EOL.'Using similar_text'.PHP_EOL;
print_r(similar_text(Strings::$ONE, Strings::$FIVE)."\n");    // 'hello' vs "hello" = 5

// levenshtein
echo PHP_EOL.'Using levenshtein'.PHP_EOL;
print_r(similar_text(Strings::$FIVE, Strings::$SIX)."\n");    // "hello" vs 'Ballot' = 3 (llo)

// Comparison Operators
echo PHP_EOL.'Comparison Operators'.PHP_EOL;
print_r((Strings::$ONE == Strings::$FIVE) ? "1\n" : "0\n");
print_r((Strings::$ONE === Strings::$FIVE) ? "1\n" : "0\n");
print_r((Strings::$ONE === Strings::$TWO) ? "1\n" : "0\n");
print_r((Strings::$ONE == Strings::$TWO) ? "1\n" : "0\n");


//String translate
echo PHP_EOL.'String translate'.PHP_EOL;
print_r(strtr(Strings::$EMAIL, Strings::$ARRAY_STRING)); // output: hello at hello dot com


// nl2br
echo PHP_EOL.'nl2br'.PHP_EOL;
$str = nl2br("foo\nbar");
echo $str.PHP_EOL;

$str = str_replace("\n", "", $str);
print_r($str.PHP_EOL);

echo nl2br($str).PHP_EOL;
