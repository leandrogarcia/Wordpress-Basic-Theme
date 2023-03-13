const gulp = require('gulp');
//const sass = require('gulp-sass');
const sass = require('gulp-sass')(require('sass'))
const del = require('del');
//const uglify = require('gulp-uglify');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');

//sass.compiler = require("node-sass");

//
gulp.task('styles', () => {
    return gulp.src('assets/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./assets/css/'));
});

gulp.task('clean', () => {
    return del([
        'assets/css/main.css',
    ]);
});

gulp.task('watch', gulp.series( function() {
  gulp.watch(['assets/sass/**/*.scss'], gulp.parallel( ['styles'] ));
}));

gulp.task('default', gulp.series(['clean', 'styles']));
