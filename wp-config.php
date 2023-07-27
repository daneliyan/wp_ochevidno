<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'ochevidno_bd' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '8w__ljZW$AJ[y<f1-8E%a1x?bd-M4au|mZ3BkArWSzyv9}uT>TC@%)IMcU,[x?{r' );
define( 'SECURE_AUTH_KEY',  'r=ScRketQf,z%X8f~D>t[JeUuoTmS9}Y^>tRrZ/8j:uD0PrO:#d,x#vQY~1;epyv' );
define( 'LOGGED_IN_KEY',    '#@k?`1+DFf&27r19-Ai.EMJJCx|[}2#+>{3`SV.|/sW4$X4q.H+*Vf*z8M@st$^T' );
define( 'NONCE_KEY',        'TN?9qk>L)4=d8|uVfpB]gtT3coAB143iAMti#0&C:o?L[fip3ld`Ey=.!amby#YE' );
define( 'AUTH_SALT',        ';!JMBE=*$^Yq[K0ao1LSc]Xn^9uA#~=AJtX#e)D-:hOTXg?YZ)6FWIVoC3c0@#!:' );
define( 'SECURE_AUTH_SALT', 't$S/`Miic9#(DXu*ls!l^?1_=Al[`c+ebUvO[yKzW|&t1pycfphwfPdNr&`5>E<i' );
define( 'LOGGED_IN_SALT',   ':^zSErnvR0Xti*p)aaItzYS3!^l#F!!D,wP*(<38LN$9sHdM9&!x6bmfg6r-e#{B' );
define( 'NONCE_SALT',       '3x?m{keqUJ4+BW:;Q<(Eig`PrP+ClRzCi{,mZBs+!_4fEP.vd4{_#<(~aL1OG@}1' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
