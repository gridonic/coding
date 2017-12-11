# Coding Guidelines

## Overview

- [HTML](./html)
- [CSS / Sass](./css)
- [JavaScript](./js)
- [PHP](./php)
- [Git](./git)

## Acknowledgments

The guides are all based on the work of others. See the license and documents themselves for information about the
original authors.

## General Principles

- All code in any code-base should look like a single person typed it, no matter how many people contributed.
- The following outlines the practices that we seek to adhere to in all code that we originally author.

> “Part of being a good steward to a successful project is realizing that writing code for yourself is a Bad Idea™.
> If thousands of people are using your code, then write your code for maximum clarity, not your personal preference
> of how to get clever within the spec.” - Idan Gazit

### Whitespace

Consistency always wins.

The whitespace rules set forth here and in the language specific documents serve a simple, higher purpose: consistency.
With consistency comes the ability to compare changes to the code. Ideally one style should exist across the entire
source base of our projects.

There can be exceptions to this rule if certain frameworks in certain languages are using a different coding style as
our definition. Then the frameworks guidelines win, but only for code we author within the confines of such frameworks.

The following are our rules that we enforce over all languages:

1. We use 4 spaces for indentation.
1. We configure our code editors to “show invisibles” and configure it to automatically remove end-of-line whitespace.
    - Enforce consistency.
    - Eliminate end of line whitespace.
    - Eliminate blank line whitespace.
    - Create commits and diffs that are easier to read.
1. We use an [EditorConfig](http://editorconfig.org/) file per project to help maintain the basic whitespace conventions.
   A basic [.editorconfig](.editorconfig) file is available in this repository.

### Comments

Well commented code is extremely important. We take time to describe our code, how it works, its limitations, and the
way it is constructed. We don’t leave others in the team guessing as to the purpose of uncommon or non-obvious code.

Comment style should be simple and consistent within a single code base.

- Keep line-length to a sensible maximum, e.g., 120 or 160 columns.
- Use “sentence case” comments and consistent text indentation.

> **Tip**: Write comments before you write the actual code of the class, method, component, etc. It forces you to verbalize
> and structure in your head what the code will do and what purpose it serves.

> **Tip**: Configure your editor to provide you with shortcuts to output agreed-upon comment patterns.
