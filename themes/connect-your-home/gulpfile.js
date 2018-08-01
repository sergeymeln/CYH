var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require("gulp-rename"),
    watch = require('gulp-watch'),
    pump = require('pump'),
    babel = require('gulp-babel'),
    cleanCSS = require('gulp-clean-css');

gulp.task('default', ['watch']);

gulp.task('sass', function (cb) {
  pump([
      gulp.src('scss/marketing.scss'),
      sass(),
      autoprefixer({
        browsers: ['last 2 versions']
      }),
      cleanCSS(),
      rename({ suffix: '.min' }),
      gulp.dest('css')
    ],
    cb
  );
});

gulp.task('js', function(cb) {
  pump([
      gulp.src('javascripts/marketing.js'),
      babel({
        presets: ['env']
      }),
      uglify(),
      rename({ suffix: '.min' }),
      gulp.dest('javascripts/dist')
    ],
    cb
  );
});

gulp.task('watch', ['sass', 'js'], function() {
    gulp.watch('scss/marketing.scss', ['sass']);
    gulp.watch('javascripts/marketing.js', ['js']);
});