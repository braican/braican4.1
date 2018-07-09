const braicanAPI = 'https://api.braican.com/wp-json/braican/v1';

const gulp = require('gulp');
const gulpif = require('gulp-if');
var argv = require('yargs').argv;
const browserSync = require('browser-sync').create();
const del = require('del');

// sass
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCss = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');

// scripts
const babelify = require('babelify');
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
const scssSrc = 'src/scss/**/*.scss';
const scssDest = 'frontend/static';

const jsSrc = 'src/js/main.js';
const jsDest = 'frontend/static';

const dataPath = 'frontend/data';

const hugoServerArgs = ['-F', '--cleanDestinationDir', '-s', 'frontend'];

/**
 * Clean
 */
gulp.task('clean', (done) => {
    const deletable = [
        'frontend/static/style.css',
        'frontend/static/main.js',
        'frontend/static/*.map',
    ];

    return del(deletable);
});

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
    gulp.watch('src/js/**/*.js', gulp.series('scripts'));
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
        .src(scssSrc)

        .pipe(gulpif(!argv.production, sourcemaps.init()))

        .pipe(
            sass({
                outputStyle: 'compressed',
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
        .pipe(gulpif(!argv.production, sourcemaps.write('.')))
        .pipe(gulp.dest(scssDest))
);

/**
 * Compile js scripts
 */
gulp.task('scripts', (done) => {
    browserify(jsSrc, { debug: !argv.production })
        .transform(babelify, {
            presets: ['env'],
            sourceMaps: !argv.production,
        })
        .bundle()
        .on('error', (err) => console.log(err))
        .pipe(source('main.js'))
        .pipe(buffer())
        .pipe(gulpif(!argv.production, sourcemaps.init({ loadMaps: true })))
        .pipe(gulpif(!argv.production, sourcemaps.write('.')))
        .pipe(gulp.dest(jsDest));

    done();
});

gulp.task('build', gulp.series('clean', 'sass', 'scripts', 'braican-api', 'hugo'));

gulp.task(
    'default',
    gulp.series('sass', 'scripts', 'braican-api', 'hugo', 'browser-sync'),
    (done) => done()
);
