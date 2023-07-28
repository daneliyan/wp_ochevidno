<?php get_header(); ?>


<!-- breadcrumbs -->
<div class="container">
	<div class="kama_breadcrumbs">
		<?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs('/'); ?>
	</div>
</div>

<section>
	<div class="container">
		<div class="default-wrapper">
			<div class="decor-title">404</div>
			<h1 class="section-title">Извините, но такой страницы не&nbsp;существует</h1>
			<a href="<?php echo get_home_url(); ?>" class="button btn-w">Вернуться на главную</a>
		</div>
	</div>
</section>


<?php get_footer(); ?>