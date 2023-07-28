<?php

/**
 * Template Name: Контакты
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
		<div class="default-container-reverse">
			<div class="col">
				<div class="default-wrapper">
					<h1 class="page-title">Контакты</h1>
					<ul class="contacts-list">
						<li>
							<h3>Для рекламы:</h3><a href="mailto:mail@mail.ru">mail@mail.ru</a>
						</li>
						<li>
							<h3>Для обращений:</h3><a href="mailto:mail@mail.ru">mail@mail.ru</a>
						</li>
					</ul>
					<h2 class="section-title">Вы можете оставить заявку для связи с администрацией через форму обратной связи:</h2>
					<div class="contacts-form">
						<form action="#">
							<div class="form-row">
								<div class="form-group">
									<label for="">
										<input type="text" name="" id="" placeholder="Ваше имя">
									</label>
								</div>
								<div class="form-group">
									<label for="">
										<input type="email" name="" id="" placeholder="Email">
									</label>
								</div>
							</div>
							<textarea cols="40" rows="10" placeholder="Сообщение"></textarea>
							<button type="submit" class="button btn-v">Отправить</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col">
				<aside>
					<?php get_template_part('template-section/widget', 'subscribe'); ?>
				</aside>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>