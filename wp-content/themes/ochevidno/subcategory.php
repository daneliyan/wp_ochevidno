<?php get_header(); ?>


<section>
	<div class="container">
		<div class="default-container">
			<div class="col">
				<aside>
					<?php get_template_part('template-section/widget', 'categories'); ?>
					<?php get_template_part('template-section/widget', 'subscribe'); ?>
				</aside>
			</div>
			<div class="col">
				<div class="default-wrapper">
					<h1 class="section-title"><?php single_cat_title(); ?></h1>


					<?php if (have_posts()) : ?>
						<div id="posts" class="cards-grid-2">
							<?php
							while (have_posts()) : the_post();
								get_template_part('template-parts/content', 'main');
							endwhile;
							?>

						</div>

						<?php
						$category = get_queried_object();
						$current_cat_id = $category->term_id;
						$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$max_pages = $wp_query->max_num_pages;
						if ($paged < $max_pages) {
							echo '<div id="loadmore" class="loads">
					<span data-term="' . $current_cat_id . '" data-action="loadmore" data-max-pages="' . $max_pages . '" data-paged="' . $paged . '" class="button btn-w">' . __('Загрузить ещё', 'ochevidno') . '</span></div>';
						} ?>


					<?php		// If no content, include the "No posts found" template.
					else :
						get_template_part('template-parts/content', 'none');
					?>

					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>