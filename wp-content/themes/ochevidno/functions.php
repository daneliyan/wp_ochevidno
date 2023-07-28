<?php

/**
 * cube functions and definitions

 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 * @package WordPress
 * @subpackage OCHEVIDNO
 * @since OCHEVIDNO 1.0
 */

require_once(__DIR__ . '/includes/wp_clear.php');
require_once(__DIR__ . '/includes/wp_svg.php');
require_once(__DIR__ . '/includes/wp_duplicator.php');
require_once(__DIR__ . '/includes/wp_breadcrumbs.php');


/**
 * Добавление возможностей
 */
if (!function_exists('ochevidno_setup')) {
	function ochevidno_setup()
	{
		add_theme_support('custom-logo', [
			'height'      => 44,
			'width'       => 165,
			'flex-width'  => false,
			'flex-height' => false,
			'header-text' => '',
			'unlink-homepage-logo' => false,
		]);
		add_theme_support('title-tag');


		// Подключение миниатюр
		add_theme_support('post-thumbnails');
	}
	add_action('after_setup_theme', 'ochevidno_setup');
}


/**
 * Регистрирация областей меню
 */
function ochevidno_menus()
{
	$locations = array(
		'header' => __('Header Menu', 'ochevidno'),
		'sidebar' => __('Sidebar Menu', 'ochevidno'),
		'footer' => __('Footer Menu', 'ochevidno'),
	);
	register_nav_menus($locations);
}
// хук-событие
add_action('init', 'ochevidno_menus');



function my_nav_menu($args)
{

	$args = array_merge([
		'container'       => 'div',
		'container_id'    => 'top-navigation-primary',
		'container_class' => 'top-navigation',
		'menu_class'      => 'menu main-menu menu-depth-0 menu-even',
		'echo'            => false,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 10,
		'walker'          => new My_Walker_Nav_Menu()
	], $args);

	echo wp_nav_menu($args);
}

/**
 * Подключение стилей и скриптов
 */
function ochevidno_scripts()
{
	// STYLES
	// Main style
	wp_enqueue_style('main', get_template_directory_uri());
	// Fancybox
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/dist/css/fancybox.min.css');
	// Owl carousel
	wp_enqueue_style('owl', get_template_directory_uri() . '/dist/css/owl.carousel.min.css');
	// App style
	wp_enqueue_style('app', get_template_directory_uri() . '/dist/css/style.min.css');

	// SCRIPTS
	// Jquery
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/dist/js/jquery-3.4.1.min.js', array(), null, true);
	wp_enqueue_script('jquery');
	// Owl carousel
	wp_enqueue_script('owl', get_template_directory_uri() . '/dist/js/owl.carousel.min.js', array('jquery'), null, true);
	// Fancybox
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/dist/js/jquery.fancybox.min.js', array('jquery'), null, true);
	// App
	wp_enqueue_script('app', get_template_directory_uri() . '/dist/js/app.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'ochevidno_scripts');



/**
 * шаблон подкатегории
 */

function subcategory_template($template)
{
	if (is_category() && 0 < get_queried_object()->category_parent) {
		$template = locate_template('subcategory.php');
	}
	return $template;
}
add_filter('category_template', 'subcategory_template');

/*
	 * свой класс построения меню:
	 */

class True_Walker_Nav_Menu extends Walker_Nav_Menu
{

	function start_lvl(
		&$output,
		$depth = 0,
		$args = array()
	) {

		if ($depth == 0) {
			$output .= '<ul class="widget_categories-submenu">';
		} else {
			$output .= '<ul class="sub-sub-menu">';
		}
	}

	function

	end_lvl(
		&$output,
		$depth = 0,
		$args = array()
	) {

		if ($depth == 0) {
			$output .= '</ul>';
		} else {
			$output .= '</ul>';
		}
	}

	function start_el(
		&$output,
		$item,
		$depth = 0,
		$args = NULL,
		$id = 0
	) {

		global $wp_query;

		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		// функция join превращает массив в строку
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

		// ссылка и околоссылочный текст
		$item_output = $args->before;

		$item_output .= '<a' . $attributes . '>';
		/*$item_output .= $image_but;*/

		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}

/** 
 * Главная категория
 */

function get_post_primary_category($post_id, $term = 'category', $return_all_categories = false)
{
	$return = array();

	if (class_exists('WPSEO_Primary_Term')) {
		// Show Primary category by Yoast if it is enabled & set
		$wpseo_primary_term = new WPSEO_Primary_Term($term, $post_id);
		$primary_term = get_term($wpseo_primary_term->get_primary_term());

		if (!is_wp_error($primary_term)) {
			$return['primary_category'] = $primary_term;
		}
	}

	if (empty($return['primary_category']) || $return_all_categories) {
		$categories_list = get_the_terms($post_id, $term);

		if (empty($return['primary_category']) && !empty($categories_list)) {
			$return['primary_category'] = $categories_list[0];  //get the first category
		}
		if ($return_all_categories) {
			$return['all_categories'] = array();

			if (!empty($categories_list)) {
				foreach ($categories_list as &$category) {
					$return['all_categories'][] = $category->term_id;
				}
			}
		}
	}

	return $return;
}


/**
 * Возможность загружать изображения для элементов указанных таксономий: категории, метки.
 */

if (is_admin() && !class_exists('Term_Meta_Image')) {
	// init
	//add_action('current_screen', 'Term_Meta_Image_init');
	add_action('admin_init', 'Term_Meta_Image_init');
	function Term_Meta_Image_init()
	{
		$GLOBALS['Term_Meta_Image'] = new Term_Meta_Image();
	}

	class Term_Meta_Image
	{

		// для каких таксономий включить код. По умолчанию для всех публичных
		static $taxes = array(); // пример: array('category', 'post_tag');

		// название мета ключа
		static $meta_key = '_thumbnail_id';

		// URL пустой картинки
		static $add_img_url = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkAQMAAABKLAcXAAAABlBMVEUAAAC7u7s37rVJAAAAAXRSTlMAQObYZgAAACJJREFUOMtjGAV0BvL/G0YMr/4/CDwY0rzBFJ704o0CWgMAvyaRh+c6m54AAAAASUVORK5CYII=';

		public function __construct()
		{
			if (isset($GLOBALS['Term_Meta_Image'])) return $GLOBALS['Term_Meta_Image']; // once

			$taxes = self::$taxes ? self::$taxes : get_taxonomies(array('public' => true), 'names');

			foreach ($taxes as $taxname) {
				add_action("{$taxname}_add_form_fields",   array(&$this, 'add_term_image'),     10, 2);
				add_action("{$taxname}_edit_form_fields",  array(&$this, 'update_term_image'),  10, 2);
				add_action("created_{$taxname}",           array(&$this, 'save_term_image'),    10, 2);
				add_action("edited_{$taxname}",            array(&$this, 'updated_term_image'), 10, 2);

				add_filter("manage_edit-{$taxname}_columns",  array(&$this, 'add_image_column'));
				add_filter("manage_{$taxname}_custom_column", array(&$this, 'fill_image_column'), 10, 3);
			}
		}

		## поля при создании термина
		public function add_term_image($taxonomy)
		{
			wp_enqueue_media(); // подключим стили медиа, если их нет

			add_action('admin_print_footer_scripts', array(&$this, 'add_script'), 99);
			$this->css();
?>
			<div class="form-field term-group">
				<label><?php _e('Image', 'default'); ?></label>
				<div class="term__image__wrapper">
					<a class="termeta_img_button" href="#">
						<img src="<?php echo self::$add_img_url ?>" alt="">
					</a>
					<input type="button" class="button button-secondary termeta_img_remove" value="<?php _e('Remove', 'default'); ?>" />
				</div>

				<input type="hidden" id="term_imgid" name="term_imgid" value="">
			</div>
		<?php
		}

		## поля при редактировании термина
		public function update_term_image($term, $taxonomy)
		{
			wp_enqueue_media(); // подключим стили медиа, если их нет

			add_action('admin_print_footer_scripts', array(&$this, 'add_script'), 99);

			$image_id = get_term_meta($term->term_id, self::$meta_key, true);
			$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : self::$add_img_url;
			$this->css();
		?>
			<tr class="form-field term-group-wrap">
				<th scope="row"><?php _e('Image', 'default'); ?></th>
				<td>
					<div class="term__image__wrapper">
						<a class="termeta_img_button" href="#">
							<?php echo '<img src="' . $image_url . '" alt="">'; ?>
						</a>
						<input type="button" class="button button-secondary termeta_img_remove" value="<?php _e('Remove', 'default'); ?>" />
					</div>

					<input type="hidden" id="term_imgid" name="term_imgid" value="<?php echo $image_id; ?>">
				</td>
			</tr>
		<?php
		}

		public function css()
		{
		?>
			<style>
				.termeta_img_button {
					display: inline-block;
					margin-right: 1em;
				}

				.termeta_img_button img {
					display: block;
					float: left;
					margin: 0;
					padding: 0;
					min-width: 100px;
					max-width: 150px;
					height: auto;
					background: rgba(0, 0, 0, .07);
				}

				.termeta_img_button:hover img {
					opacity: .8;
				}

				.termeta_img_button:after {
					content: '';
					display: table;
					clear: both;
				}
			</style>
		<?php
		}

		## Add script
		public function add_script()
		{
			// выходим если не на нужной странице таксономии
			//$cs = get_current_screen();
			//if( ! in_array($cs->base, array('edit-tags','term')) || ! in_array($cs->taxonomy, (array) $this->for_taxes) )
			//  return;

			$title = __('Featured Image', 'default');
			$button_txt = __('Set featured image', 'default');
		?>
			<script>
				jQuery(document).ready(function($) {
					var frame,
						$imgwrap = $('.term__image__wrapper'),
						$imgid = $('#term_imgid');

					// добавление
					$('.termeta_img_button').click(function(ev) {
						ev.preventDefault();

						if (frame) {
							frame.open();
							return;
						}

						// задаем media frame
						frame = wp.media.frames.questImgAdd = wp.media({
							states: [
								new wp.media.controller.Library({
									title: '<?php echo $title ?>',
									library: wp.media.query({
										type: 'image'
									}),
									multiple: false,
									//date:   false
								})
							],
							button: {
								text: '<?php echo $button_txt ?>', // Set the text of the button.
							}
						});

						// выбор
						frame.on('select', function() {
							var selected = frame.state().get('selection').first().toJSON();
							if (selected) {
								$imgid.val(selected.id);
								$imgwrap.find('img').attr('src', selected.sizes.thumbnail.url);
							}
						});

						// открываем
						frame.on('open', function() {
							if ($imgid.val()) frame.state().get('selection').add(wp.media.attachment($imgid.val()));
						});

						frame.open();
					});

					// удаление
					$('.termeta_img_remove').click(function() {
						$imgid.val('');
						$imgwrap.find('img').attr('src', '<?php echo self::$add_img_url ?>');
					});
				});
			</script>

<?php
		}

		## Добавляет колонку картинки в таблицу терминов
		public function add_image_column($columns)
		{
			// подправим ширину колонки через css
			add_action('admin_notices', function () {
				echo '<style>.column-image{ width:50px; text-align:center; }</style>';
			});

			$num = 1; // после какой по счету колонки вставлять

			$new_columns = array('image' => ''); // колонка без названия...

			return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
		}

		public function fill_image_column($string, $column_name, $term_id)
		{
			// если есть картинка
			if ($image_id = get_term_meta($term_id, self::$meta_key, 1))
				$string = '<img src="' . wp_get_attachment_image_url($image_id, 'thumbnail') . '" width="50" height="50" alt="" style="border-radius:4px;" />';

			return $string;
		}

		## Save the form field
		public function save_term_image($term_id, $tt_id)
		{
			if (isset($_POST['term_imgid']) && $image = (int) $_POST['term_imgid'])
				add_term_meta($term_id, self::$meta_key, $image, true);
		}

		## Update the form field value
		public function updated_term_image($term_id, $tt_id)
		{
			if (!isset($_POST['term_imgid'])) return;

			if ($image = (int) $_POST['term_imgid'])
				update_term_meta($term_id, self::$meta_key, $image);
			else
				delete_term_meta($term_id, self::$meta_key);
		}
	}
}

/**
 * Подсчет количества посещений страниц
 */


add_action('wp_head', 'kama_postviews');

/**
 * @param array $args
 *
 * @return null
 */
function kama_postviews($args = [])
{
	global $user_ID, $post, $wpdb;

	if (!$post || !is_singular())
		return;

	$rg = (object) wp_parse_args($args, [
		// Ключ мета поля поста, куда будет записываться количество просмотров.
		'meta_key' => 'views',
		// Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
		'who_count' => 0,
		// Исключить ботов, роботов? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.
		'exclude_bots' => true,
	]);

	$do_count = false;
	switch ($rg->who_count) {

		case 0:
			$do_count = true;
			break;
		case 1:
			if (!$user_ID)
				$do_count = true;
			break;
		case 2:
			if ($user_ID)
				$do_count = true;
			break;
	}

	if ($do_count && $rg->exclude_bots) {

		$notbot = 'Mozilla|Opera'; // Chrome|Safari|Firefox|Netscape - все равны Mozilla
		$bot = 'Bot/|robot|Slurp/|yahoo';
		if (
			!preg_match("/$notbot/i", $_SERVER['HTTP_USER_AGENT']) ||
			preg_match("~$bot~i", $_SERVER['HTTP_USER_AGENT'])
		) {
			$do_count = false;
		}
	}

	if ($do_count) {

		$up = $wpdb->query($wpdb->prepare(
			"UPDATE $wpdb->postmeta SET meta_value = (meta_value+1) WHERE post_id = %d AND meta_key = %s",
			$post->ID,
			$rg->meta_key
		));

		if (!$up) {
			add_post_meta($post->ID, $rg->meta_key, 1, true);
		}

		wp_cache_delete($post->ID, 'post_meta');
	}
}

/**
 * Подгрузка постов в категории
 */

add_action('wp_ajax_loadmore', 'true_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'true_loadmore');
function true_loadmore()
{
	$paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
	$paged++;
	$term_id = $_POST['term_id'];
	$args = array('posts_per_page' => 2, 'cat' => $term_id, 'paged' => $paged);
	query_posts($args);

	while (have_posts()) : the_post();

		get_template_part('template-parts/content', 'main');


	endwhile;
	die;
}