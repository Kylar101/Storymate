'use strict';

var path = require('path');
var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  devtool: 'source-map',
  entry: './src/app.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist')
  },
  module: {
  	rules: [{
  		test: /\.(sass|scss|css)$/,
  		use: ExtractTextPlugin.extract({
	        use: ['css-loader', 'sass-loader']
	    })
  	},{
  		test: /\.jpg$/,
  		use: ['ignore-loader']
  	},{
        test: /\.js$/,
        exclude: [/node_modules/],
        use: [{
          loader: 'babel-loader',
          options: {
            presets: ['es2015']
          },
        }],
      }
  	]
  },
  plugins: [
  	new ExtractTextPlugin('css/style.css'),	
  ]
};