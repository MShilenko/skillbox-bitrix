<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); 

$_application = \Bitrix\Main\Application::getInstance();
?>
<section class="catalog-page">
	<aside class="catalog-filter">
    <div class="aside-nav">
      <h1>Выберите категорию</h1>
      <ul>
        <li class="sub-menu active">
          <a href="#">Моноблоки</a>

          <div class="sub-menu-block">
            <span>Изготовитель</span>
            <ul>
              <li><a href="#">Aser <span>240</span></a></li>
              <li><a href="#">Asus <span>70</span></a></li>
              <li><a href="#">Apple <span>2670</span></a></li>
              <li><a href="#">Dellete <span>240</span></a></li>
              <li><a href="#">XP <span>240</span></a></li>
              <li><a href="#">Lenovo <span>240</span></a></li>
            </ul>
            <a href="#">Показать все</a>
          </div>
        </li>
        <li><a href="#">Ноутбуки</a></li>
        <li><a href="#">Планшеты</a></li>
        <li><a href="#">Телефоны</a></li>
        <li><a href="#">Гаджеты</a></li>
        <li><a href="#">Аксессуары</a></li>
      </ul>
    </div>
    <?$APPLICATION->IncludeComponent(
      "bitrix:catalog.smart.filter",
      "skillbox-smart-filter",
      Array(
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CONVERT_CURRENCY" => "N",
        "DISPLAY_ELEMENT_COUNT" => "Y",
        "FILTER_NAME" => "arFilter",
        "FILTER_VIEW_MODE" => "vertical",
        "HIDE_NOT_AVAILABLE" => "N",
        "IBLOCK_ID" => "2",
        "IBLOCK_TYPE" => "catalog",
        "PAGER_PARAMS_NAME" => "arrPager",
        "POPUP_POSITION" => "right",
        "PREFILTER_NAME" => "smartPreFilter",
        "PRICE_CODE" => array("BASE"),
        "SAVE_IN_SESSION" => "N",
        "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
        "SECTION_DESCRIPTION" => "-",
        "SECTION_ID" => "",
        "SECTION_TITLE" => "-",
        "SEF_MODE" => "N",
        "TEMPLATE_THEME" => "blue",
        "XML_EXPORT" => "N"
      )
    );?>
    
    <div class="aside-block product">
      <h1>Специальные предложения</h1>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231 McKniga s231 McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
    </div>

    <div class="aside-block product">
      <h1>Новинки</h1>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
      <article itemscope itemtype="http://schema.org/Product">
        <div class="image-block mini">
          <a href="#">
            <img src="temp/product-1.png" alt="" itemprop="image">
          </a>
        </div>
        <div class="product-block">
          <div class="product-name">
            <a href="#" itemprop="name">McKniga s231</a>

            <div data-productid="1" class="rateit" data-rateit-value="2.5"></div>
          </div>
          <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            49 000 руб.
            <meta itemprop="price" content="49 000">
            <meta itemprop="priceCurrency" content="RUB">
          </div>
          <meta itemprop="description" content="Обязательно указывайте описание товара">
        </div>
      </article>
    </div>

  </aside>
  <? 

  $sortParam = $_application->getContext()->getRequest()->getQueryList()->get('SORT_BY'); 
  $perPageParam = $_application->getContext()->getRequest()->getQueryList()->get('ON_PAGE'); 
  $perPage = in_array((int) $perPageParam, SKLBOX_AVAILABLE_ON_PAGE_COUNT) ? $perPageParam : SKLBOX_BASE_ON_PAGE_COUNT;
  $sortField1 = '';
  $sortOrder1 = '';
  $sortField2 = 'id';
  $sortOrder2 = 'desc';

  switch (mb_strtoupper($sortParam)) {
    case 'COST_ASC':
      $sortField1 = 'catalog_PRICE_' . SKLBOX_BASE_PRICE_TYPE;
      $sortOrder1 = 'asc';
      break;    
    case 'COST_DESC':
      $sortField1 = 'catalog_PRICE_' . SKLBOX_BASE_PRICE_TYPE;
      $sortOrder1 = 'desc';
      break;
    case 'NEW':
      $sortField1 = 'created';
      $sortOrder1 = 'desc';
      break;
    case 'RATING':
      $sortField1 = 'property_RATING';
      $sortOrder1 = 'desc';
      break;
    case 'NAME':
    default:
      $sortField1 = 'name';
      $sortOrder1 = 'asc';
      $sortParam = 'NAME';
      break;
  }
  
  ?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"skillbox-catalog-section",
		Array(
			"ACTION_VARIABLE" => "action",
			"ADD_PICT_PROP" => "-",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_TO_BASKET_ACTION" => "ADD",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BACKGROUND_IMAGE" => "-",
			"BASKET_URL" => "/personal/basket.php",
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMPATIBLE_MODE" => "Y",
			"CONVERT_CURRENCY" => "N",
			"CUSTOM_FILTER" => "",
			"DETAIL_URL" => "",
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_COMPARE" => "N",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => $sortField1,
			"ELEMENT_SORT_FIELD2" => $sortField2,
			"ELEMENT_SORT_ORDER" => $sortOrder1,
			"ELEMENT_SORT_ORDER2" => $sortOrder2,
			"ENLARGE_PRODUCT" => "STRICT",
			"FILTER_NAME" => "arFilter",
			"HIDE_NOT_AVAILABLE" => "N",
			"HIDE_NOT_AVAILABLE_OFFERS" => "N",
			"IBLOCK_ID" => "2",
			"IBLOCK_TYPE" => "catalog",
			"INCLUDE_SUBSECTIONS" => "Y",
			"LABEL_PROP" => array(),
			"LAZY_LOAD" => "N",
			"LINE_ELEMENT_COUNT" => "3",
			"LOAD_ON_SCROLL" => "N",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => "В корзину",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"MESS_NOT_AVAILABLE" => "Нет в наличии",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"OFFERS_FIELD_CODE" => array("",""),
			"OFFERS_LIMIT" => "5",
			"OFFERS_SORT_FIELD" => "sort",
			"OFFERS_SORT_FIELD2" => "id",
			"OFFERS_SORT_ORDER" => "asc",
			"OFFERS_SORT_ORDER2" => "desc",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "skillbox-pagination",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => $perPage,
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array("BASE"),
			"PRICE_VAT_INCLUDE" => "Y",
			"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
			"PRODUCT_DISPLAY_MODE" => "N",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
			"PRODUCT_SUBSCRIPTION" => "Y",
			"PROPERTY_CODE_MOBILE" => array(),
			"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
			"RCM_TYPE" => "personal",
			"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
			"SECTION_ID" => "",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_URL" => "",
			"SECTION_USER_FIELDS" => array("",""),
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SHOW_ALL_WO_SECTION" => "N",
			"SHOW_CLOSE_POPUP" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_FROM_SECTION" => "N",
			"SHOW_MAX_QUANTITY" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"SHOW_SLIDER" => "Y",
			"SLIDER_INTERVAL" => "3000",
			"SLIDER_PROGRESS" => "N",
			"TEMPLATE_THEME" => "blue",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "N",
      // Добавляем параметры сортировки
      "SORT_AVAILABLE" => [
        'NAME' => 'По названию',
        'COST_DESC' => 'Цена, по убыванию',
        'COST_ASC' => 'Цена, по возрастанию',
        'NEW' => 'Сначала новые',
        'RATING' => 'По рейтингу',
      ],
      // Активный элемент сортировки
      "SORT_NOW" => $sortParam,
      // Массив элементов выбора количества товаров на странице
      "SORT_PAGER_ARRAY" => SKLBOX_AVAILABLE_ON_PAGE_COUNT,
		)
	);?>
</section>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>