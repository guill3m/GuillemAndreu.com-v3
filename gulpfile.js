// Load plugins
var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var sass = require('gulp-ruby-sass');
var uglify = require('gulp-uglify');

// Default task
gulp.task('default', ['scss', 'js']);

// Watch
gulp.task('watch', function () {
  gulp.watch('content/themes/gp3/scss/**/*.scss', ['scss']);
  gulp.watch('content/themes/gp3/js/src/**/*.js', ['js']);
});

// Styles
gulp.task('scss', function () {
  return gulp.src('content/themes/gp3/scss/style.scss')
    .pipe(sass({
      precision: 10,
      // sourcemap: 'none',
      "sourcemap=none": true,
      style: 'compressed'
    }))
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(gulp.dest('content/themes/gp3'));
});

// Lint JS
gulp.task('jshint', function () {
  return gulp.src('content/themes/gp3/js/src/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// JS
gulp.task('js', ['jshint'], function () {
  return gulp.src([
      'content/themes/gp3/js/src/menu.js',
      'content/themes/gp3/bower_components/unslider/src/unslider.js',
      'content/themes/gp3/js/src/project.js',
      'content/themes/gp3/js/src/contact.js',
      'content/themes/gp3/js/src/images.js'
    ])
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(gulp.dest('content/themes/gp3/js'));
});
