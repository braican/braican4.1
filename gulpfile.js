const braicanAPI = 'https://api.braican.com/wp-json/braican/v1';

const gulp = require('gulp');
const browserSync = require('browser-sync').create();

// sass
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCss = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');

// hugo
const { spawn } = require('child_process');
const hugo = require('hugo-bin');

// download
const download = require('gulp-download');

/**
 * Config
 */
const scssPath = 'src/scss/**/*.scss';
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
 * Retrieve API
 */
gulp.task('braican-api', (done) => {
    const home = `${braicanAPI}/home.json`;
    const projects = `${braicanAPI}/projects.json`;
    download([home, projects]).pipe(gulp.dest(dataPath));
    done();
});

/**
 * Compile sass
 */
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
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(destPath))
);

gulp.task('build', gulp.series('sass', 'braican-api', 'hugo'));
gulp.task('default', gulp.series('sass', 'braican-api', 'hugo', 'browser-sync'), (done) => done());
