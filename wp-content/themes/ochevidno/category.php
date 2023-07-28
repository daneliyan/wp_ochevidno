<?php get_header(); ?>


<!-- breadcrumbs -->
<div class="container">
	<div class="kama_breadcrumbs">
		<?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs('/'); ?>
	</div>
</div>

<section class="archive-page">

	<div class="container">
		<div class="default-container-reverse">
			<div class="col">
				<div class="default-wrapper">
					<div class="archive-top">
						<h1 class="page-title"><?php single_cat_title(); ?></h1>
						<div class="post-per-page">
							<span>Показывать:</span>
							<ul class="post-per-page-numbers">
								<li><a href="#" class="post-per-page-number current">8</a></li>
								<li><a href="#" class="post-per-page-number">16</a></li>
								<li><a href="#" class="post-per-page-number">32</a></li>
							</ul>
						</div>
					</div>

					<!-- подкатегории  -->

					<?php
					$category = get_queried_object();
					$current_cat_id = $category->term_id;
					$cat_data = get_categories(array('parent' => $current_cat_id, 'hide_empty' => 1));
					if ($cat_data) {
						$cat_links = '';
						foreach ($cat_data as $one_cat_data)
							$cat_links .= sprintf('<li><a href="%s" class="tag">%s</a></li>', get_category_link($one_cat_data->term_id), $one_cat_data->cat_name);
						printf('<ul class="tags">%s</ul>', $cat_links);
					}
					?>

					<!-- теги  -->

					<?php
					$cat = get_query_var('cat');
					$cat_ids = get_term_children($cat, 'category');
					array_push($cat_ids, $cat);
					$post_ids = get_objects_in_term($cat_ids, 'category');
					if (!empty($post_ids) && !is_wp_error($post_ids)) {
						$tags = wp_get_object_terms($post_ids, 'post_tag');
						if (!empty($tags) && !is_wp_error($tags)) {
					?>
							<ul class="tags">
								<?php foreach ($tags as $tag) { ?>
									<li><a href="<?php echo get_term_link($tag, 'post_tag'); ?>" class="tag"><?php echo $tag->name; ?></a></li>
								<?php } ?>
							</ul>
						<?php } ?>
					<?php } ?>

					<?php if (have_posts()) : ?>
						<div class="cards">
							<?php
							while (have_posts()) : the_post();
								get_template_part('template-parts/content', 'third');
							endwhile;
							?>

						</div>

						<!------ pagination ------>
						<?php
						the_posts_pagination(array(
							'prev_text' => '<i class="icomoon icon-prev"></i>',
							'next_text' => '<i class="icomoon icon-next"></i>',
							'end_size' => 3,
							'mid_size' => 1,
							'before_page_number' => false,
						));
						?>

					<?php		// If no content, include the "No posts found" template.
					else :
						get_template_part('template-parts/content', 'none');
					?>

					<?php endif; ?>

				</div>
			</div>
			<div class="col">
				<aside>
					<section class="widget widget_latestposts">
						<h3 class="widget-title">Последние новости</h3>

						<?php
						$args = array(
							'post_type' => 'post',
							'cat' => 2,
							'post_status' => 'publish',
							'posts_per_page' => 4,
							'orderby' => 'date',
							'orderby' => 'ASC',
						);
						$wc_query = new WP_Query($args);
						if ($wc_query->have_posts()) :
							while ($wc_query->have_posts()) :
								$wc_query->the_post();
								get_template_part('template-parts/content', 'main');
							endwhile;
						endif;
						wp_reset_postdata();
						?>

					</section>
				</aside>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>