const gulp = require('gulp');
const webpack = require('webpack-stream');
var browserSync = require('browser-sync').create();
const { watch } = require('gulp');

var watchCallback = function(done) {
    gulp.src('./resources/app.js')
    .pipe(webpack(require('./webpack.config')))
    .on('error', function (err) {
        console.log(err.toString());

        this.emit('end');
    })
    .pipe(gulp.dest('./public/bundles/'))
    .on('finish', function() {
        browserSync.reload();

        this.emit('end');
    });

    done();
};

gulp.task('default', function (done) {
    watch('./resources/**/*.*', watchCallback);
    watch('./public/*.*', watchCallback);

    browserSync.init({
        server: {
            baseDir: "./resources/views",
            open: false
        },
        port: 8000,
        notify: false
    });

    done();
});

