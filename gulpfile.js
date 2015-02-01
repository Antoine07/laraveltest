var gulp = require('gulp');
var minifycss = require('gulp-minify-css');

gulp.task('css', function(){
    return gulp.src('public/assets/css/main.css')
        .pipe(minifycss())
        .pipe(gulp.dest('public/assets/css/min'));
});

gulp.task('default', function(){
    gulp.run('css');
    gulp.watch('public/assets/css/*css', function(){
        gulp.run('css');
    });
});