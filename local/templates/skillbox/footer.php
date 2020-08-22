        </main>
        <!--end Основной контент--> 
      </div>

      <!--Footer-->
      <footer id="footer">
        <div class="container">
          <a href="#" class="logo">
            <img src="<?= SITE_TEMPLATE_PATH ?>/temp/footer-logo.png" alt="">
          </a>
          <p>
            Все права защищены 2015. Точка входа
          </p>

          <ul>
            <li><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/temp/paypal.png" alt=""></a></li>
            <li><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/temp/visa.png" alt=""></a></li>
            <li><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/temp/mc.png" alt=""></a></li>
            <li><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/temp/skrill.png" alt=""></a></li>
            <li><a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/temp/payoneer.png" alt=""></a></li>
          </ul>
        </div>
      </footer>
      <!--end Footer-->

      <?/*script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script*/?>
      <? $_asset->addJs(CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH . '/js/application.min.js')); ?>
    </body>
</html>