//
// npm packages
//
const gulp = require('gulp');
const help = require('gulp-help-four');

const exit = require('gulp-exit');
const rename = require('gulp-rename');

// babel
const babelify = require('babelify');
const watchify = require('watchify');
const browserify = require('browserify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');

// concat/uglify
const uglify = require('gulp-uglify');

// sass
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');


help(gulp, {});

//
// Config
//

const config = {};

config.sass = {
    errLogToConsole : true,
    outputStyle     : 'compressed',
};


config.sourcemaps = {
    includeContent : false,
    sourceRoot     : 'src',
};

config.autoprefixer = {};

config.browserify = {
    debug : true,
};

config.babelify = {
    presets    : ['env'],
    sourceMaps : true,
};


//
// File system
//

const themeDir = 'webroot/wp-content/themes/braican';

const files = {};

files.sass = {
    dir   : `${themeDir}/styles`,
    src   : `${themeDir}/styles/sass/**/*.scss`,
    build : `${themeDir}/styles/build`,
};

files.js = {
    src   : `${themeDir}/js/src/main.js`,
    build : `${themeDir}/js/build`,
};


/* --------------------------------------------
 * --javascript
 * -------------------------------------------- */

function compileJs(watchIt) {
    const bundler = watchify(browserify(files.js.src, config.browserify)
        .transform(babelify, config.babelify));

    function rebundle() {
        return bundler
            .bundle()
            .on('error', function (err) {
                console.error(err);
                this.emit('end');
            })
            .pipe(source(files.js.build))
            .pipe(buffer())
            .pipe(sourcemaps.init({ loadMaps : true }))
            .pipe(rename('production.js'))
            .pipe(sourcemaps.write('.'))
            .pipe(gulp.dest(files.js.build));
    }

    if (watchIt) {
        bundler.on('update', () => {
            console.log('--> rebundle...done');
            rebundle();
        });
        rebundle();
    } else {
        rebundle().pipe(exit());
    }
}

gulp.task('build', 'Build the Javascript and compile down to ES5', () => compileJs());

gulp.task('minify', 'Minify the compiled Javascript', ['build'], () => gulp.src(`${themeDir}/js/build/production.js`)
    .pipe(uglify())
    .pipe(rename({ extname : '.min.js' }))
    .pipe(gulp.dest(files.js.build)));


/* --------------------------------------------
 * --sass
 * -------------------------------------------- */

function compileSass() {
    return gulp.src(files.sass.src)
        .pipe(sourcemaps.init())
        .pipe(sass(config.sass).on('error', sass.logError))
        .pipe(autoprefixer(config.autoprefixer).on('error', (err) => { console.log(err); }))
        .pipe(sourcemaps.write('.', config.sourcemaps))
        .pipe(gulp.dest(files.sass.build));
}

gulp.task('styles', 'Compile that sass.', compileSass);


/* --------------------------------------------
 * --default
 * -------------------------------------------- */


gulp.task('watch', 'Watch the `javascript` and `styles` directories for changes', () => {
    compileJs(true);
    gulp.watch(files.sass.src, gulp.series('styles'));
});

gulp.task('default', 'Run the watch task', gulp.parallel('watch'));
