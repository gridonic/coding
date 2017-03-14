# Writing JavaScript

Our guidelines are based on the [Airbnb JavaScript Style Guide](https://github.com/airbnb/javascript). There are two 
variantes of the styleguide. The most recent version of the style guide uses [ECMAScript 6](https://github.com/lukehoban/es6features).
This is what we're using in all projects wherever possible.

The Airbnb JavaScript Style Guide provides a version for [ECMAScript 5](https://github.com/airbnb/javascript/tree/master/es5).
For projects where using ES6 is absolutely not possible, we adhere to this style guide.

## Linting

We use [ESLint](http://eslint.org/) to ensure consistency when writing JavaScript. The [`.eslintrc`](./.eslintrc) config
file is based on [eslint-config-airbnb](https://www.npmjs.com/package/eslint-config-airbnb). The most simple `.eslintrc`
configuration file will look like this:

```
{
    "extends": "airbnb"
}
```

We deviate from the Airbnb Javascript Styleguide by loosening the strictness where appropriate. These deviations are
added to the `.eslintrc` configuration file. **Extend and keep the following list up to date when adding new exceptions.**

> **Note:*** A [ES5 alterntative](https://www.npmjs.com/package/eslint-config-airbnb-es5) is available as well. The rules
> and exceptions listed here are for the ES6 version Airbnb JavaScript Style Guide.

### [indent](http://eslint.org/docs/rules/indent)

We indent our files with **4 spaces**.

```
"indent": ["error", 4, {
    "SwitchCase": 1,
    "VariableDeclarator": 1
}],
```

### [comma-dangle](http://eslint.org/docs/rules/comma-dangle)

Disable trailing commas.

```
"comma-dangle": ["error", "never"]
```

### [no-console](http://eslint.org/docs/rules/no-console)

Even though you should debug your code using a proper debugger (e.g. [Chrome DevTools](https://developer.chrome.com/devtools/docs/javascript-debugging)),
sometimes the quick `console.log` here and there is ok. However, always make sure to have a tool remove all your 
`console.log` statements in production code.

```
"no-console": 0
```

### [max-len](http://eslint.org/docs/rules/max-len)

We increase the maximum line lenght from 100 to 160.

```
"max-len": ["error", 160, 2, {
    "ignoreUrls": true,
    "ignoreComments": false
}]
```

## Grunt

Our tool of trade for build chains is [Grunt](http://gruntjs.com/). It might not be as fancy as gulp or webpack, but 
it gets the job done. In order to make it also go out of our way, we use a super-simple [`Gruntfile.js`](./Gruntfile.js)
and the [load-grunt-config](https://github.com/firstandthird/load-grunt-config) plugin to break our Gruntfile config up
by task. To make the task loading fast, we spice it up with [jit-grunt](https://github.com/shootaroo/jit-grunt).
