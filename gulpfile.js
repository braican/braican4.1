const braicanAPI = 'https://api.braican.com/wp-json/braican/v1';

const gulp = require('gulp');
const browserSync = require('browser-sync').create();

// sass
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCss = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');

// scripts
const babelify = require('babelify');
const watchify = require('watchify');
const browserify = require('browserify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');

// hugo
const { spawn } = require('child_process');
const hugo = require('hugo-bin');

// download
const download = require('gulp-download');

/**
 * Config
 */
const scssPath = 'src/scss/**/*.scss';
const jsPath = 'src/js/main.js';
const destPath = 'frontend/static/';

const dataPath = 'frontend/data';

const hugoServerArgs = ['-F', '--cleanDestinationDir', '-s', 'frontend'];

/**
 * Hugo
 */
gulp.task('hugo', (cb) =>
    spawn(hugo, hugoServerArgs, { stdio: 'inherit' }).on('close', (code) => {
        if (code === 0) {
            browserSync.reload();
            cb();
        } else {
            browserSync.notify('Hugo build failed');
            cb('Hugo build failed');
        }
    })
);

/**
 * Browser-sync
 */
gulp.task('browser-sync', () => {
    browserSync.init({
        notify: false,
        reloadDelay: 500,
        open: false,
        ghostMode: false,
        server: { baseDir: './dist' },
    });

    gulp.watch('frontend/**/*', gulp.series('hugo'));
    gulp.watch('src/scss/**/*.scss', gulp.series('sass'));
});

/**
 * Retrieve data
 */
function getMainData() {
    const home = `${braicanAPI}/home.json`;
    const projectsData = `${braicanAPI}/projects.json`;

    return new Promise((resolve, reject) => {
        download([home, projectsData])
            .pipe(gulp.dest(dataPath))
            .on('end', resolve)
            .on('error', reject);
    });
}
gulp.task('braican-api', (done) => {
    getMainData().then(() => {
        done();
    });
});

/**
 * Compile sass
 */
gulp.task('sass', () =>
    gulp
        .src(scssPath)

        .pipe(sourcemaps.init())

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
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(destPath))
);

/**
 * Compile js scripts
 */
gulp.task('scripts', () => {
    const bundler = watchify(
        browserify(jsPath, { debug: true }).transform(babelify, {
            presets: ['env'],
            sourceMaps: true,
        })
    );
    return bundler
        .bundle()
        .on('error', (err) => console.log(err))
        .pipe(source(destPath))
        .pipe(buffer())
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(destPath));
});

gulp.task('build', gulp.series('sass', 'braican-api', 'hugo'));
gulp.task('default', gulp.series('sass', 'braican-api', 'hugo', 'browser-sync'), (done) => done());
