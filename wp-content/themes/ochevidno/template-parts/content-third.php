		<article class="third-card">
			<div class="card-btns">
				<div class="share-btn"><i class="icomoon icon-share"></i></div>
				<div class="favorites-btn"><i class="icomoon icon-heart-outline"></i></div>
			</div>
			<a href="<?php the_permalink() ?>" class="card">
				<div class="card-img-wrapper" width="410" height="190">
					<div class="card-img" style="background-image: url(<?php the_post_thumbnail_url('thumbnail'); ?>);"></div>
				</div>
				<div class="card-content">
					<div class="card-top">
						<div class="card-author">
							<?php
							$author = get_the_author();
							echo $author;
							?></div>
					</div>
					<h2 class="card-title"><?php the_title(); ?></h2>
					<div class="card-bottom">
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
						<div class="rating">
							<i class="icomoon icon-star-solid"></i>
							<i class="icomoon icon-star-solid"></i>
							<i class="icomoon icon-star-solid"></i>
							<i class="icomoon icon-star-solid"></i>
							<i class="icomoon icon-star"></i>
						</div>
					</div>
				</div>
			</a>
		</article>