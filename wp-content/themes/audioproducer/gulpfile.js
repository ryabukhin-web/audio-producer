const { src, dest, watch, parallel, series } = require('gulp');

const sass = require('gulp-sass');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const uglify = require('gulp-uglify-es').default;
const autoprefixer = require('gulp-autoprefixer');
const imagemin = require('gulp-imagemin');
const del = require('del');
const sourcemaps = require('gulp-sourcemaps');

function browsersync() {
    browserSync.init({
        server: {
            baseDir: '.'
        }
    });
}

function cleanDist() {
    return del('dist');
}

function images() {
    return src('app/images/**/*')
        .pipe(imagemin([
            imagemin.gifsicle({ interlaced: true }),
            imagemin.mozjpeg({ quality: 75, progressive: true }),
            imagemin.optipng({ optimizationLevel: 5 }),
            imagemin.svgo({
                plugins: [
                    { removeViewBox: true },
                    { cleanupIDs: false }
                ]
            })
        ]))
        .pipe(dest('dist/images'))
}

function scripts() {
    return src([
        'node_modules/jquery/dist/jquery.js',
        'js/swiper-bundle.min.js',
        'js/main.js'
    ])
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(dest('js'))
        .pipe(browserSync.stream())
}

function styles() {
    return src([
        'sass/style.sass'
    ])
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        //.pipe(concat('style.css'))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 15 version'],
            grid: true
        }))
        //.pipe(cleancss({ level: { 1: { specialComments: 0 } } }))
        //.pipe(cleanCSS())
        .pipe(sourcemaps.write('./maps'))
        .pipe(dest('.'))
        .pipe(browserSync.stream())
}



function watching() {
    watch(['sass/**/*.sass'], styles);
    watch(['*.html']).on('change', browserSync.reload);
}

function build() {
    return src([
        'app/css/style.min.css',
        'app/fonts/**/*',
        'app/js/main.min.js',
        'app/*.html'
    ], { base: 'app' })
        .pipe(dest('dist'))
}

exports.styles = styles;
exports.watching = watching;
exports.browsersync = browsersync;
exports.scripts = scripts;
exports.cleanDist = cleanDist;
exports.images = images;

exports.build = series(cleanDist, images, build);
exports.default = parallel(browsersync, watching);