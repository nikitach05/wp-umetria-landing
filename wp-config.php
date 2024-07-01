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
define( 'DB_NAME', 'umetria-landing' );

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
define( 'AUTH_KEY',         '=~:FT[+b{)Feha!dCPl3HjML%/|HAjPrqKZ9pHR)#.,{!7Am5_gMng#A=VOjaUI6' );
define( 'SECURE_AUTH_KEY',  'w1[q3rAoR(}f8k( }Z?n3?IZnWX`>3ZhGkm[~@0LzJ$cW#G$23+t5}aJR+8?=ZE!' );
define( 'LOGGED_IN_KEY',    '1Ey2k6ivW@Glb_.$OWC2.dFto?#t|=y?AC/oPffg@aD&7MR@.O7GNc=~x-/8rg5d' );
define( 'NONCE_KEY',        './r<8o_my)Eng=6X;D?J69D1bh4VE|(k?`4l(&l I&?]9tQ3l/P!KV|vNk*@oV}w' );
define( 'AUTH_SALT',        'Qi/eDIe_5Da.2oYZ<7Hh!G,A[|@gcL+|E+IYoKJ%0S&>>Dx1SDsadCr%6$c>cofK' );
define( 'SECURE_AUTH_SALT', 'l,PYU+Rb/bq0;0cq08A-rV@4J]6ocM[67kmIRgFt9l;phq1(4f{g6g{JmJG?%Tb+' );
define( 'LOGGED_IN_SALT',   'LQGJ~:4!5Z>_X4}dh3lXe-*arDWWXO{K0^N_Vy3ov_FS~^}#T7 .MuNv@ig+ZCT4' );
define( 'NONCE_SALT',       'lx*m^IqW00_TveG;#hx(eOC)`D..O^J6qFg<aw7T~qS_oC:reuMK@r)`xS_/)C:`' );

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
