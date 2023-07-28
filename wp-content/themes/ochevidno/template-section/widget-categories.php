<section class="widget widget_categories">
	<h3 class="widget-title">Категории</h3>

	<?php wp_nav_menu(
		array(
			'container' => false,
			'theme_location' => 'sidebar',
			'menu_class' => '',
			'walker' => new True_Walker_Nav_Menu() // этот параметр нужно добавить
		)
	);
	?>
</section>