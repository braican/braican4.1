const braicanAPI = 'https://api.braican.com/wp-json/braican/v1/';

const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCss = require('gulp-clean-css');

// const scripts = require('./gulp/scripts');
// const redirects = require('./gulp/redirects');
// const prismic = require('./gulp/prismic/');
// const hugo = require('./gulp/hugo');
// const server = require('./gulp/server');

const scssPath = 'src/static/scss/**/*.scss';
const destPath = 'site/static/';

gulp.task('sass', () =>
    gulp
        .src(scssPath)

        .pipe(
            sass({
                outputStyle: 'expanded',
            })
        )

        .on('error', sass.logError)

        .pipe(
            autoprefixer({
                browsers: ['last 2 versions'],
                cascade: false,
            })
        )

        .pipe(
            cleanCss({
                compatibility: 'ie8',
            })
        )
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest(destPath))
);

// // Registering Tasks
// [sass, scripts, redirects, prismic, modernizr, hugo, server].forEach(task => {
//   task({ gulp, argv, browserSync });
// });

// const tasks = ['modernizr', 'sass', 'scripts', 'prismic'];

// gulp.task('build', () => {
//   runSequence(tasks, 'hugo', 'redirects');
// });

// gulp.task('default', () => {
//   runSequence(tasks, 'browser-sync', 'hugo', 'redirects');
// });

gulp.task('default', (done) => {
    console.log('test');
    done();
});
