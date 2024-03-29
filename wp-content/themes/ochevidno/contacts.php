<?php 
/**
 * Template Name: Контакты
 */
get_header(); ?>


<!-- breadcrumbs -->
<div class="container">
  <div class="kama_breadcrumbs">
    <span><a href="#"><span>Главная</span></a></span>
    <span class="kb_sep">/</span>
    <span class="kb_title">Контакты</span>
  </div>
</div>

<section>
  <div class="container">
    <div class="default-container-reverse">
      <div class="col">
        <div class="default-wrapper">
          <h1 class="page-title">Контакты</h1>
          <ul class="contacts-list">
            <li><h3>Для рекламы:</h3><a href="mailto:mail@mail.ru">mail@mail.ru</a></li>
            <li><h3>Для обращений:</h3><a href="mailto:mail@mail.ru">mail@mail.ru</a></li>
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
          <section class="widget widget_subscribe">
            <img src="./img/logo.svg" class="logo" alt="">
            <h3 class="widget-title">Подпишись на новостную&nbsp;рассылку</h3>
            <div class="socials">
              <a href="#" target="_blank" class="btn-reset socials-btn">
                <div class="btn-icon"><i class="icomoon icon-telegram"></i></div>
                <span>Telegram</span>
              </a>
              <a href="#" target="_blank" class="btn-reset socials-btn">
                <div class="btn-icon"><i class="icomoon icon-whatsapp"></i></div>
                <span>WhatsApp</span>
              </a>
              <a href="#" target="_blank" class="btn-reset socials-btn">
                <div class="btn-icon"><i class="icomoon icon-vk"></i></div>
                <span>Вконтакте</span>
              </a>
              <a href="#" target="_blank" class="btn-reset socials-btn">
                <div class="btn-icon"><i class="icomoon icon-viber"></i></div>
                <span>Viber</span>
              </a>
            </div>
            <form action="#">
              <div class="form-group">
                <label for="">
                  <input type="email" name="" id="" placeholder="Email">
                </label>
              </div>
              <button type="submit" class="button btn-b">Подписаться</button>
            </form>
          </section>
        </aside>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>