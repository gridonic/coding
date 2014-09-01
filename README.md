Gridonic Coding-Guidelines
=================

## Overview

Currently available:

- html.md
- css.md
- sass.md
- php.md

## Acknowledgments

The guides are all based on the work of others. See the license and documents themselves for information on original authors.

## General Principles

- All code in any code-base should look like a single person typed it, no matter how many people contributed.
- The following outlines the practices that we seek to adhere to in all code that we originally author.

> "Part of being a good steward to a successful project is realizing that writing code for yourself is a Bad Idea™. If thousands of people are using your code, then write your code for maximum clarity, not your personal preference of how to get clever within the spec." - Idan Gazit

### Whitespace

Consistency always wins.

The whitespace rules set forth here and in the language specific documents serve a simple, higher purpose: consistency. With consistency comes the ability to compare changes to the code. Ideally one style should exist across the entire source base of our projects. There can be exceptions to this rule if certain frameworks in certain languages are using a different coding style as our definition. Then the frameworks guidelines win, but only for code we author within the confines of such frameworks.

The following are our rules that we enforce over all languages:

1. We use 4 spaces for indentation.
2. We configure our code editors to "show invisibles". This will allow us to:
    - Enforce consistency.
	- Eliminate end of line whitespace.
	- Eliminate blank line whitespace.
	- Create commits and diffs that are easier to read.