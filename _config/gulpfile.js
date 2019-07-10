'use strict';
// Include Plugins
const gulp = require('gulp');
const babel = require('gulp-babel');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const plumber = require('gulp-plumber');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const imagemin = require('gulp-imagemin');
const imageminPngquant = require('imagemin-pngquant');
const imageminZopfli = require('imagemin-zopfli');
const imageminMozjpeg = require('imagemin-mozjpeg'); // need to run 'brew install libpng'
const imageminWebp = require('imagemin-webp');
const imageResize = require('gulp-image-resize');
const mergeStream = require('merge-stream');
const browserSync = require('browser-sync').create();
const config = require('./config.json');

// Compile Sass
gulp.task('sass', function() {
   return gulp
      .src(config.css.pathSrc)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: 'expanded',
            errLogToConsole: true,
         }).on('error', sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestMaps))
      .pipe(gulp.dest(config.css.pathDest))
      .pipe(browserSync.stream());
});

// Minify & PostCSS
gulp.task('css', function() {
   return gulp
      .src(config.css.pathSrcForMinify)
      .pipe(
         postcss([
            autoprefixer(),
            cssnano(),
         ])
      )
      .pipe(
         rename({
            suffix: '.min',
         })
      )
      .pipe(gulp.dest(config.css.pathDest));
});

// Compile Login-Sass
gulp.task('login-sass', function() {
   return gulp
      .src(config.css.pathSrcForLogin)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: 'expanded',
            errLogToConsole: true,
         }).on('error', sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestBackendMaps))
      .pipe(gulp.dest(config.css.pathDestBackend))
      .pipe(browserSync.stream());
});

// Minify & PostCSS Login-CSS
gulp.task('login-css', function() {
   return gulp
      .src(config.css.pathSrcForLoginMinify)
      .pipe(
         postcss([
            autoprefixer(),
            cssnano(),
         ])
      )
      .pipe(
         rename({
            suffix: '.min',
         })
      )
      .pipe(gulp.dest(config.css.pathDestBackend));
});

// Compile Tinymce-Sass and create CSS-File
gulp.task('tinymce-sass', function() {
   return gulp
      .src(config.css.pathSrcForTinymce)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: 'expanded',
            errLogToConsole: true,
         }).on('error', sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestBackendMaps))
      .pipe(gulp.dest(config.css.pathDestBackend))
      .pipe(browserSync.stream());
});

// Minify & PostCSS Tinymce-CSS
gulp.task('tinymce-css', function() {
   return gulp
      .src(config.css.pathSrcForTinymceMinify)
      .pipe(
         postcss([
            autoprefixer(),
            cssnano(),
         ])
      )
      .pipe(
         rename({
            suffix: '.min',
         })
      )
      .pipe(gulp.dest(config.css.pathDestBackend));
});

// Compile Backend-Sass and create CSS-File
gulp.task('theme-sass', function() {
   return gulp
      .src(config.css.pathSrcForTheme)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: 'expanded',
            errLogToConsole: true,
         }).on('error', sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestBackendMaps))
      .pipe(gulp.dest(config.css.pathDestBackend))
      .pipe(browserSync.stream());
});

// Minify & PostCSS Backend-CSS
gulp.task('theme-css', function() {
   return gulp
      .src(config.css.pathSrcForThemeMinify)
      .pipe(
         postcss([
            autoprefixer(),
            cssnano(),
         ])
      )
      .pipe(
         rename({
            suffix: '.min',
         })
      )
      .pipe(gulp.dest(config.css.pathDestBackend));
});

// Compile Backend-Sass and create CSS-File
gulp.task('debug-sass', function() {
   return gulp
      .src(config.css.pathSrcForDebug)
      .pipe(sourcemaps.init())
      .pipe(
         sass({
            outputStyle: 'expanded',
            errLogToConsole: true,
         }).on('error', sass.logError)
      )
      .pipe(sourcemaps.write(config.css.pathDestBackendMaps))
      .pipe(gulp.dest(config.css.pathDestBackend))
      .pipe(browserSync.stream());
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
   return gulp
      .src(config.js.pathSrc)
      .pipe(
         babel({
            presets: ['@babel/env'],
         })
      )
      .pipe(concat('main.js'))
      .pipe(gulp.dest(config.js.pathDest))
      .pipe(
         rename({
            suffix: '.min',
         })
      )
      .pipe(plumber())
      .pipe(uglify())
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.js.pathDest));
});

// Copy & Minify Vendor JS
gulp.task('scripts-vendor', function() {
   return gulp
      .src(config.js.pathSrcVendor)
      .pipe(concat('vendor.js'))
      .pipe(gulp.dest(config.js.pathDestVendor))
      .pipe(
         rename({
            suffix: '.min',
         })
      )
      .pipe(plumber())
      .pipe(uglify())
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.js.pathDestVendor));
});

// Concatenate & Minify separate JS files
gulp.task('scripts-separate', function() {
   return gulp
      .src(config.js.pathSrcSeparate)
      .pipe(
         babel({
            presets: ['@babel/env'],
         })
      )
      .pipe(gulp.dest(config.js.pathDestSeparate))
      .pipe(
         rename({
            suffix: '.min',
         })
      )
      .pipe(plumber())
      .pipe(uglify())
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.js.pathDestSeparate));
});

// Copy & Minify separate vendor JS files
gulp.task('scripts-separate-vendor', function() {
   return gulp
      .src(config.js.pathSrcSeparateVendor)
      .pipe(gulp.dest(config.js.pathDestSeparateVendor))
      .pipe(
         rename({
            suffix: '.min',
         })
      )
      .pipe(plumber())
      .pipe(uglify())
      .pipe(plumber.stop())
      .pipe(gulp.dest(config.js.pathDestSeparateVendor));
});

// Optimize images
gulp.task('images-compress', function() {
    // https://gist.github.com/LoyEgor/e9dba0725b3ddbb8d1a68c91ca5452b5
    return gulp
        .src(config.images.pathSrc + '/*.{gif,png,jpg,svg}')
        .pipe(
            imagemin([
                // png
                imageminPngquant({
                    speed: 1,
                    strip: true, // remove optional metadata
                    quality: [0.7, 0.9] // lossy settings
                }),
                imageminZopfli({
                    more: true
                    // iterations: 50 // very slow but more effective
                }),
                // gif
                imagemin.gifsicle({
                    interlaced: true,
                    optimizationLevel: 3
                }),
                // svg
                imagemin.svgo({
                    plugins: [{
                        removeViewBox: false
                    }]
                }),
                // jpg lossless
                imagemin.jpegtran({
                    progressive: true
                }),
                // jpg very light lossy, use vs jpegtran
                imageminMozjpeg({
                    quality: 80
                })
            ], {
                verbose: true
            })
        )
        .pipe(gulp.dest(config.images.pathDest));
});

// Convert jpg to webp
gulp.task('images-jpg-webp', function() {
    // https://freshman.tech/image-optimisation/
    // convert oiginal jpgs
    return gulp
        .src(config.images.pathSrc + '/*.jpg')
        .pipe(
            imagemin([
                imageminWebp({
                    quality: 75,
                    method: 6 // slowest method, but best file size and quality, default: 4
                })
            ], {
                verbose: true
            })
        )
        .pipe(rename({ extname: '.webp' }))
        .pipe(gulp.dest(config.images.pathDest));
});

// Convert png to webp
gulp.task('images-png-webp', function() {
    // https://freshman.tech/image-optimisation/
    // convert optimized pngs
    return gulp
        .src(config.images.pathDest + '/*.png')
        .pipe(
            imagemin([
                imageminWebp({
                    quality: 75,
                    method: 6 // slowest method, but best file size and quality, default: 4
                })
         ], {
            verbose: true
         })
      )
      .pipe(rename({ extname: '.webp' }))
      .pipe(gulp.dest(config.images.pathDest));
});

// Resize Images
gulp.task('images-resize', function () {
   // https://www.npmjs.com/package/gulp-image-resize
   // http://www.graphicsmagick.org/index.html
   let resizes = [];
   // Define the desired image widths in px
   const sizes = [480, 768, 1024, 1280, 1600, 1920];
   for (let i = 0; i < sizes.length; i++) {
      resizes.push(
         gulp.src(config.images.pathSrc + '/thumb-patterns/*.{jpg,png}')
            .pipe(imageResize({
               width : sizes[i],
               crop : false,
               upscale : false,
               filter: 'Catrom',
               noProfile: true,
         }))
         .pipe(rename({ suffix: '-' + sizes[i] + 'px'}))
         .pipe( //imagemin part of task "images-compress"
            imagemin([
                  // png
                  imageminPngquant({
                     speed: 1,
                     strip: true, // remove optional metadata
                     quality: [0.7, 0.9] // lossy settings
                  }),
                  imageminZopfli({
                     more: true
                     // iterations: 50 // very slow but more effective
                  }),
                  // gif
                  imagemin.gifsicle({
                     interlaced: true,
                     optimizationLevel: 3
                  }),
                  // svg
                  imagemin.svgo({
                     plugins: [{
                        removeViewBox: false
                     }]
                  }),
                  // jpg lossless
                  imagemin.jpegtran({
                     progressive: true
                  }),
                  // jpg very light lossy, use vs jpegtran
                  imageminMozjpeg({
                     quality: 80
                  })
            ], {
                  verbose: true
            })
         )
         .pipe(gulp.dest(config.images.pathDest + '/thumb-patterns'))
      );
   }
   return mergeStream(resizes);
 });

// Watch Files For Changes
gulp.task('watch', function() {
   browserSync.init({
      proxy: config.settings.host,
   });
   gulp
      .watch(
         '../src/js/**/*.js',
         gulp.series(
            'scripts',
            'scripts-vendor',
            'scripts-separate',
            'scripts-separate-vendor'
         )
      )
      .on('change', browserSync.reload);
   gulp.watch(
      '../src/scss/**/*.scss',
      gulp.series('sass')
   );
   gulp.watch('../**/*.php').on('change', browserSync.reload);
   gulp.watch('../**/templates/**/*.twig').on('change', browserSync.reload);
});

// Watch Files For Changes
gulp.task('watch-backend', function() {
   browserSync.init({
      proxy: config.settings.host,
   });
   gulp
      .watch(
         '../src/js/**/*.js',
         gulp.series(
            'scripts',
            'scripts-vendor',
            'scripts-separate',
            'scripts-separate-vendor'
         )
      )
      .on('change', browserSync.reload);
   gulp.watch(
      '../src/scss/**/*.scss',
      gulp.series('sass', 'tinymce-sass', 'login-sass', 'theme-sass')
   );
   gulp.watch('../**/*.php').on('change', browserSync.reload);
   gulp.watch('../**/templates/**/*.twig').on('change', browserSync.reload);
});

// Default task
gulp.task(
   'default',
   gulp.series(
      'sass',
      'css',
      'debug-sass',
      'scripts',
      'scripts-vendor',
      'scripts-separate',
      'scripts-separate-vendor',
      'watch'
   )
);

// Backend Styling task
gulp.task(
   'backend',
   gulp.series(
      'sass',
      'css',
      'tinymce-sass',
      'tinymce-css',
      'login-sass',
      'login-css',
      'theme-sass',
      'theme-css',
      'watch-backend'
   )
);

// Build task
gulp.task(
   'build',
   gulp.series(
      'sass',
      'css',
      'login-sass',
      'login-css',
      'tinymce-sass',
      'tinymce-css',
      'theme-sass',
      'theme-css',
      'scripts',
      'scripts-vendor',
      'scripts-separate',
      'scripts-separate-vendor'
   )
);

// Image task
   gulp.task(
      'images',
      gulp.series(
         'images-compress',
         'images-jpg-webp',
         'images-png-webp',
         'images-resize'
      )
   );
