<article class="main-card">
	<div class="favorites-btn"><i class="icomoon icon-heart-outline"></i></div>
	<a href="<?php the_permalink() ?>" class="card">
		<div class="card-img-wrapper" width="410" height="190">
			<div class="card-img" style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>);"></div>
		</div>
		<div class="card-content">
			<div class="card-top">
				<div class="card-category">

					<?php
					$post_categories = get_post_primary_category($post->ID, 'category');
					$primary_category = $post_categories['primary_category'];

					$image_id = get_term_meta($primary_category->term_id, '_thumbnail_id', 1);
					$image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
					echo '<img src="' . $image_url . '" alt="' . $primary_category->name . '" class="svg">';
					echo $primary_category->name;
					?>

				</div>
				<div class="card-author">
					<?php $author = get_the_author();
					echo $author; ?></div>
			</div>
			<h2 class="card-title"><?php the_title(); ?></h2>
			<ul class="options">
				<li><i class="icomoon icon-calendar"></i><?php the_time('d.m.Y') ?></li>
				<li><i class="icomoon icon-comment"></i><?php comments_number('0', '1', '%'); ?></li>

				<li><i class="icomoon icon-eye"></i>
					<?php
					$views = get_post_meta($post->ID, 'views', true);
					if ($views >= 1) {
						echo $views;
					} else {
						echo '0';
					}
					?>
				</li>
			</ul>
		</div>
	</a>
</article>