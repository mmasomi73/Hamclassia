const plugins = require("gulp-load-plugins");
const gulp = require("gulp");
const sass = require('gulp-sass')(require('node-sass'));
const sourcemaps = require("gulp-sourcemaps");
const autoprefixer = require("autoprefixer");
const cleanCSS = require('gulp-clean-css');

// sass.compiler = require('node-sass');

// Load all Gulp plugins into one variable
const $ = plugins();

gulp.task("Sass", function () {
    const tailwindcss = require("tailwindcss");
    const postCssPlugins = [
        tailwindcss("./tailwind.config.js"),
        // Autoprefixer
        autoprefixer(),

        // UnCSS - Uncomment to remove unused styles in production
        // PRODUCTION && uncss.postcssPlugin(UNCSS_OPTIONS),
    ].filter(Boolean);

    return gulp
        .src("src/sass/app.scss")
        .pipe(sourcemaps.init())
        .pipe(
            sass({
                includePaths: "src/**/*",
                outputStyle: 'compressed',
                style: 'compressed'

            }).on("error", sass.logError)
        )
        .pipe($.postcss(postCssPlugins))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest("src/css/"));
});

gulp.task("watch-sass", function () {
    gulp.watch("src/sass/**/*.scss", gulp.series("Sass"));
});
gulp.task('minify-css', () => {
    return gulp.src('src/css/*.css')
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('src/css/'));
});