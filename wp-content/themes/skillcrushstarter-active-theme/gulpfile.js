// include gulp
var gulp = require('gulp'); 

// include plug-ins
var jshint = require('gulp-jshint');
var imagemin = require('gulp-imagemin');

// JS hint task
gulp.task('scripts', function() {
  gulp.src('./js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// Image compression

gulp.task('images', function() {
    var imgSrc = 'img/source/*';
    var imgDest = 'img';

  return gulp.src(imgSrc)
    .pipe(imagemin())
    .pipe(gulp.dest(imgDest))
  });
  
  // Browser Sync
  var browserSync = require('browser-sync');
  var reload      = browserSync.reload;

  // browser-sync task for starting the server.
  gulp.task('browser-sync', function() {
      // watch files
      var files = [
      './style.css',
      './*.php',
      './template_files/*.php',
      './inc/*.php',
      './js/*.js'
      ];

      // initialize browsersync
      browserSync.init(files, {
        // browsersync with a php server
        proxy: "localhost/skillcrush-starting-anew/",
        notify: false
      })
    });
  
  // do ALL THE THINGS
gulp.task('default', ['scripts', 'browser-sync'], function() {

  // watch for JS changes
  gulp.watch('./js/*.js', ["scripts", "scripts"]);
  
  // watch for img changes
  gulp.watch('./img/', function() {
      console.log("Image change - run build before deploy");
  }); 
  
});
  
  // Minifying images here and putting them in img folder - should add autoprefixer
  gulp.task('build', ['images']);