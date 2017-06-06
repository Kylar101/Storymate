const gulp = require('gulp');
const sass = require('gulp-sass');
const webpack = require('webpack');
const webpackStream = require('webpack-stream');

    gulp.task('sass',function(){
      gulp.src(['./src/scss/style.scss'])
        .pipe(sass())
        .pipe(gulp.dest('dist/css'))
    });

    gulp.task('copy-html', function() {
	  gulp.src(['./src/*.html'])
	    .pipe(gulp.dest('./dist'));
	});

	gulp.task('copy-images', function() {
	  gulp.src('./src/img/**/*.{jpg,png,gif,jpeg}')
	    .pipe(gulp.dest('./dist/img'));
	});

	gulp.task('pack', function() {
	  return gulp.src('./src/app.js')
	    .pipe(webpackStream(require('./webpack.config.js'), webpack))
	    .pipe(gulp.dest('./dist/'));
	});

    gulp.task('watch', function(){
    	gulp.watch(['./src/scss/**/*.scss'], ['pack']);
    	gulp.watch(['./src/*.html'], ['copy-html']);
    	gulp.watch(['./src/js/**/*.js', './src/app.js'], ['pack']);
    	gulp.watch(['./src/img/**/*.{jpg,png,gif,jpeg}'], ['copy-images']);
    });