"use strict";
// Include Plugins
const gulp = require("gulp");
const babel = require("gulp-babel");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const plumber = require("gulp-plumber");
const rename = require("gulp-rename");
const sourcemaps = require("gulp-sourcemaps");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const browserSync = require("browser-sync").create();
const config = require("./config.json");

// Compile Sass
gulp.task("sass", function() {
   return gulp
      .src(config.css.pathSrc)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: "expanded",
            errLogToConsole: true,
         }).on("error", sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestMaps))
      .pipe(gulp.dest(config.css.pathDest))
      .pipe(browserSync.stream());
});

// Minify & PostCSS
gulp.task("css", function() {
   return gulp
      .src(config.css.pathSrcForMinify)
      .pipe(
         postcss([
            autoprefixer({
               browsers: ["last 2 versions"],
            }),
            cssnano(),
         ])
      )
      .pipe(
         rename({
            suffix: ".min",
         })
      )
      .pipe(gulp.dest(config.css.pathDest));
});

// Compile Login-Sass
gulp.task("login-sass", function() {
   return gulp
      .src(config.css.pathSrcForLogin)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: "expanded",
            errLogToConsole: true,
         }).on("error", sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestBackendMaps))
      .pipe(gulp.dest(config.css.pathDestBackend))
      .pipe(browserSync.stream());
});

// Minify & PostCSS Login-CSS
gulp.task("login-css", function() {
   return gulp
      .src(config.css.pathSrcForLoginMinify)
      .pipe(
         postcss([
            autoprefixer({
               browsers: ["last 2 versions"],
            }),
            cssnano(),
         ])
      )
      .pipe(
         rename({
            suffix: ".min",
         })
      )
      .pipe(gulp.dest(config.css.pathDestBackend));
});

// Compile Tinymce-Sass and create CSS-File
gulp.task("tinymce-sass", function() {
   return gulp
      .src(config.css.pathSrcForTinymce)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: "expanded",
            errLogToConsole: true,
         }).on("error", sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestBackendMaps))
      .pipe(gulp.dest(config.css.pathDestBackend))
      .pipe(browserSync.stream());
});

// Minify & PostCSS Tinymce-CSS
gulp.task("tinymce-css", function() {
   return gulp
      .src(config.css.pathSrcForTinymceMinify)
      .pipe(
         postcss([
            autoprefixer({
               browsers: ["last 2 versions"],
            }),
            cssnano(),
         ])
      )
      .pipe(
         rename({
            suffix: ".min",
         })
      )
      .pipe(gulp.dest(config.css.pathDestBackend));
});

// Compile Backend-Sass and create CSS-File
gulp.task("theme-sass", function() {
   return gulp
      .src(config.css.pathSrcForTheme)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: "expanded",
            errLogToConsole: true,
         }).on("error", sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestBackendMaps))
      .pipe(gulp.dest(config.css.pathDestBackend))
      .pipe(browserSync.stream());
});

// Minify & PostCSS Backend-CSS
gulp.task("theme-css", function() {
   return gulp
      .src(config.css.pathSrcForThemeMinify)
      .pipe(
         postcss([
            autoprefixer({
               browsers: ["last 2 versions"],
            }),
            cssnano(),
         ])
      )
      .pipe(
         rename({
            suffix: ".min",
         })
      )
      .pipe(gulp.dest(config.css.pathDestBackend));
});

// Concatenate & Minify JS
gulp.task("scripts", function() {
   return gulp
      .src(config.js.pathSrc)
      .pipe(
         babel({
            presets: ["@babel/env"],
         })
      )
      .pipe(concat("main.js"))
      .pipe(gulp.dest(config.js.pathDest))
      .pipe(
         rename({
            suffix: ".min",
         })
      )
      .pipe(plumber())
      .pipe(uglify())
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.js.pathDest));
});

// Copy & Minify Vendor JS
gulp.task("scripts-vendor", function() {
   return gulp
      .src(config.js.pathSrcVendor)
      .pipe(concat("vendor.js"))
      .pipe(gulp.dest(config.js.pathDestVendor))
      .pipe(
         rename({
            suffix: ".min",
         })
      )
      .pipe(plumber())
      .pipe(uglify())
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.js.pathDestVendor));
});

// Concatenate & Minify separate JS files
gulp.task("scripts-separate", function() {
   return gulp
      .src(config.js.pathSrcSeparate)
      .pipe(
         babel({
            presets: ["@babel/env"],
         })
      )
      .pipe(gulp.dest(config.js.pathDestSeparate))
      .pipe(
         rename({
            suffix: ".min",
         })
      )
      .pipe(plumber())
      .pipe(uglify())
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.js.pathDestSeparate));
});

// Copy & Minify separate vendor JS files
gulp.task("scripts-separate-vendor", function() {
   return gulp
      .src(config.js.pathSrcSeparateVendor)
      .pipe(gulp.dest(config.js.pathDestSeparateVendor))
      .pipe(
         rename({
            suffix: ".min",
         })
      )
      .pipe(plumber())
      .pipe(uglify())
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.js.pathDestSeparateVendor));
});

// Watch Files For Changes
gulp.task("watch", function() {
   browserSync.init({
      proxy: config.settings.host,
   });
   gulp
      .watch(
         "../src/js/**/*.js",
         gulp.series(
            "scripts",
            "scripts-vendor",
            "scripts-separate",
            "scripts-separate-vendor"
         )
      )
      .on("change", browserSync.reload);
   gulp.watch(
      "../src/scss/**/*.scss",
      gulp.series("sass", "theme-sass", "tinymce-sass")
   );
   gulp.watch("../**/*.php").on("change", browserSync.reload);
   gulp.watch("../**/templates/**/*.twig").on("change", browserSync.reload);
});

// Default task
gulp.task(
   "default",
   gulp.series(
      "sass",
      "scripts",
      "scripts-vendor",
      "scripts-separate",
      "scripts-separate-vendor",
      "watch",
      "tinymce-sass",
      "tinymce-css",
      "theme-sass",
      "theme-css"
   )
);

// Build task
gulp.task(
   "build",
   gulp.series(
      "css",
      "login-sass",
      "login-css",
      "tinymce-sass",
      "tinymce-css",
      "theme-sass",
      "theme-css",
      "scripts",
      "scripts-vendor",
      "scripts-separate",
      "scripts-separate-vendor"
   )
);
