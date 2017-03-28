# Writing HTML

Our style guide for writing HTML is based on the [Code Guide by @mdo](http://codeguide.co/).

## Table of contents

- [Syntax](#syntax)
- [HTML5 doctype](#html5-doctype)
- [Language attribute](#language-attribute)
- [Character encoding](#character-encoding)
- [IE compatibility mode](#ie-compatibility-mode)
- [CSS and JavaScript includes](#css-and-javascript-includes)
- [Practicality over purity](#practicality-over-purity)
- [Attribute order](#attribute-order)
- [Boolean attributes](#boolean-attributes)
- [IDs, classes and data attributes](#ids-classes-data-attributes)
- [Reducing markup](#reducing-markup)
- [JavaScript generated markup](#javascript-generated-markup)

## Syntax

- Use soft tabs with four spaces
- Nested elements should be indented once (four spaces).
- Always use double quotes, never single quotes, on attributes.
- Don’t include a trailing slash in self-closing elements—the HTML5 spec says they’re optional.
- Don’t omit optional closing tags (e.g. `</li>` or `</body>`).

```html
<!DOCTYPE html>
<html>
    <head>
        <title>Page title</title>
    </head>
    <body>
        <img src="images/company-logo.png" alt="Company">
        <h1 class="hello-world">Hello, world!</h1>
    </body>
</html>
```

## HTML5 doctype

Enforce standards mode and more consistent rendering in every browser possible with this simple doctype at the beginning of every HTML page.

```html
<!DOCTYPE html>
<html>
    <head>
    </head>
</html>
```

## Language attribute

From the HTML5 spec:

> Authors are encouraged to specify a lang attribute on the root html element, giving the document’s language. 
> This aids speech synthesis tools to determine what pronunciations to use, translation tools to determine what 
> rules to use, and so forth.

Read more about the `lang` attribute [in the spec](http://w3c.github.io/html/semantics.html#the-html-element).

Head to Sitepoint for a [list of language codes](https://www.sitepoint.com/web-foundations/iso-2-letter-language-codes/).

```html
<html lang="en-us">
    <!-- ... -->
</html>
```

## Character encoding

Quickly and easily ensure proper rendering of your content by declaring an explicit character encoding. When doing so, 
you may avoid using character entities in your HTML, provided their encoding matches that of the document (generally UTF-8).

```html
<head>
    <meta charset="UTF-8">
</head>
```

## IE compatibility mode
Internet Explorer supports the use of a document compatibility `<meta>` tag to specify what version of IE the page should 
be rendered as. Unless circumstances require otherwise, it’s most useful to instruct IE to use the latest supported 
mode with **edge mode**.

For more information, read [this awesome Stack Overflow article](http://stackoverflow.com/questions/6771258/whats-the-difference-if-meta-http-equiv-x-ua-compatible-content-ie-edge-e).

```html
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
```

## CSS and JavaScript includes

Per HTML5 spec, typically there is no need to specify a type when including CSS and JavaScript files as text/css and 
text/javascript are their respective defaults.

HTML5 spec links

- [Using link](https://www.w3.org/TR/2011/WD-html5-20110525/semantics.html#the-link-element)
- [Using style](https://www.w3.org/TR/2011/WD-html5-20110525/semantics.html#the-style-element)
- [Using script](https://www.w3.org/TR/2011/WD-html5-20110525/scripting-1.html#the-script-element)

```html
<!-- External CSS -->
<link rel="stylesheet" href="code-guide.css">

<!-- In-document CSS -->
<style>
    /* ... */
</style>

<!-- JavaScript -->
<script src="code-guide.js"></script>
```

## Practicality over purity

Strive to maintain HTML standards and semantics, but not at the expense of practicality. Use the least amount of markup 
with the fewest intricacies whenever possible.

## Attribute order

HTML attributes should come in this particular order for easier reading of code.

- `class`
- `id`, `name`
- `data-*`
- `src`, `for`, `type`, `href`, `value`
- `title`, `alt`
- `role`, `aria-*`

Classes make for great reusable components, so they come first. Ids are more specific and should be used sparingly 
(e.g., for in-page bookmarks), so they come second.

```html
<a class="..." id="..." data-toggle="modal" href="#">
    Example link
</a>

<input class="form-control" type="text">

<img src="..." alt="...">
```

## Boolean attributes

A boolean attribute is one that needs no declared value. XHTML required you to declare a value, but HTML5 has no such requirement.

For further reading, consult the [WhatWG section on boolean attributes](http://www.whatwg.org/specs/web-apps/current-work/multipage/common-microsyntaxes.html#boolean-attributes):

> The presence of a boolean attribute on an element represents the true value, and the absence of the attribute 
> represents the false value.

If you must include the attribute’s value, and **you don’t need to**, follow this WhatWG guideline:

> If the attribute is present, its value must either be the empty string or [...] the attribute’s canonical name, with 
> no leading or trailing whitespace.

**In short, don’t add a value.**

```html
<input type="text" disabled>

<input type="checkbox" value="1" checked>

<select>
    <option value="1" selected>1</option>
</select>
```

## IDs, classes and data attributes

Always use classes for styles. Avoid using IDs. Use `data` attributes when JavaScript funcionality is involved.

```html
<a class="...">
    I am a styled link
</a>

<form class="..." data-js-component data-component-parameter="...">
    I am used somewhere in JavaScript
</form>
```

## Reducing markup

Whenever possible, avoid superfluous parent elements when writing HTML. Many times this requires iteration and refactoring, 
but produces less HTML. Take the following example:

```html
<!-- Not so great -->
<span class="avatar">
    <img src="...">
</span>

<!-- Better -->
<img class="avatar" src="...">
```

## JavaScript generated markup

Writing markup in a JavaScript file makes the content harder to find, harder to edit, and less performant. Avoid it whenever possible.
