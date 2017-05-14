var gulp = require('gulp'),
    sass = require('gulp-sass');

    gulp.task('sass',function(){
      gulp.src(['scss/styles.scss'])
        .pipe(sass(
          {outputStyle:'expanded'}
        ))
        .pipe(gulp.dest('css'))
    });
