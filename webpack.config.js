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
	        use: [{
	        	loader: 'css-loader',
	        	options: {
	        		url: false
	        	}
	        },
	        'sass-loader'
	        ]
	    })
  	},/*{
  		test: /\.jpg$/,
  		use: ['ignore-loader']
  	},*/{
        test: /\.js$/,
        exclude: [/node_modules/],
        use: [{
          loader: 'babel-loader',
          options: {
            presets: ['es2015']
          },
        }],
      },{
        test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 10000,
              mimetype: 'application/font-woff'
            }
          }
        ]
      },
      {
        test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        use: [
          { loader: 'file-loader' }
        ]
      },
  	]
  },
  plugins: [
  	new ExtractTextPlugin('css/style.css'),	
  ]
};