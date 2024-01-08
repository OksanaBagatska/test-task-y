const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const sass = require('gulp-sass')(require('sass'));

gulp.task('styles', function () {
    return gulp.src('assets/styles/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(concat('styles.css'))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/dist/css'));
});

gulp.task('scripts', function () {
    return gulp.src('assets/scripts/*.js')
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/dist/js'));
});

gulp.task('watch', function () {
    gulp.watch('assets/styles/*.scss', gulp.series('styles'));
    gulp.watch('assets/scripts/*.js', gulp.series('scripts'));
});

gulp.task('default', gulp.parallel('styles', 'scripts', 'watch'));
