<?php

/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage OCHEVIDNO
 * @since OCHEVIDNO 1.0
 */

get_header(); ?>


<!-- breadcrumbs -->
<div class="container">
	<div class="kama_breadcrumbs">
		<?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs('/'); ?>
	</div>
</div>

<section>
	<div class="container">
		<article class="post">
			<h1 class="title"><?php the_title(); ?></h1>
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

			<?php the_tags('<ul class="tags"><li>', '</li><li>', '</li></ul>'); ?>


			<?php the_content(); ?>



			<div class="post-bottom">
				<div class="author">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/img/author.jpg" alt="">
					<h3>
						<?php
						$author = get_the_author();
						echo $author;
						?>
					</h3>
				</div>
				<div class="post-btns">
					<div class="share-button"><span>Поделиться</span><i class="icomoon icon-share"></i></div>
				</div>
			</div>
		</article>

		<div class="comments">

			<div class="default-wrapper">
				<h3 class="section-title">Комментарии (5)</h3>
				<ol class="comment-list">
					<li class="comment even thread-even depth-1">
						<article id="div-comment-5">
							<footer>
								<div class="comment-metadata">
									<a href="#" class="text-muted"><i class="icomoon icon-calendar"></i><time>27.06.2023</time></a>
								</div><!-- .comment-metadata -->
								<h5>Баканов Илья</h5>
								<div class="comment-text">
									Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
									eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
								</div>
							</footer>
						</article>
					</li><!-- #comment-## -->
					<li class="comment even thread-even depth-1">
						<article id="div-comment-5">
							<footer>
								<div class="comment-metadata">
									<a href="#" class="text-muted"><i class="icomoon icon-calendar"></i><time>27.06.2023</time></a>
								</div><!-- .comment-metadata -->
								<h5>Баканов Илья</h5>
								<div class="comment-text">
									Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
									eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
								</div>
							</footer>
						</article>
					</li><!-- #comment-## -->
					<li class="comment even thread-even depth-1">
						<article id="div-comment-5">
							<footer>
								<div class="comment-metadata">
									<a href="#" class="text-muted"><i class="icomoon icon-calendar"></i><time>27.06.2023</time></a>
								</div><!-- .comment-metadata -->
								<h5>Баканов Илья</h5>
								<div class="comment-text">
									Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
									eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
								</div>
							</footer>
						</article>
					</li><!-- #comment-## -->
				</ol><!-- .comment-list -->
				<button class="button btn-w">Загрузить ещё</button>
			</div>

			<div class="default-wrapper">
				<div class="comment-respond">
					<h3 class="comment-reply-title section-title">Оставить комментарий</h3>
					<form action="#" method="post" class="comment-form" novalidate="">
						<div class="comment-form-comment mb-3">
							<textarea class="form-control" cols="40" rows="10" placeholder="Ваш комментарий" aria-required="true" required="required"></textarea>
						</div>
						<p class="form-submit">
							<button type="submit" class="button btn-v">Отправить</button>
						</p>
					</form>
				</div>
			</div>

		</div>

	</div>
</section>

<?php get_template_part('template-section/widget', 'related'); ?>




<?php get_footer(); ?>