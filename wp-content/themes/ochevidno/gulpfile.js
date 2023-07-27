//Основной модуль
import gulp from "gulp";
//Импорт путей
import { path } from "./gulp/config/path.js";
//Импорт общих плагинов
import { plugins } from "./gulp/config/plugins.js";

//Передаем значения в глобальную переменную
global.app = {
	isBuild: process.argv.includes('--build'),
	isDev: !process.argv.includes('--build'),
	path: path,
	gulp: gulp,
	plugins: plugins
}

//Импорт задач
import { copy } from "./gulp/tasks/copy.js";
import { del } from "./gulp/tasks/reset.js";
import { html } from "./gulp/tasks/html.js";
import { server } from "./gulp/tasks/server.js";
import { scss, css } from "./gulp/tasks/scss.js";
import { js } from "./gulp/tasks/js.js";
import { images } from "./gulp/tasks/images.js";
import { otfToTtf, ttfToWoff, fontsStyle } from "./gulp/tasks/fonts.js";
import { svgSprite } from "./gulp/tasks/svgSprite.js";
import { zip } from "./gulp/tasks/zip.js";
import { ftp } from "./gulp/tasks/ftp.js";
//Наблюдатель за изменениями в файлах
function watcher() {
	gulp.watch(path.watch.files, copy);
	gulp.watch(path.watch.html, html);
	gulp.watch(path.watch.scss, scss);
	gulp.watch(path.watch.css, css);
	gulp.watch(path.watch.js, js);
	gulp.watch(path.watch.images, images);
}
//Поледовательная обработка шрифтов
const fonts = gulp.series(otfToTtf, ttfToWoff, fontsStyle);
//Основные задачи
const mainTasks = gulp.series(fonts, gulp.parallel(copy, html, scss, css, js, images));
//Построение сценариев выполнения задач
const dev = gulp.series(del, mainTasks, gulp.parallel(watcher,server));
const build = gulp.series(del, mainTasks);
const deployZIP = gulp.series(del, mainTasks, zip);
const deployFTP = gulp.series(del, mainTasks, ftp);

export { dev }
export { build }
export { deployZIP }
export { deployFTP }
export { svgSprite }

//Выполнение сценария по умолчанию
gulp.task('default', dev);
