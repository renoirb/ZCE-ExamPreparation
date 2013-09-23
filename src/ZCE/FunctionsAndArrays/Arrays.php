<?php
/**
 * This file is part of the ZCE Preparation Exam package.
 *
 * (c) Daniel Gomes <me@danielcsgomes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ZCE\FunctionsAndArrays;

/**
 * Arrays examples and practices
 */
class Arrays
{
    public static $arrayOne = array(
            "php",              // Gets overwritten by index 0
            0 => "zce",
            1 => "zend",
            5 => "symfony2",
            3 => "drupal",
            "wordpress",
            10,
            9 => "javascript"
        );

    public static $arrayTwo = array(
            "mysql",
            1,
            10 => "NoSQL",
            2,
            3 => "MongoDB",
            2 => "Doctrine",
            "ORM",
            9 => "redis",
            5
        );
}

echo 'Look how ordering works'.PHP_EOL;
var_dump(Arrays::$arrayOne);
var_dump(Arrays::$arrayTwo);

echo PHP_EOL;

echo 'Ordering an array and playing with function passing value by reference'.PHP_EOL;
// asort's first argument is passed by reference
$array_copy = Arrays::$arrayOne;
asort($array_copy);
var_dump($array_copy);
$array_ref =& Arrays::$arrayOne;
asort($array_ref);
var_dump($array_ref);
echo 'BEWARE: We just modified the static member array'.PHP_EOL;
var_dump(Arrays::$arrayOne);

echo PHP_EOL;

echo 'Merging arrays with the + operator on two arrays'.PHP_EOL;
$new_array = Arrays::$arrayOne + Arrays::$arrayTwo;
var_dump($new_array);

echo PHP_EOL;