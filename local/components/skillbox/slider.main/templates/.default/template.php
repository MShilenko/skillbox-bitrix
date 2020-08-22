<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if($arResult['SLIDER_IMAGES']): ?>
  <div class="home-slider-conteiner">
    <div class="home-slider">
      <? foreach ($arResult['SLIDER_IMAGES'] as $image): ?>
        <div class="home-slider-item">
          <img src="<?= CFile::GetPath($image['DETAIL_PICTURE']) ?>" alt="" class="home-slider-bg">

          <div class="container">
            <a href="<?= $image['PROPERTY_SLIDE_LINK_VALUE'] ?? '#' ?>">
              <img src="<?= CFile::GetPath($image['PREVIEW_PICTURE']) ?>" alt="" class="home-slider-content">
            </a>
          </div>
        </div>
     <? endforeach; ?>
    </div>
  </div>
<? endif; ?>