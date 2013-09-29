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
}

/*
 *************************************
 * String Comparison
 *************************************
 */
// strcmp function - case-sensitive
echo PHP_EOL.'Using strcmp function - case-sensitive'.PHP_EOL;
print_r(strcmp(Strings::$ONE, Strings::$FIVE)."\n");    // 'hello' vs "hello" = 0
print_r(strcmp(Strings::$THREE, Strings::$FOUR)."\n");  // 'Portugal' vs 'Lisbon' = 4
print_r(strcmp(Strings::$TWO, Strings::$FIVE)."\n");    // 'Hello' vs "hello" = -32
print_r(strcmp(Strings::$TWO, Strings::$ONE)."\n");     // 'Hello' vs 'hello' = -32
print_r(strcmp(Strings::$ONE, Strings::$TWO)."\n");     // 'hello' vs 'Hello' = 32
print_r(strcmp('1', '0125')."\n");                      // '1' vs '0125' = 1
print_r(strcmp('1', 1)."\n");                           // '1' vs 1 = 0
print_r(strcmp('1', 01)."\n");                          // '1' vs 01 = 0
print_r(strcmp('01', 01)."\n");                         // '01' vs 01 = -1
print_r(strcmp('1', '01')."\n");                        // '1' vs '01' = 1
print_r(strcmp('125', '25')."\n");                      // '125' vs '25' = -1
print_r(strcmp('50', '125')."\n");                      // '50' vs '125' = 4

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
