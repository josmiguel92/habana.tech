var gulp = require('gulp'),
postcss = require('gulp-postcss'),
sass = require('gulp-sass'),
autoprefixer = require('autoprefixer'),
cssImport = require('postcss-import'),
mixins = require('postcss-mixins'),
hexrgba =require('postcss-hexrgba');


gulp.task('styles', function(){
    return gulp.src('./assets/styles/**/*.scss')        
        .pipe(postcss([cssImport, mixins, autoprefixer, hexrgba]))
        .on('error', function (errorInfo) { 
            console.log(errorInfo.toString());
            this.emit('end');
         })
         .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./public/static/styles/'));
});