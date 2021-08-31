var plugins = require("gulp-load-plugins");
var gulp = require("gulp");
var sass = require("gulp-sass");
var sourcemaps = require("gulp-sourcemaps");
var autoprefixer = require("autoprefixer");

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
      }).on("error", sass.logError)
    )
    .pipe($.postcss(postCssPlugins))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("src/"));
});

gulp.task("watch-sass", function () {
  gulp.watch("src/sass/**/*.scss", gulp.series("Sass"));
});
