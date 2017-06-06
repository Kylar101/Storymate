'use strict';

var path = require('path');
var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  // devtools: 'source-map',
  entry: './src/app.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist')
  },
  module: {
  	rules: [{
  		test: /\.(sass|scss|css)$/,
  		// use: ['style-loader', 'css-loader','sass-loader']
  		use: ExtractTextPlugin.extract({
	        use: ['css-loader', 'sass-loader']
	    })
  	},{
  		test: /\.jpg$/,
  		use: ['ignore-loader']
  	}
  	]
  },
  plugins: [
  	new ExtractTextPlugin('css/style.css'),	
  ]
};