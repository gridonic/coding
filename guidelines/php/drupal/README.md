Writing PHP in Drupal 8
=======================

We follow the [Drupal Coding standards](https://www.drupal.org/docs/develop/standards).
For our Drupal 8 projects we have a separate [How-do-we-drupal-article](https://github.com/gridonic/drupal8).

## Exceptions

During the time of developing Drupal-projects we have noticed that not all rules are really suitable.
So we have allowed some exceptions we want to list here:

### Comments

A default-comment based on the guidelines looks like this:

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
    
In most of the functions this makes sense and we use this. But from time to time part of the comment is really clear.

You can write the same comment without the descriptions:

    /**
     * @param string $value_a
     * @param string $value_b
     *
     * @return array
     */
     
But if you wanna add descriptions, they have to be in the correct way:

    /**
     * An optional title.
     * 
     * @param string $value_a
     *   An optional description.
     * @param string $value_b
     *   An optional descripton.
     *
     * @return array
     *   An optional description.
     */

And at the end 2 exceptions which are allowed in the Drupal Coding standards as well:

    /**
     * {@inheritdoc}
     */
     
    /**
     * Implements hook_preprocess().
     */
    function THEMENAME_preprocess(array &$variables) {
      ...
    }
    
For better understanding what is possible, you can see the [`DrupalStandardsExampleClass.php`](DrupalStandardsExampleClass.php) in this directory to look at some examples.

## How to check the standards with PHP_CodeSniffer

Just look into our [`phpcs.xml.dist`](phpcs.xml.dist) and set it as your own standard.

Set the default paths for PHP_CodeSniffer (Drupal is installed with [Composer](https://www.drupal.org/docs/develop/using-composer/using-composer-with-drupal)).

    ./vendor/bin/phpcs --config-set installed_paths ../../drupal/coder/coder_sniffer
    
And run the PHP_CodeSniffer to check our standards

    ./vendor/bin/phpcs