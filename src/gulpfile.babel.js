import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';
import rename from 'gulp-rename';
import wpPot from 'gulp-wp-pot';

const server = browserSync.create();
const PRODUCTION = yargs.argv.prod;
const theme = 'lisse';

const paths = {
    rename: {
        src: [
            'archive-_' + theme + '_portfolio.php',
            'single-_' + theme + '_portfolio.php',
            'taxonomy-_' + theme + '_skills.php',
            'taxonomy-_' + theme + '_project_type.php',
        ],
    },
    styles: {
        src: [
            'assets/scss/admin.scss',
            'assets/scss/editor.scss',
            'assets/scss/styles.scss',
        ],
        dest: '../assets/css',
    },
    images: {
        src: 'assets/images/**/*.{jpg,jpeg,png,svg,gif}',
        dest: '../assets/images',
    },
    scripts: {
        src: 'assets/js/*.js',
        dest: '../assets/js',
    },
    // plugins: {
    //     src: [
    //         "../../plugins/_" + theme + "-metaboxes/packaged/*",
    //         "../../plugins/_" + theme + "-shortcodes/packaged/*",
    //         "../../plugins/_" + theme + "-post-types/packaged/*",
    //     ],
    //     dest: ["lib/plugins"],
    // },
    other: {
        src: [
            'assets/**/*',
            '!' + 'assets/{images,js,scss}',
            '!' + 'assets/{images,js,scss}/**/*',
        ],
        dest: '../assets',
    },
    package: {
        src: [
            '**/*',
            '!.vscode',
            '!node_modules{,/**}',
            '!packaged{,/**}',
            '!src{,/**}',
            '!.babelrc',
            '!.gitignore',
            '!gulpfile.babel.js',
            '!package.json',
            '!package-lock.json',
            //   "!archive-_" + theme + "_portfolio.php",
            //   "!single-_" + theme + "_portfolio.php",
            //   "!taxonomy-_" + theme + "_skills.php",
            //   "!taxonomy-_" + theme + "_project_type.php",
        ],
        dest: 'packaged',
    },
};

// export const pot = () => {
//   return gulp
//     .src("**/*.php")
//     .pipe(
//       wpPot({
//         domain: theme,
//         package: info.name,
//       })
//     )
//     .pipe(gulp.dest(`languages/${info.name}.pot`));
// };

export const replace_filenames = () => {
    return gulp
        .src(paths.rename.src)
        .pipe(
            rename((path) => {
                path.basename = path.basename.replace(
                    '_' + theme + '',
                    info.name
                );
            })
        )
        .pipe(gulp.dest('./'));
};

export const delete_replaced_filenames = () => {
    return del(
        paths.rename.src.map((filename) =>
            filename.replace('_' + theme + '', info.name)
        )
    );
};

export const serve = (done) => {
    server.init({
        proxy: 'http://dev.localhost',
    });
    done();
};

export const reload = (done) => {
    server.reload();
    done();
};

export const clean = () => del(['../assets'], { dryRun: true });

export const styles = () => {
    return (
        gulp
            .src(paths.styles.src)
            // .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
            .pipe(sass().on('error', sass.logError))
            .pipe(gulpif(PRODUCTION, cleanCSS({ compatibility: 'ie8' })))
            // .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
            .pipe(gulp.dest(paths.styles.dest))
            .pipe(server.stream())
    );
};

export const images = () => {
    return gulp
        .src(paths.images.src)
        .pipe(gulpif(PRODUCTION, imagemin()))
        .pipe(gulp.dest(paths.images.dest));
};

export const watch = () => {
    gulp.watch('assets/scss/**/*.scss', styles);
    gulp.watch('assets/js/*.js', gulp.series(scripts, reload));
    gulp.watch('../**/*.php', reload);
    gulp.watch(paths.images.src, gulp.series(images, reload));
    gulp.watch(paths.other.src, gulp.series(copy, reload));
};

export const copy = () => {
    return gulp.src(paths.other.src).pipe(gulp.dest(paths.other.dest));
};

export const copyPlugins = () => {
    return gulp.src(paths.plugins.src).pipe(gulp.dest(paths.plugins.dest));
};

export const scripts = () => {
    return gulp
        .src(paths.scripts.src)
        .pipe(named())
        .pipe(
            webpack({
                module: {
                    rules: [
                        {
                            test: /\.js$/,
                            use: {
                                loader: 'babel-loader',
                                options: {
                                    presets: ['@babel/preset-env'],
                                },
                            },
                        },
                    ],
                },
                output: {
                    filename: '[name].js',
                },
                externals: {
                    jquery: 'jQuery',
                },
                // devtool: !PRODUCTION ? 'inline-source-map' : false,
                mode: PRODUCTION ? 'production' : 'development',
            })
        )
        .pipe(gulp.dest(paths.scripts.dest));
};

export const compress = () => {
    return gulp
        .src(paths.package.src)
        .pipe(
            gulpif(
                (file) => file.relative.split('.').pop() !== 'zip',
                replace('_' + theme + '', info.name)
            )
        )
        .pipe(zip(`${info.name}.zip`))
        .pipe(gulp.dest(paths.package.dest));
};

export const dev = gulp.series(
    // clean,
    gulp.parallel(styles, scripts, images, copy),
    serve,
    watch
);
export const build = gulp.series(
    // clean,
    gulp.parallel(styles, scripts, images, copy)
    //   copyPlugins,
    //   pot
);
export const bundle = gulp.series(
    build,
    replace_filenames,
    compress,
    delete_replaced_filenames
);

export default dev;
