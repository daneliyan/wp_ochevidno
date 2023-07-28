<?php
/*
* Отключаем бар администратора
*/
add_filter('show_admin_bar', '__return_false');

/*
 * Отключаем Emojii
 */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
add_filter('tiny_mce_plugins', 'disable_wp_emojis_in_tinymce');
function disable_wp_emojis_in_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

/*
* Удаляем лишнее из шапки
*/
// Удаляет ссылки RSS-лент записи и комментариев
remove_action('wp_head', 'feed_links', 2);
// Удаляет ссылки RSS-лент категорий и архивов
remove_action('wp_head', 'feed_links_extra', 3);
// Удаляет RSD ссылку для удаленной публикации
remove_action('wp_head', 'rsd_link');
// Удаляет ссылку Windows для Live Writer
remove_action('wp_head', 'wlwmanifest_link');
// Удаляет короткую ссылку
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Удаляет информацию о версии WordPress
remove_action('wp_head', 'wp_generator');
// Удаляет ссылки на предыдущую и следующую статьи
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/*
* Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
*/
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});


/**
 * 
 */
add_filter('the_content', 'remove_img_titles');

function remove_img_titles($text)
{

	// Get all title="..." tags from the html.
	$result = array();
	preg_match_all('|title="[^"]*"|U', $text, $result);

	// Replace all occurances with an empty string.
	foreach ($result[0] as $img_tag) {
		$text = str_replace($img_tag, '', $text);
	}

	return $text;
}


/* 
* для wpcf7 убирает теги из формы
*/
add_filter('wpcf7_autop_or_not', '__return_false');



/*
* пункты меню в админ-панели

function edit_admin_menus()
{
	global $menu;
	$menu[5][0] = 'Blog'; // Изменить название

	//remove_menu_page('edit-comments.php'); 
}
add_action('admin_menu', 'edit_admin_menus');


function wptutsplus_change_menu_order($menu_order)
{
	return array(
		'index.php',
		'upload.php',
		'edit.php?post_type=page',
		'edit.php',
		'edit.php?post_type=services',
		'edit.php?post_type=cases',
		'edit.php?post_type=industries',
		'edit.php?post_type=spheres',
		'edit.php?post_type=portfolio',
	);
}
add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', 'wptutsplus_change_menu_order');
*/