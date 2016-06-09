Writing CSS and SASS
=================

## Acknowledgments
This guideline is based in large parts on [https://github.com/necolas/idiomatic-css](https://github.com/necolas/idiomatic-css) and [https://github.com/bevacqua/css](https://github.com/bevacqua/css).

<a name="namespaces"></a>
## Namespaces

Components should _always_ be assigned a unique namespace prefix.

- Where possible, the namespace should be a meaningful shorthand
- In class names, the namespace must be followed by a single dash

Consider the following example, where we assigned `ddl` to a **drop down list** component. Take note of the class names.

##### Good

```css
.ddl-container {
  // ...
}

.ddl-item-list {
  // ...
}

.ddl-item {
  // ...
}
```

##### Bad

```css
.item-list {
  // ...
}

.dropdown-item-list {
  // ...
}

.xyz-item-list {
  // ...
}
```

<a name="comments"></a>
## Comments

* Keep line-length to a sensible maximum, e.g., 80 columns.
* Make liberal use of comments to break CSS code into discrete sections.
* Use "sentence case" comments and consistent text indentation.

Example:

```css
/* ==========================================================================
   Section comment block
   ========================================================================== */

/* Sub-section comment block
   ========================================================================== */

/**
 * Short description using Doxygen-style comment format
 *
 * The first sentence of the long description starts here and continues on this
 * line for a while finally concluding here at the end of this paragraph.
 *
 * The long description is ideal for more detailed explanations and
 * documentation. It can include example HTML, URLs, or any other information
 * that is deemed necessary or useful.
 *
 * @tag This is a tag named 'tag'
 *
 * TODO: This is a todo statement that describes an atomic task to be completed
 *       at a later date. It wraps after 80 characters and following lines are
 *       indented.
 */

/* Basic comment */
.namespace-module {
    // Some declarations
}

padding-top: 5px; // Inline comment
```

<a name="format"></a>
## Format

The chosen code format must ensure that code is: easy to read; easy to clearly
comment; minimizes the chance of accidentally introducing errors; and results
in useful diffs and blames.

* Use one discrete selector per line in multi-selector rulesets.
* Include a single space before the opening brace of a ruleset.
* Include one declaration per line in a declaration block.
* Use one level of indentation for each declaration.
* Include a single space after the colon of a declaration.
* Use lowercase and shorthand hex values, e.g., `#aaa`.
* Use double quotes consistently.
* Quote attribute values in selectors, e.g., `input[type="checkbox"]`.
* _Where allowed_, avoid specifying units for zero-values, e.g., `margin: 0`.
* Include a space after each comma in comma-separated property or function
  values.
* Include a semi-colon at the end of the last declaration in a declaration
  block.
* Place the closing brace of a ruleset in the same column as the first
  character of the ruleset.
* Separate each ruleset by a blank line.

```css
.selector-1,
.selector-2,
.selector-3[type="text"] {
    display: block;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    font-family: helvetica, arial, sans-serif;
    color: #333;
    background: #fff;
    background: linear-gradient(#fff, rgba(0, 0, 0, 0.8));
}

.selector-a,
.selector-b {
    padding: 10px;
}
```

#### Declaration order

If declarations are to be consistently ordered, it should be in accordance with
a single, simple principle.

```css
.selector {
    /* Positioning */
    position: absolute;
    z-index: 10;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;

    /* Display & Box Model */
    display: inline-block;
    overflow: hidden;
    box-sizing: border-box;
    width: 100px;
    height: 100px;
    padding: 10px;
    border: 10px solid #333;
    margin: 10px;

    /* Other */
    background: #000;
    color: #fff;
    font-family: sans-serif;
    font-size: 16px;
    text-align: right;
}
```

#### Exceptions and slight deviations

Large blocks of single declarations can use a slightly different, single-line
format. In this case, a space should be included after the opening brace and
before the closing brace.

```css
.selector-1 { width: 10%; }
.selector-2 { width: 20%; }
.selector-3 { width: 30%; }
```

Long, comma-separated property values - such as collections of gradients or
shadows - can be arranged across multiple lines in an effort to improve
readability and produce more useful diffs. There are various formats that could
be used; one example is shown below.

```css
.selector {
    background-image:
        linear-gradient(#fff, #ccc),
        linear-gradient(#f3c, #4ec);
    box-shadow:
        1px 1px 1px #000,
        2px 2px 1px 1px #ccc inset;
}
```

<a name="example"></a>
## Practical example

An example of various conventions.

```css
/* ==========================================================================
   Grid layout
   ========================================================================== */

/**
 * Column layout with horizontal scroll.
 *
 * This creates a single row of full-height, non-wrapping columns that can
 * be browsed horizontally within their parent.
 *
 * Example HTML:
 *
 * <div class="grid">
 *     <div class="cell cell-3"></div>
 *     <div class="cell cell-3"></div>
 *     <div class="cell cell-3"></div>
 * </div>
 */

/**
 * Grid container
 *
 * Must only contain `.cell` children.
 *
 * 1. Remove inter-cell whitespace
 * 2. Prevent inline-block cells wrapping
 */

.grid {
    height: 100%;
    font-size: 0; /* 1 */
    white-space: nowrap; /* 2 */
}

/**
 * Grid cells
 *
 * No explicit width by default. Extend with `.cell-n` classes.
 *
 * 1. Set the inter-cell spacing
 * 2. Reset white-space inherited from `.grid`
 * 3. Reset font-size inherited from `.grid`
 */

.cell {
    position: relative;
    display: inline-block;
    overflow: hidden;
    box-sizing: border-box;
    height: 100%;
    padding: 0 10px; /* 1 */
    border: 2px solid #333;
    vertical-align: top;
    white-space: normal; /* 2 */
    font-size: 16px; /* 3 */
}

/* Cell states */

.cell.is-animating {
    background-color: #fffdec;
}

/* Cell dimensions
   ========================================================================== */

.cell-1 { width: 10%; }
.cell-2 { width: 20%; }
.cell-3 { width: 30%; }
.cell-4 { width: 40%; }
.cell-5 { width: 50%; }

/* Cell modifiers
   ========================================================================== */

.cell--detail,
.cell--important {
    border-width: 4px;
}
```

# SASS: 

## Additional format considerations

* Limit nesting to 1 level deep. Reassess any nesting more than 2 levels deep.
  This prevents overly-specific CSS selectors.
* Avoid large numbers of nested rules. Break them up when readability starts to
  be affected. Preference to avoid nesting that spreads over more than 20
  lines.
* Always place `@extend` statements on the first lines of a declaration
  block.
* Where possible, group `@include` statements at the top of a declaration
  block, after any `@extend` statements.
* Consider prefixing custom functions with `x-` or another namespace. This
  helps to avoid any potential to confuse your function with a native CSS
  function, or to clash with functions from libraries.

```scss
.selector-1 {
    @extend .other-rule;

    @include clearfix();
    @include box-sizing(border-box);

    width: x-grid-unit(1);
}
```

<a name="folder-structure"></a>
## Folder-Structure

## General Guidelines

When unsure about the current classes you are working on, start by putting them into the ```_incubation.scss``` file
and sort it our later. It is better if stuff like that clogs up the incubation file, and not modules or elements files.

Always think about refactoring and then: do it. If someone made a specific class and later someone finds it is
usable in another context. Don't just use it. First refactor it, put it in a new, appropriate place then
refactor and reuse it.

## Base Files

### _variables.scss:

Contains all variables for the project

### _mixins.scss:

Contains all generic mixins. If a mixin is specific to a single module or element, it can also be placed directly
in the corresponding file.

### _utility.scss:

Contains very generic utility classes that can be used anywhere. Do not add page, module or bundle specific
classes here.

### _incubation.scss

Contains all definitions that have no home yet. Use this file for elements which you are currently working on
and are not sure about how generic they will be (partial vs. module vs. bundle, etc.)

## Folders

### Partials

Partials are parts of the generic styling for the whole site. They include styles of HTML elements such as forms,
type, grid, etc.


### Modules

Modules are small units of reusable classes. They are independent of any bundle, module or page.
They can appear anywhere on the site. Modules have no dependencies to bundles. They are agnostic to
the context they are placed in.

### Bundles

Bundles are larger units of classes and can be specific to single pages or whole parts of the site.
They often know about context. They can have dependencies to modules and redefine module styling based on their context.
They are the most specific.

