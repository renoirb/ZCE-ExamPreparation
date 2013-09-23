<?php
/**
 * This file is part of the ZCE Preparation Exam package.
 *
 * (c) Daniel Gomes <me@danielcsgomes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ZCE\PHPBasics;

/**
 * Variables types and scope
 *
 * @author Daniel Gomes <me@danielcsgomes.com>
 */

/**
 * Globals variables
 * url: http://php.net/manual/en/language.variables.scope.php
 *
 */
function globals()
{

    // Using PHP-defined $Globals Array
    $GLOBALS["sum"] = $GLOBALS["x"]+$GLOBALS["y"];
    printf("The Sum of %d with %d is: %d", $GLOBALS["x"],$GLOBALS["y"],$GLOBALS["sum"]);

    // Using global keyword
    global $mul, $x, $y;
    $mul = $x * $y;
    printf(PHP_EOL."The Multiplication of %d with %d is: %d", $x,$y ,$mul);
}

/**
 * Usage of static variables inside functions
 * url: http://php.net/manual/en/language.variables.scope.php
 *
 */
function statics()
{
    static $a = 0;
    $b = 0;
    printf(PHP_EOL."Value of a: %d and b: %d", $a, $b);
    $a++; $b++;
}
//Declared the values to the global variables
$x = 20; $y = 20;

echo PHP_EOL.'the sum and multiplication of x and y';
globals(); // outputs the sum and multiplication of x and y

statics(); // outputs a = b = 0
statics(); // outputs a = 1 & b = 0
statics(); // outputs a = 2 & b = 0
statics(); // outputs a = 3 & b = 0

echo PHP_EOL.PHP_EOL;

$y = 3; $x = 1;
// See: http://www.php.net/manual/en/language.variables.basics.php
echo 'Flipping variable values in three steps. Initial values: $y=3, $x=1'.PHP_EOL;

$y^=$x;  echo '1: $y^=$x, gives: $x = '.$x.', $y = '.$y.PHP_EOL;  // outputs $x = 1, $y = 2
$x^=$y;  echo '2: $x^=$y, gives: $x = '.$x.', $y = '.$y.PHP_EOL;  // outputs $x = 3, $y = 2
$y^=$x;  echo '3: $y^=$x, gives (values should be flipped): $x = '.$x.', $y = '.$y.PHP_EOL; // outputs $x = 3, $y = 1 the opposite as the begining

echo 'Test constants and empty checks';
define('MYCONSTANT',1);
define('MYCONSTANT2',0);
define('EMPTY','');

if(!empty(EMPTY)){
    if (!((boolean) _CONSTANT)) {
        print 'Should be seen?';
    }
}