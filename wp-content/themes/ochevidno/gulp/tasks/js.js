//import webpack from "webpack-stream";
import rename from 'gulp-rename';
import fileinclude from "gulp-file-include";
import uglify from "gulp-uglify";

export const js = () => {

	return app.gulp.src(app.path.src.js, { sourcemaps: app.isDev })
		.pipe(app.plugins.plumber(
			app.plugins.notify.onError({
				title: "JS",
				message: "Erorr: <%= erorr.message %>"
			})
		))
		.pipe(fileinclude())
		.pipe(app.gulp.dest(app.path.build.js))
		.pipe(uglify())
		.pipe(rename({
			extname: ".min.js"
		}))
		.pipe(app.gulp.dest(app.path.build.js))
		.pipe(app.plugins.browsersync.stream());

/*
	return app.gulp.src(app.path.src.js, { sourcemaps: app.isDev })
		.pipe(app.plugins.plumber(
			app.plugins.notify.onError({
				title: "JS",
				message: "Erorr: <%= erorr.message %>"
			})
		))

		.pipe(webpack({
			mode: app.isBuild ? 'production' : 'development',
			output: {
				filename:'app.min.js'
			}
		}))
		.pipe(app.gulp.dest(app.path.build.js))
		.pipe(app.plugins.browsersync.stream());
		*/
}