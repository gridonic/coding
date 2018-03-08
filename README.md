<p align="center"><img src="https://gridonic.github.io/assets/images/logos/coding.svg" alt="Coding" width="128"></p>

# Coding manual

Our coding manual represents everything we need to know in order to keep a *consistent* coding style and make 
collaboration a *breeze*.


## Table of contents

1. [Guidelines]
1. [IDEs / Editors]
1. [Linters]
1. [Recipes]
1. [Best practices]

## Guidelines

See the [`./guidelines`](./guidelines) folder for a collection of language specific coding guidelines.

## IDEs / Editors

To maintain consistent coding styles between different editors and IDEs, we use [EditorConfig].

Have a look at the [`.editorconfig`](./.editorconfig) file for any details.

## Linters

> […] generically, lint or a **linter** is any tool that flags suspicious usage in software written in any 
[computer language]. […] Lint-like tools generally perform [static analysis] of source code.<sup>1</sup>

Currently we have configuration files prepared for those linters:

* [ESLint] ([`.eslintrc`](./.eslintrc))
* [stylelint] ([`.stylelintrc`](./.stylelintrc))
* [drupal-lint] ([`phpcs.xml.dist`](guidelines/php/drupal/phpcs.xml.dist))

##  
<sup>1</sup> https://en.wikipedia.org/wiki/Lint_(software)

## Recipes

Have a look at the repository’s [Wiki] for a collection of recipes regarding specific coding challenges / topics.

## Best practices

Want to know how we write *constructors*, handle *state delegation* or use the *[factory pattern]*? Or what’s in 
general the best practice to write a, b or c? Have a look at our [CodePen] account or check out the [Wiki].

##  
<p align="center">
  <a href="https://gridonic.ch">gridonic.ch</a> ・
  <a href="https://gridonic.github.io">gridonic.github.io</a> ・
  <a href="https://twitter.com/gridonic">@gridonic</a>
</p>

[Guidelines]: #guidelines
[Linters]: #linters
[IDEs / Editors]: #ides--editors
[Recipes]: #recipes
[Best practices]: #best-practices
[Wiki]: https://github.com/gridonic/coding/wiki
[computer language]: https://en.wikipedia.org/wiki/Computer_language
[static analysis]: https://en.wikipedia.org/wiki/Static_code_analysis
[ESLint]: http://eslint.org/
[stylelint]: https://stylelint.io/
[EditorConfig]: http://editorconfig.org/
[CodePen]: https://codepen.io/gridonic/collections/
[factory pattern]: https://en.wikipedia.org/wiki/Factory_method_pattern
