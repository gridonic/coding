<?php

namespace Drupal\example_module;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\node\Entity\Node;

/**
 * This is the best way to write documents: Php-Classes and so on.
 *
 * Here follows a longer description.
 * We have added some examples for you to see how it works.
 * And what is possible with our Drupal Coding Standards.
 *
 * @package Drupal\example_module
 */
class DrupalStandardsExampleClass {

  /**
   * The comment of this private value.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $privateValueA;

  /**
   * The comment of this other private value.
   *
   * @var \Drupal\node\Entity\Node
   */
  private $privateValueB;

  /**
   * This is the short comment of the constructor-function.
   *
   * And a longer description for this interesting comment.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $valueA
   *   This is the description of the value A.
   * @param \Drupal\node\Entity\Node $valueB
   *   This is the description of the value B.
   */
  public function __construct(EntityTypeManagerInterface $valueA,
                              Node $valueB) {
    $this->privateValueA = $valueA;
    $this->privateValueB = $valueB;
  }

  /**
   * Do you know the possible stops of a comment?
   *
   * The possible stops for a short or longer comment are:
   *  - Point .
   *  - Question mark ?
   *  - Exclamation mark !
   *  - Closing brace )
   *
   * @param array $arrayVariableA
   *   The array for variable a.
   * @param array $arrayVariableB
   *   Another array for variable b.
   *
   * @return \Drupal\node\Entity\Node
   *   This comment does not use a full stop
   */
  public function exampleFunctionA(array $arrayVariableA, array $arrayVariableB) {
    $node_storage = $this->privateValueA->getStorage('node');
    $nid = $this->privateValueB->id();

    if (isset($arrayVariableA[$nid])) {
      $nid++;
    }
    elseif (isset($arrayVariableB[$nid])) {
      $nid--;
    }

    // Add an inline comment. With a full stop at the end.
    $nodes = $node_storage->load($nid);

    // And here some other comment:
    return $nodes[$nid];
  }

  /**
   * {@inheritdoc}
   */
  public function inheritFunction() {
    // An inherit function does not need a full comment.
  }

  /**
   * @param bool $value
   *
   * @return bool|null
   */
  public function showSomeValues($value) {
    // Here some examples for writing true|false|null:
    if ($value === FALSE) {
      return FALSE;
    }
    elseif ($value === NULL) {
      return TRUE;
    }
    else {
      return NULL;
    }
  }

  /**
   * @return string
   */
  public function ifYouWantYouCanAddAnUltraShortComment() {
    $lorem = 'lorem';
    return $lorem;
  }

  /**
   * You want to add some shitty stuff?
   */
  public function shittyStuffExcludeFull() {
    // @codingStandardsIgnoreStart

      // Here we have a wrong indent, but it doesn't matter! 😎
      $x = 'wrong indent';
      $y = 'wrong indent';
    // @codingStandardsIgnoreEnd
  }

  /**
   * And here again, some shitty stuff.
   */
  public function shittyStuffExcludeSingleLines() {
    $lorem_ipsumDolores = 'camelcase is not allowed'; // @codingStandardsIgnoreLine

    // @codingStandardsIgnoreLine
    $lorem_ipsum_dolores = 'this variable is not used, gives a warning!';
  }

}

/**
 * Class AnotherExampleClass.
 *
 * @package Drupal\example_module
 */
class AnotherExampleClass {

  /**
   * Another example of another function.
   */
  public function loremIpsum() {
    // Do nothing in this function.
  }

}
