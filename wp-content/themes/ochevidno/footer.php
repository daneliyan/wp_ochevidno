
	</main>

<!--------Footer--------->
<footer class="footer">
  <div class="container">
    <div class="footer-container">
      <div class="col">
        <?php if( $logo = get_custom_logo() ){ echo $logo; } ?>
        <ul class="footer-menu">
          <li><a href="#">Пользовательское соглашение</a></li>
          <li><a href="#">Правила сообщества</a></li>
          <li><a href="#">Политика обработки персональных данных</a></li>
        </ul>
      </div>

      <div class="col">
        <div class="search-label">
          <input class="search-input" type="type" placeholder="Поиск" />
          <button class="btn-reset search-btn"><i class="icomoon icon-magnifer"></i></button>
        </div>
        <div class="footer-group">
          <div class="footer-links">
            <a href="mailto:#" class="button btn-w">Реклама</a>
            <a href="#" class="button btn-v">Контакты</a>
          </div>
          <div class="footer-socials">
            <a href="#" target="_blank" class="btn-reset social-btn">
              <i class="icomoon icon-vk"></i>
            </a>
            <a href="#" target="_blank" class="btn-reset social-btn">
              <i class="icomoon icon-telegram"></i>
            </a>
            <a href="#" target="_blank" class="btn-reset social-btn">
              <i class="icomoon icon-whatsapp"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copy">
      <div class="number">18+</div>
      <p class="text">© 1999 - 2023 Очевидно <span>Использование любых материалов сайта без согласования с администрацией запрещено</span></p>
    </div>
  </div>
</footer>

	

<!-- Script-->
<?php wp_footer(); ?>

</body>

</html>