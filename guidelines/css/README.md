# Writing CSS and Sass

We stick to the [RSCSS](http://rscss.io/) system, which follows the BEM conventions. Our styleguide is based on the [Airbnb CSS / Sass Styleguide](https://github.com/airbnb/css) and the [Code Guide](http://codeguide.co/) by @mdo.

## Table of contents

1. [Terminology](#terminology)
    - [Rule Declaration](#rule-declaration)
    - [Selectors](#selectors)
    - [Properties](#properties)
1. [CSS](#css)
1. [Sass](#sass)
    - [Format](#format)
    - [Ordering of property declarations](#ordering-of-property-declarations)
    - [Variables](#variables)
    - [Mixins](#mixins)
    - [Extend directive](#extend-directive)
    - [Nested selectors](#nested-selectors)
    - [Prefixed properties](#prefixed-properties)
    - [Shorthand notation](#shorthand-notation)
    - [Operators](#operators)
    - [Commenting](#commenting)
    - [Exceptions and slight deviations](#exceptions-and-slight-deviations)
1. [Boilerplate](#boilerplate)
    - [Folder structure](#folder-structure)

## Terminology

### Rule declaration

A “rule declaration” is the name given to a selector (or a group of selectors) with an accompanying group of properties. Here’s an example:

```css
.listing {
    font-size: 18px;
    line-height: 1.2;
}
```

### Selectors

In a rule declaration, “selectors” are the bits that determine which elements in the DOM tree will be styled by the defined properties. Selectors can match HTML elements, as well as an element’s class, ID, or any of its attributes. Here are some examples of selectors:

```css
.my-element-class {
    /* ... */
}

[aria-hidden] {
    /* ... */
}
```

### Properties

Finally, properties are what give the selected elements of a rule declaration their style. Properties are key-value pairs, and a rule declaration can contain one or more property declarations. Property declarations look like this:

```css
/* some selector */ {
    background: #f1f1f1;
    color: #333;
}
```

## CSS

Nothing fancy since it’s compiled by the Sass compiler.

## Sass

As written in the introduction we use the [RSCSS](http://rscss.io/) system. That means we only have components besides generic styles. A component can be a collection of components compositing their collective appearance, but nothing more or less.

### Format

- Use soft tabs with **4** (four) spaces, they’re the only way to guarantee code renders the same in any environment.
- When grouping selectors, keep individual selectors to a single line.
- Include one space before the opening brace of declaration blocks for legibility.
- Place closing braces of declaration blocks on a new line.
- Use double quotes consistently.
- Include one space after `:` for each declaration.
- Each declaration should appear on its own line for more accurate error reporting.
- End all declarations with a semi-colon. The last declaration’s is optional, but your code is more error prone without it.
- Comma-separated property values should include a space after each comma (e.g., `box-shadow`).
- Include spaces after commas *within* `rgb()`, `rgba()`, `hsl()`, `hsla()`, or `rect()` values.
- Prefix property values or color parameters with a leading zero (e.g., `0.5` instead of `.5` and `-0.5px` instead of `-.5px`).
- Lowercase all hex values, e.g., `#fff`. Lowercase letters are much easier to discern when scanning a document as they tend to have more unique shapes.
- Use shorthand hex values where available, e.g., `#fff` instead of `#ffffff`.
- Quote attribute values in selectors, e.g., `input[type="text"]`. [They’re only optional in some cases](http://mathiasbynens.be/notes/unquoted-attribute-values#css), and it’s a good practice for consistency.
- Avoid specifying units for zero values, e.g., `margin: 0;` instead of `margin: 0px;`.
- Use the `.scss` syntax, never the original `.sass` syntax.


```scss
// ✗ Bad SCSS
.selector, .selector-secondary, .selector[type=text] {
  padding:15px;
  margin:0px 0px 15px;
  background-color:rgba(0,0,0,0.5);
  box-shadow:0px 1px 2px #CCC,inset 0 1px 0 #FFFFFF
}

// ✓ Better SCSS
.selector,
.selector-secondary,
.selector[type="text"] {
    background-color: rgba(0, 0, 0, 0.5);
    box-shadow: 0 1px 2px #ccc, inset 0 1px 0 #fff;
    margin-bottom: 15px;
    padding: 15px;
}
```

### Ordering of property declarations

1. `@include` declarations

    Grouping `@include`s at the beginning makes it easier to read the entire selector.

    ```scss
    .btn {
        @include my-special-mixin;
        @include my-other-mixin;

        // ...
    }
    ```

1. Property declarations

    List all standard property declarations, anything that isn’t an `@include` or a nested selector.

    ```scss
    .btn {
        @include my-special-mixin;
        @include my-other-mixin;

        background: green;
        font-weight: bold;
        // ...
    }
    ```

1. Media queries

    Place media queries as close to their relevant rule sets whenever possible. Don’t bundle them all in a separate stylesheet or at the end of the document.

    ```scss
    .btn {
        @include my-special-mixin;
        @include my-other-mixin;

        background: green;
        font-weight: bold;

        @media (...) {
            // ...
        }
    }
    ```

1. Nested selectors

    Nested selectors, _if necessary_, go last, and nothing goes after them. Add whitespace between your rule declarations and nested selectors, as well as between adjacent nested selectors. Apply the same guidelines as above to your nested selectors.

    ```scss
    .btn {
        @include my-special-mixin;
        @include my-other-mixin;

        background: green;
        font-weight: bold;

        @media (...) {
            // ...
        }

        > .icon {
            margin-right: 10px;
        }
    }
    ```

### Variables

Prefer dash-cased variable names (e.g. `$my-variable`) over camelCased or snake_cased variable names. It is acceptable to prefix variable names that are intended to be used only within the same file with an underscore (e.g. `$_my-variable`).

### Mixins

Mixins should be used to DRY up your code, add clarity, or abstract complexity – in much the same way as well-named functions. Mixins that accept no arguments can be useful for this, but note that if you are not compressing your payload (e.g. gzip), this may contribute to unnecessary code duplication in the resulting styles.

### Extend directive

`@extend` should be avoided because it has unintuitive and potentially dangerous behavior, especially when used with nested selectors. Even extending top-level placeholder selectors can cause problems if the order of selectors ends up changing later (e.g. if they are in other files and the order the files are loaded shifts). Gzipping should handle most of the savings you would have gained by using `@extend`, and you can DRY up your stylesheets nicely with mixins.

### Nested selectors

**Use no more than 1 level of nesting!**

```scss
// ✗ Bad: 3 levels of nesting
.image-frame {
    > .description {
        // ...

        > .icon {
            // ...
        }
    }
}

// ✓ Better: 2 levels
.image-frame {
    > .description { // ... }
    > .description > .icon { // ... }
}
```

When selectors become this long, you’re likely writing Sass that is:

* Strongly coupled to the HTML (fragile) *—OR—*
* Overly specific (powerful) *—OR—*
* Not reusable


Again: **never nest ID selectors!**

If you must use an ID selector in the first place (and you should really try not to), they should never be nested. If you find yourself doing this, you need to revisit your markup, or figure out why such strong specificity is needed. If you are writing well formed HTML and CSS, you should **never** need to do this.

### Prefixed properties

Avoid vendor prefixed properties as we are using [autoprefixer](https://github.com/postcss/autoprefixer) to deal with this topic automatically.

### Shorthand notation

Strive to limit use of shorthand declarations to instances where you must explicitly set all the available values. Common overused shorthand properties include:

- `padding`
- `margin`
- `font`
- `background`
- `border`
- `border-radius`

Often times we don’t need to set all the values a shorthand property represents. For example, HTML headings only set top and bottom margin, so when necessary, only override those two values. Excessive use of shorthand properties often leads to sloppier code with unnecessary overrides and unintended side effects.

The Mozilla Developer Network has a great article on [shorthand properties](https://developer.mozilla.org/en-US/docs/Web/CSS/Shorthand_properties) for those unfamiliar with notation and behavior.

```scss
// ✗ Bad example
.element {
    background: red;
    background: url("image.jpg");
    border-radius: 3px 3px 0 0;
    margin: 0 0 10px;
}

// ✓ Better example
.element {
    background-color: red;
    background-image: url("image.jpg");
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    margin-bottom: 10px;
}
```

### Operators

For improved readability, wrap all math operations with the interpolation syntax using a single space between values, variables and operators.

```scss
// ✗ Bad example
.element {
    margin: 10px 0 $variable*2 10px;
}

// ✓ Better example
.element {
    margin: 10px 0 #{$variable * 2} 10px;
}
```

### Commenting

Code is written and maintained by people. Ensure your code is descriptive, well commented, and approachable by others.

- Great code comments convey context or purpose.
- Do not simply reiterate a component or class name.
- Be sure to write in complete sentences for larger comments and succinct phrases for general notes.
- Keep line-length to a sensible maximum, e.g., 120 columns.
- Prefer comments on their own line. Avoid end-of-line comments.
- Prefer line comments (// in Sass-land) to block comments.
- Write detailed comments for code that isn’t self-documenting:
    - Uses of z-index
    - Compatibility or browser-specific hacks

```scss
// ✗ Bad example
// Modal header
.modal-header {
    // ...
}

// ✓ Better example
// Wrapping element for .modal-title and .modal-close
.modal-header {
    // ...
}
```

### Exceptions and slight deviations

Large blocks of single declarations can use a slightly different, single-line format. In this case, a space should be included after the opening brace and before the closing brace.

```scss
.selector-1 { width: 10%; }
.selector-2 { width: 20%; }
.selector-3 { width: 30%; }
```

Long, comma-separated property values - such as collections of gradients or shadows - can be arranged across multiple lines in an effort to improve readability and produce more useful diffs. There are various formats that could be used; one example is shown below.

```scss
.selector {
    background-image:
        linear-gradient(#fff, #ccc),
        linear-gradient(#f3c, #4ec);
    box-shadow:
        1px 1px 1px #000,
        2px 2px 1px 1px #ccc inset;
}
```

## Boilerplate

Since the Sass file and folder structure is a part of our @gridonic/[web-boilerplate](https://github.com/gridonic/web-boilerplate), you can have a look at it over [here](https://github.com/gridonic/web-boilerplate/tree/develop/src/scss).

### Folder structure

#### Meta

The meta folder holds files which only have functions, mixins, variables and other definitions which do **NOT** compile to CSS.

#### Components

The components folder is a collection of all the pieces your user interface is providing. A component should always be the **smallest part of a repeating piece**, but can also be a collection of components.

#### Shared

All styles within the shared folder are used throughout the whole website in every view. They include generic styles of HTML elements such as forms, typefaces, images, debugging and so on.
