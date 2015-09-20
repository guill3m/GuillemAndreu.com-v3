// Load plugins
var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var jshint = require('gulp-jshint');
var sass = require('gulp-ruby-sass');
var uglify = require('gulp-uglify');

// Default task
gulp.task('default', ['css', 'js']);

// Watch
gulp.task('watch', function () {
  gulp.watch('content/themes/gp3/scss/**/*.scss', ['css']);
  gulp.watch('content/themes/gp3/js/src/**/*.js', ['js']);
});

// Styles
gulp.task('css', function () {
  return sass('content/themes/gp3/scss/style.scss', {
      precision: 10,
    })
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(minifyCss())
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
