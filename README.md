# Storymate
> A Story telling application

## Dev Work
- Install [Node.js](https://nodejs.org/en/ "Node.js")
- run the following in a console:
```
npm install
```

- run the following in a console

```shell
gulp watch
```

### CSS

- Proceed to work on the SCSS files in the `src` directory
	- If you make a new file, name it `_{name}.scss`
	- include the file in `src/scss/styles.scss`
		- see file for reference

### JS

- Proceed to work on the JS files in the `src` directory
- Normal js/jquery to be done in `src/js/index.js`
- Any new functions to be put in `src/js/inc/utils.js`

### HTML

- Proceed to work on the HTML files in the `src` directory

## Viewing Work

- Open files in the `dist` directory

## Build Process

### Moving Images

```shell
gulp copy-images
```

### Compiling HTML

```shell
gulp copy-html
```

### Compiling JS and CSS

```shell
gulp pack
```

### Compile All

```shell
gulp build
```

**NOTE** If you make a mistake in your css, the watch will stop. To fix this, fix you css and restart the watch command *See above*
