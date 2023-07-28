<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- favicons -->
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg" type="image/x-icon">
<meta name="msapplication-tilecolor" content="#fff">
<meta name="msapplication-tileimage" content="<?php echo get_template_directory_uri() ?>/dist/img/favicon.svg">
<meta name="theme-color" content="#6E42ED">

<!-- CSS -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- header desktop -->
<header class="header header-desktop">
	<nav class="nav container">
    <?php if( $logo = get_custom_logo() ){ echo $logo; } ?>
		<div class="nav-menu">
      <?php
        wp_nav_menu( [
          'theme_location'  => 'header',
          'container'       => '',
          'menu_class'      => 'nav-list',
          'menu_id'         => false,
          'echo'            => true,
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ] );
      ?>
		</div>
		<div class="header-bar">
			<div class="search-label search-second" id="searchBarLabel">
				<input class="search-input" id="searchHiddenInput" type="type" placeholder="Поиск" />
				<button class="btn-reset search-btn" id="searchToggleBtn"><i class="icomoon icon-magnifer"></i></button>
			</div>
			<!-- Theme change button -->
			<a href="#" class="btn-icon">
				<i class="icomoon icon-moon change-theme" id="theme-button1"></i>
			</a>
			<a href="#" class="btn-icon">
				<i class="icomoon icon-user"></i>
			</a>
			<a href="#" class="btn-icon">
				<i class="icomoon icon-heart"></i>
			</a>
			<a href="#" class="btn-icon">
				<i class="icomoon icon-plus"></i>
			</a>
		</div>
	</nav>
</header>

<!-- header mobile -->
<header class="header header-mob">
	<nav class="nav container">
		<?php if( $logo = get_custom_logo() ){ echo $logo; } ?>
		<div class="nav-menu" id="nav-menu">
			<ul class="nav-list">
				<li><a href="#">Новости</a></li>
				<li><a href="#">Статьи</a></li>
				<li><a href="#">Блоги</a></li>
				<li><a href="#">Обзоры</a></li>
				<li><a href="#">Отзывы</a></li>
				<li><a href="#">Помощь</a></li>
			</ul>
			<div class="header-bar">
				<!-- Theme change button -->
				<a href="#" class="btn-icon">
					<i class="icomoon icon-moon change-theme" id="theme-button2"></i>
				</a>
				<a href="#" class="btn-icon">
					<i class="icomoon icon-user"></i>
				</a>
				<a href="#" class="btn-icon">
					<i class="icomoon icon-heart"></i>
				</a>
				<a href="#" class="btn-icon">
					<i class="icomoon icon-plus"></i>
				</a>
			</div>
			<div class="search-label">
				<input class="search-input" type="type" placeholder="Поиск" />
				<button class="btn-reset search-btn"><i class="icomoon icon-magnifer"></i></button>
			</div>
		</div>
		<div class="header-bar">
			<a href="#" class="btn-icon">
				<i class="icomoon icon-user"></i>
			</a>
			<!-- Toggle button -->
			<div class="btn-icon nav-toggle" id="nav-toggle">
				<i class="icomoon icon-menu"></i>
			</div>
		</div>
	</nav>
</header>

	<main>