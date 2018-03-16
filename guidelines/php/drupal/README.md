Writing PHP in Drupal 8
=======================

We follow the [Drupal Coding standards](https://www.drupal.org/docs/develop/standards).
For our Drupal 8 projects we have a separate
[How-do-we-drupal-article](https://github.com/gridonic/drupal8).

When you read our global guidelines carefully you find the line:

> We use 4 spaces for indentation

In our drupal projects we will ignore the 4 spaces in all php- & twig-files and
we use just 2 spaces for indentation.

## Exceptions

We adhere to most rules for Drupal project, but add some exceptions where we
disagree or find the original Drupal rules not suitable for our use case(s).
These exceptions are listed below.

### Comments

A default-comment based on the guidelines looks like this:

```php
/**
 * Short Title.
 *
 * Longer description (optional).
 *
 * @param string $value_a
 *   Description of @param A.
 * @param string $value_b
 *   Description of @param B.
 *
 * @return array
 *   Description of @return.
 */
public function exampleFunction($value_a, $value_b) {
    $concat_values = [];
    
    $concat_values[] = $value_a;
    $concat_values[] = $value_b;
    
    return $concat_values;
}
```

In most of the functions this makes sense and we use this. But from time to
time part of the comment is really clear.

You can write the same comment without the descriptions:

```php
/**
 * @param string $value_a
 * @param string $value_b
 *
 * @return array
 */
```

But if you want to add descriptions to the comment, they need to respect the
following format:

* Every comment must end with a full stop.
* The short title of a function must not be longer than 80 characters, or the
limit according to our modified standards.
* The optional longer description of a function must be separated by a blank
line from the short title.
* Group the different tags like `@param`, `@return`, `@see`, `@throws`, ...
* Add an empty line between the grouped tags.
* Start with the Parameter tags (`@param`).
* Descriptions of tags go to the next line and are indented with 2 spaces.

```php
/**
 * An optional title.
 *
 * An optional longer description
 * which goes over more than one line.
 * 
 * @param string $value_a
 *   An optional description.
 * @param string $value_b
 *   An optional descripton.
 *
 * @return array
 *   An optional description.
 */
```

And at the end 2 exceptions which are allowed in the Drupal Coding standards as
well:

```php
/**
 * {@inheritdoc}
 */
 
/**
 * Implements hook_preprocess().
 */
function THEMENAME_preprocess(array &$variables) {
  ...
}
```

For better understanding what is possible, you can see the
[`DrupalStandardsExampleClass.php`](DrupalStandardsExampleClass.php) in this
directory to look at some examples.

## How to check the standards with PHP_CodeSniffer

Just look into our [`phpcs.xml.dist`](phpcs.xml.dist) and set it as your own
standard.

Set the default paths for PHP_CodeSniffer (Drupal is installed with
[Composer](https://www.drupal.org/docs/develop/using-composer/using-composer-with-drupal)).

    $ ./vendor/bin/phpcs --config-set installed_paths ../../drupal/coder/coder_sniffer

And run the PHP_CodeSniffer to check our standards

    $ ./vendor/bin/phpcs