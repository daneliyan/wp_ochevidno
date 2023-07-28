<?php

/**
 * Main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage OCHEVIDNO
 * @since OCHEVIDNO 1.0
 */

get_header(); ?>

<main class="container">
	<!-- breadcrumbs -->
	<?php if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div class="breadcrumbs"> <nav>', '</nav></div>');
	} ?>

	<h1 class="page-title"><?php _e('Новости', 'zeleno'); ?></h1>

	<?php if (have_posts()) : ?>


		<div class="blog-grid">
			<?php

			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', get_post_format());

			endwhile;
			?>

			<?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$max_pages = $wp_query->max_num_pages;
			if ($paged < $max_pages) {
				echo '<div id="loadmore" class="loads">
					<span data-action="loadmore" data-max-pages="' . $max_pages . '" data-paged="' . $paged . '" class="button button-global">' . __('Показать еще', 'zeleno') . '</span></div>';
			} ?>

		</div>



	<?php		// If no content, include the "No posts found" template.
	else :
		get_template_part('template-parts/content', 'none');
	?>

	<?php endif; ?>

</main>

<?php get_footer(); ?>