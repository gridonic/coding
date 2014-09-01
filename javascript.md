# Writing JavaScript

## Acknowledgments
This guideline is based in large parts on [https://github.com/necolas/idiomatic-js](https://github.com/necolas/idiomatic-js) and [https://github.com/bevacqua/js](https://github.com/bevacqua/js).

## General Principles<a name="general"></a>

### Strict Mode

We always put 'use strict'; at the top of our modules. Strict mode allows us to catch nonsensical behavior, discourage poor practices, and is faster because it allows compilers to make certain assumptions about our code.

## Syntax<a name="syntax"></a>

### Semicolons`;`

Automatic Semicolon Insertion _(ASI)_ is not a feature. [Don't rely on it](http://benalman.com/news/2013/01/advice-javascript-semicolon-haters/). It's [super complicated](http://www.2ality.com/2011/05/semicolon-insertion.html) and there's no practical reason to burden all of the developers in a team for not possessing **the frivolous knowledge of how ASI works**. We avoid headaches, we avoid ASI.

> **Always add semicolons where needed**

### Parens, brackets, linebreaks

```javascript

if (condition) {

    // Statements
}

while (condition) {

    // Statements
}

var i;
var length = 100;

for (i = 0; i < length; i++) {

    // Statements
}

var prop;

for (prop in object) {

    // Statements
}

if (true) {

    // Statements
} 
else {

    // Statements
}

var something;

// Default case
if (something === 'test') {

    // Statements
}

// Explanation of the alternative cases
else {

    // Statements
}
```

We always use brackets. This, together with a reasonable spacing strategy, will help us avoid mistakes such as [Apple's SSL/TLS bug](https://www.imperialviolet.org/2014/02/22/applebug.html).

##### We NEVER do this

```js
if (err) throw err;
```

##### We always use brackets

```js
if (err) { 
    throw err; 
}
```

### Assignments, declarations, functions (named, expression, constructor)

```javascript
// Variables
// Multiple `var` statements are easier to maintain and debug
// Read more: http://benalman.com/news/2012/05/multiple-var-statements-javascript

var foo = 'bar';
var num = 1;
var undef;

// Literal notations
var array = [];
var object = {};


// Var statements should always be in the beginning of their respective scope (function).
// Same goes for const and let from ECMAScript 6.

function foo() {
    var bar = '';
    var qux;

    // All statements after the variables declarations.
}
```

```javascript
// Named function declaration
function foo(arg1, argN) {

}

// Usage
foo(arg1, argN);

// Named function declaration
function square(number) {
    return number * number;
}

// Usage
square(10);

// Really contrived continuation passing style
function square(number, callback) {
    callback(number * number);
}

square(10, function(square) {

    // Callback statements
});

// We use function expressions with identifier
// This form has the added value of being
// able to call itself and have an identity in stack traces:
var factorial = function factorial(number) {
    if (number < 2) {
        return 1;
    }

    return number * factorial(number - 1);
};

// Constructor declaration
function FooBar(options) {
    this.options = options;
}

// Usage
var fooBar = new FooBar({ a: 'alpha' });

fooBar.options;
// { a: 'alpha' }
```
### Quotes

There is no difference in how JavaScript interprets single- or double-quotes. We always use single-quotes.

### Type checking<a name="type"></a>

String:

`typeof variable === 'string'`

Number:

`typeof variable === 'number'`

Boolean:

`typeof variable === 'boolean'`

Object:

`typeof variable === 'object'`

Array:

`Array.isArray(arrayLikeObject)` // Wherever possible

Node:

`elem.nodeType === 1`

null:

`variable === null`

null or undefined:

`variable == null`

undefined:

```javascript
// global variables:
typeof variable === 'undefined'

// local variables:
variable === undefined
```

Properties:

```javascript
object.prop === undefined
object.hasOwnProperty( prop )
'prop' in object
```

## Conditional evaluation<a name="cond"></a>

```javascript
// When only evaluating that an array has length,
// instead of this:
if (array.length > 0) ...

// ...evaluate truthiness, like this:
if (array.length) ...


// When only evaluating that an array is empty,
// instead of this:
if (array.length === 0) ...

// ...evaluate truthiness, like this:
if (!array.length) ...


// When only evaluating that a string is not empty,
// instead of this:
if (string !== '') ...

// ...evaluate truthiness, like this:
if (string) ...


// When only evaluating that a string _is_ empty,
// instead of this:
if (string === '') ...

// ...evaluate falsy-ness, like this:
if (!string) ...


// When only evaluating that a reference is true,
// instead of this:
if (foo === true) ...

// ...evaluate like you mean it, take advantage of built in capabilities:
if (foo) ...


// When evaluating that a reference is false,
// instead of this:
if (foo === false) ...

// ...use negation to coerce a true evaluation
if (!foo) ...

// ...Be careful, this will also match: 0, "", null, undefined, NaN
// If you _MUST_ test for a boolean false, then use
if (foo === false) ...


// When only evaluating a ref that might be null or undefined, but NOT false, "" or 0,
// instead of this:
if (foo === null || foo === undefined) ...

// ...take advantage of == type coercion, like this:
if (foo == null) ...

// Remember, using == will match a `null` to BOTH `null` and `undefined`
// but not `false`, '' or 0
null == undefined
```

ALWAYS evaluate for the best, most accurate result - the above is a guideline, not a dogma.

```javascript
// Type coercion and evaluation notes

// Prefer `===` over `==` (unless the case requires loose type evaluation)

// === does not coerce type, which means that:

'1' === 1;
// false

// == does coerce type, which means that:

'1' == 1;
// true


// Booleans, Truthies & Falsies

// Booleans:
true, false

// Truthy:
'foo', 1

// Falsy:
'', 0, null, undefined, NaN, void 0
```

## Naming<a name="naming"></a>

You are not a human code compiler/compressor, so don't try to be one.

Use thoughtful naming and a readable structure.

```javascript
// Example of code with good names

function query(selector) {
    return document.querySelectorAll(selector);
}

var idx;
var elements = [];
var matches = query('#foo');
var length = matches.length;

for(idx = 0; idx < length; idx++){
    elements.push(matches[ idx ]);
}
```

A few additional naming pointers:

```javascript
// Naming strings

`dog` is a string

// Naming arrays

`dogs` is an array of `dog` strings

// Naming functions, objects, instances, etc

camelCase; function and var declarations

// Naming constructors, prototypes, etc.

PascalCase; constructor function

// Naming regular expressions

rDescription = //;

// From the Google Closure Library Style Guide

functionNamesLikeThis;
variableNamesLikeThis;
ConstructorNamesLikeThis;
EnumNamesLikeThis;
methodNamesLikeThis;
SYMBOLIC_CONSTANTS_LIKE_THIS;
```

## Early returns 

Early returns promote code readability with negligible performance difference

```javascript
function returnEarly(foo) {
    if (foo) {
        return 'foo';
    }

    return 'quux';
}
```