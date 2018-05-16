'use strict';

// подключаем необходимые пакеты
const gulp = require('gulp');
const sass = require('gulp-sass');
const minifyCss = require('gulp-clean-css');
const rename = require('gulp-rename');
const gzip = require('gulp-gzip');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

var work_dir = 'frontend';

gulp.task('sass-css', function () {
    gulp.src(work_dir + '/web/sass/main.sass')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(work_dir + '/web/css/'));
});

// gulp.task('sass:watch', function () {
//     gulp.watch([
//         work_dir + '/web/**/*.*',
//         '!' + work_dir + '/web/assets/**/*.*',
//         '!' + work_dir + '/web/min/**/*.*',
//         '!' + work_dir + '/web/css/main.css'
//     ], ['compress']);
// });

gulp.task('minify-css', ['sass-css'], function () {
    return gulp.src(work_dir + '/web/css/main.css')
        .pipe(concat('all.min.css'))
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(gulp.dest(work_dir + '/web/min/'));
});


gulp.task('compress-js', function () {
    return gulp.src([])
        .pipe(concat('all.js'))
        .pipe(gzip())
        .pipe(gulp.dest(work_dir + '/web/min/'));
});


gulp.task('compress-css', ['minify-css'], function () {
    return gulp.src(work_dir + '/web/min/all.min.css')
        .pipe(gzip())
        .pipe(gulp.dest(work_dir + '/web/min/'));
});

gulp.task('compress', ['compress-css', 'compress-js']);

gulp.task('tasks', function(){
    console.log('compress compress-css compress-js minify-css sass-css');
});