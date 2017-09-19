Writing PHP
=================

We follow the [PSR-2 Coding Guidelines](https://github.com/php-fig/fig-standards/tree/master/accepted).

## Strings

In general, we use single quotes to enclose literal strings:

```php
$neos = 'A great project from a great team';
```

If you’d like to insert values from variables, concatenate strings. A space must be inserted before and after the dot for better readability:

```php
$message = 'Hey ' . $name . ', you look ' . $appearance . ' today!';
```

You may break a string into multiple lines if you use the dot operator. You’ll have to indent each following line to mark them as part of the value assignment:

```php
$neos = 'A great ' .
  'project from ' .
  'a great ' .
  'team';
```

You should also consider using a PHP function such as sprintf() to concatenate strings to increase readability:

```php
$message = sprintf('Hey %s, you look %s today!', $name, $appearance);
```
