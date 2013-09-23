<?php

/**
 * This file is part of the ZCE - Exam Preparation package.
 *
 * (c) Daniel Gomes <me@danielcsgomes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$numA = 12;
$numB = 4;


//Bitwise Operators
printf("%d (%b) = (%b << %b)\n", 2 << 2, 2 << 2, 2, 2); // 8 (1000) = (10 << 10)
printf("%d (%b) = (%b ^ %b)\n", $numA ^ $numB,$numA ^ $numB,$numA,$numB); // 8 (1000) = (1100 ^ 100)
printf("%d (%b) = (%b | %b)\n", $numA | $numB,$numA | $numB,$numA,$numB); // 12 (1100) = (1100 | 100)
printf("%d (%b) = (%b & %b)\n", $numA & $numB,$numA & $numB,$numA,$numB); //4 (100) = (1100 & 100)
printf("%d (%b) = (%b >> %b)\n", 16 >> 2, 16 >> 2, 16, 2); // 4 (100) = (10000 >> 10)

echo PHP_EOL;
/**
 * Bitwise output formatter example
 * http://php.net/manual/en/language.operators.bitwise.php
 */
$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
        . ' %3$s (%4$2d = %4$04b)' . "\n";
echo <<<EOH
 ---------     ---------  -- ---------
 result        value      op test
 ---------     ---------  -- ---------
EOH;

$values = array(0, 1, 2, 4, 8);
$test = 1 + 4;

echo "\n Bitwise AND \n";
foreach ($values as $value) {
    $result = $value & $test;
    printf($format, $result, $value, '&', $test);
}
echo "\n Bitwise OR \n";
foreach ($values as $value) {
    $result = $value | $test;
    printf($format, $result, $value, '|', $test);
}
echo "\n Bitwise exclusive OR (XOR) \n";
foreach ($values as $value) {
    $result = $value ^ $test;
    printf($format, $result, $value, '^', $test);
}
echo PHP_EOL;

echo 'Incrementing and Decrementing operators'.PHP_EOL;
$test = $numA++; printf("\$test = %d , \$numA = %d\n", $test, $numA);
$test = ++$numB; printf("\$test = %d , \$numA = %d\n", $test, $numB);
$test = $numA--; printf("\$test = %d , \$numA = %d\n", $test, $numA);
$test = --$numB; printf("\$test = %d , \$numA = %d\n", $test, $numB);

echo PHP_EOL;

echo 'Testing operations'.PHP_EOL;
$test = var_export(true and true,1); printf("TRUE and TRUE : %s (Should be true, because both are true)", $test); echo PHP_EOL;
$test = var_export(true && true,1); printf("TRUE && TRUE : %s (Should be true, because both are true)", $test); echo PHP_EOL;
$test = var_export(true && false,1); printf("TRUE && FALSE : %s (Should be false, because NOT both are true)", $test); echo PHP_EOL;
$test = var_export(true or true,1); printf("TRUE or TRUE : %s (Should be true, because one of them is true)", $test); echo PHP_EOL;
$test = var_export(true || true,1); printf("TRUE || TRUE : %s (Should be true, because one of them is true)", $test); echo PHP_EOL;
$test = var_export(true xor true,1); printf("TRUE xor TRUE : %s (Should be false, because only ONE of them CAN be true)", $test); echo PHP_EOL;
$test = var_export(true xor false,1); printf("TRUE xor FALSE : %s (Should be true, because only ONE of them CAN be true)", $test); echo PHP_EOL;
echo PHP_EOL;

echo 'Hexadecimal math'.PHP_EOL;
$calc = 0xAF * 2; printf("(int) 0xAF = %d , \$calc=%d (Multiply hexadecimal 0xAF by decimal 2)\n", 0xAF, $calc);
$calc = 0xAF * 0x2; printf("(int) 0xAF = %d , \$calc=%d (Multiply hexadecimal 0xAF by also hexadecimal 0x2)\n", 0xAF, $calc);
