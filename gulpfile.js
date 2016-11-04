var gulp = require('gulp'),
	minify = require('gulp-minify-css'),
	notify = require('gulp-notify'),
	rename = require('gulp-rename'),
	stylus = require('gulp-stylus'),
	uglify = require('gulp-uglify'),
	coffee = require('gulp-coffeeify'),
	prefix = require('gulp-autoprefixer'),
	server = require('browser-sync');

/*
|--------------------------------------------------------------------------
| Main Task
|--------------------------------------------------------------------------
| Includes all tasks.
*/

var sDest = 'assets/stylus';

var cDest = 'assets/coffee';

gulp.task('default', ['stylus', 'coffee', 'server'], function(){
	gulp.watch(sDest + '/**/*', ['stylus']);

	gulp.watch(cDest + '/**/*', ['coffee']);

	gulp.watch('*.php', server.reload);
});

function showError(e) {
	console.log(e.toString());

	this.emit('end');
}

gulp.task('server', function(){
	server.init({
		proxy: 'localhost',
		ghostMode: false,
		open: false,
		notify: false
	})
});

/*
|--------------------------------------------------------------------------
| Stylus Task
|--------------------------------------------------------------------------
*/

gulp.task('stylus', function(){
	gulp.src(sDest + '/main.styl')
		.pipe(stylus({
			compress: false
		}))
		.on('error', showError)
		.pipe(prefix())
		.pipe(minify())
		.pipe(rename('style.css'))
		.pipe(gulp.dest('css'))
		.pipe(server.stream());
});
/*
|--------------------------------------------------------------------------
| Coffee Task
|--------------------------------------------------------------------------
*/

gulp.task('coffee', function(){
	gulp.src(cDest + '/index.coffee')
		.pipe(coffee())
		.on('error', showError)
		.pipe(uglify())
		.pipe(rename('script.js'))
		.pipe(gulp.dest('js'))
		.on('end', function(){
			server.reload();
		});
});

/*
|--------------------------------------------------------------------------
| Watch Task
|--------------------------------------------------------------------------
*/