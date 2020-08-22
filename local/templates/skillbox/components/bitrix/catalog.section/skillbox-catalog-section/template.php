<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<section class="catalog-list">

  <h1><?= $arResult['NAME'] ?></h1>

  <form action="#" class="form-sort">
    <label>Сортировать по</label>
    <select class="sort js_sort_event">
      <? foreach ($arParams['SORT_AVAILABLE'] as $key => $value): ?>   
        <option value="<?= $APPLICATION->GetCurPageParam("SORT_BY={$key}", ["SORT_BY"]) ?>" <?= $key == $arParams['SORT_NOW'] ? 'selected' : '' ?>><?= $value ?></option>
      <? endforeach; ?>
    </select>

    <label>Показать</label>
    <select class="sort js_sort_event">
      <? foreach ($arParams['SORT_PAGER_ARRAY'] as $perPageNumber): ?>
        <option value="<?= $APPLICATION->GetCurPageParam("ON_PAGE={$perPageNumber}", ["ON_PAGE", "PAGEN_1"]) ?>"<?= $perPageNumber == $arParams['PAGE_ELEMENT_COUNT'] ? 'selected' : '' ?>><?= $perPageNumber ?> на странице</option>
      <? endforeach; ?>
    </select>
  </form>


  <!--товары-->
  <? foreach ($arResult['ITEMS'] as $index => $item): ?>
	  <article class="product-item<?=  $index % 3 ? '' : ' odd' ?>" itemscope itemtype="http://schema.org/Product">
	    <?= $item['PROPERTIES']['SPECIALOFFER']['VALUE'] != '' ? '<div class="attr discount"></div>' : '' ?>
	    <?= $item['PROPERTIES']['NEWPRODUCT']['VALUE'] != '' ? '<div class="attr new"></div>' : '' ?>
	    <?= $item['PROPERTIES']['SALELEADER']['VALUE'] != '' ? '<div class="attr top"></div>' : '' ?>

	    <div class="image-block">
	      <a href="<?= $item['DETAIL_PICTURE']['SRC'] ?>">
	        <img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?? $item['DETAIL_PICTURE']['SRC'] ?>" alt="" itemprop="image">
	      </a>
	    </div>
	    <div class="product-block">
	      <div class="product-info">
	        <a href="<?= $arResult['SECTION_PAGE_URL'] ?>"><?= $arResult['NAME'] ?></a>
	        <div data-productid="<?= $item['ID'] ?>" class="rateit" data-rateit-value="2.5"></div>
	      </div>
	      <div class="product-name">
	        <a href="<?= $item['DETAIL_PAGE_URL'] ?>" itemprop="name"><?= $item['NAME'] ?></a>
	      </div>
	      <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	        <?= $item['MIN_PRICE']['VALUE'] ? $item['MIN_PRICE']['PRINT_VALUE'] : '' ?>
	        <meta itemprop="price" content="<?= $item['MIN_PRICE']['VALUE'] ? $item['MIN_PRICE']['VALUE'] : '' ?>">
	        <meta itemprop="priceCurrency" content="<?= $item['MIN_PRICE']['CURRENCY'] ?>">
	      </div>
	      <meta itemprop="description" content="<?= mb_strimwidth($item['DETAIL_TEXT'], 0, 100, "..."); ?>">
	      <form action="#" class="product-add">
	        <input type="hidden" name="productid" value="<?= $item['ID'] ?>">
	        <input type="hidden" name="count" value="1">
	        <input type="submit" class="small" value="В корзину">
	        <span class="ui-favorites">В избранное</span>
	      </form>
	    </div>
	  </article>
	<? endforeach; ?>
  
    <?= $arResult['NAV_STRING'] ?>
</section>