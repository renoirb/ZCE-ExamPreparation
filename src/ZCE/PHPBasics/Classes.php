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

class Animal {
  protected $typical_saying ='(nothing)';
  protected $name;

  public function __construct($name, $type = 'Animal') {
    $this->name = $name;
    $this->type = $type;
  }

  public static function talkMethodName()
  {
    return __METHOD__;
  }

  public function talk()
  {
    return $this->typical_saying;
  }

  public function scream()
  {
    return strtoupper($this->talk()).'!!1';
  }

  public function __toString()
  {
    return "Animal {type: '{$this->type}', name: '{$this->name}'} says: ".$this->talk();
  }


  // http://php.net/manual/en/language.oop5.late-static-bindings.php
  public static function getMethodMagicConstantValue()
  {
    return __METHOD__;
  }


  // http://php.net/manual/en/language.oop5.late-static-bindings.php
  public static function getFunctionMagicConstantValue()
  {
    return __FUNCTION__;
  }
}

class Dog extends Animal {
  protected $typical_saying = 'Woof woooof';

  public function __construct($name)
  {
    parent::__construct($name,__CLASS__);
  }
}

class Cat extends Animal {
  protected $typical_saying = 'Meeeow';

  public function __construct($name)
  {
    parent::__construct($name,__CLASS__);
  }

  public function useOverload()
  {
    return self::getMethodMagicConstantValue();
  }

  // http://php.net/manual/en/language.oop5.late-static-bindings.php
  public static function lateStaticBinding()
  {
    return __METHOD__;
  }
}



echo 'Playing around Late static binding and class magic constants'.PHP_EOL;

echo PHP_EOL.'Use of Animal'.PHP_EOL;
$t = new Animal('Geek', 'Gecko');
echo $t->getMethodMagicConstantValue().PHP_EOL;
echo $t->getFunctionMagicConstantValue().PHP_EOL;
echo $t;

echo PHP_EOL.PHP_EOL.'Use of Cat'.PHP_EOL;
$t = new Cat('Sacha');
echo $t->getMethodMagicConstantValue().PHP_EOL;
echo $t::lateStaticBinding().PHP_EOL;
echo $t::useOverload().PHP_EOL;
echo 'screams: '.$t->scream().PHP_EOL;
echo $t;



echo PHP_EOL.PHP_EOL.'Use of Dog'.PHP_EOL;
$t = new Dog('Pup');
echo 'screams: '.$t->scream().PHP_EOL;
echo $t;

echo PHP_EOL;
