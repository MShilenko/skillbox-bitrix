<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<p>Уже зарегестрированы? <a href="#">Нажми чтобы войти</a></p>
<section class="order-page" id="mainBlockOrder">
  <form action="#" id="orderForm">
    <input type="hidden" name="sessid" value="<?= bitrix_sessid() ?>"/>
    <input type="hidden" id="signedParamsString" name="signedParamsString" value="<?= $arParams['SIGNED_PARAMS'] ?>"/>
		<input type="hidden" name="location_type" value="code">
		<input type="hidden" name="PERSON_TYPE" value="<?= SKLBOX_CART_PERSON_INDIVIDUAL ?>">
		<input type="hidden" name="PERSON_TYPE_OLD" value="<?= SKLBOX_CART_PERSON_INDIVIDUAL ?>">
		<input type="hidden" name="BUYER_STORE" value="<?= SKLBOX_BUYER_STORE ?>">
		<input type="hidden" name="RECENT_DELIVERY_VALUE" value="<?= $arParams['PERSONAL_BLOCK_DATA_LOCATION']['DEFAULT_VALUE'] ?>">

    <div class="block-cell">
      <h1><?= GetMessage('SKILLBOX_CART_TITLE') ?></h1>
      <div class="form-line">
        <label>Город *</label>
        <?$APPLICATION->IncludeComponent(
    			"bitrix:sale.location.selector.search",
    			"",
    			Array(
    				"CACHE_TIME" => "36000000",
    				"CACHE_TYPE" => "A",
    				"CODE" => "",
    				"FILTER_BY_SITE" => "N",
    				"ID" => "",
    				"INITIALIZE_BY_GLOBAL_EVENT" => "",
            "INPUT_NAME" => $arParams['PERSONAL_BLOCK_DATA_LOCATION']['FIELD_NAME'],
    				"JS_CALLBACK" => "",
    				"JS_CONTROL_GLOBAL_ID" => "",
    				"PROVIDE_LINK_BY" => "code",
    				"SHOW_DEFAULT_LOCATIONS" => "Y",
    				"SUPPRESS_ERRORS" => "N"
    			)
    		);?>
      </div>
     
			<? foreach ($arParams['PERSONAL_BLOCK_DATA'] as $item): ?>
	      <div class="form-line">
	        <label><?= $item['NAME'] ?> *</label>
	        <input type="<?= $item['TYPE'] ?>" placeholder="<?= $item['NAME'] ?>" name="<?= $item['FIELD_NAME'] ?>" value="<?= $item['VALUE'] ?? '' ?>">
	      </div>
			<? endforeach; ?>

      <table class="price-total padding">
        <tr>
          <th colspan="2">Итого</th>
        </tr>
        <tr>
          <td class="title">Итог</td>
          <td class="js_itogo_price"><?= $arResult['ORDER_TOTAL_PRICE_FORMATED'] ?></td>
        </tr>
        <tr>
          <td class="title">Доставка</td>
          <td>
            <span class="color green js_delivery_price"><?= $arResult['DELIVERY_PRICE_FORMATED'] ?></span>
          </td>
        </tr>
        <tr>
          <td class="title">Стоимость заказа</td>
          <td>
            <span class="color blue js_products_price"><?= $arResult['ORDER_PRICE_FORMATED'] ?></span>
          </td>
        </tr>
      </table>
    </div>
    <div class="block-cell">

      <h1>Способ доставки</h1>

			<div class="form-line payment-block js_delivery_block">
				<? foreach($arResult['DELIVERY'] as $item): ?>
	        <div class="form-group payment-item">
	          <label>
	            <input id="ID_DELIVERY_ID_<?= $item['ID'] ?>" type="radio" class="circle" name="<?= $item['FIELD_NAME'] ?>" value="<?= $item['ID'] ?>"<?= $item['CHECKED'] == Y ? ' checked="checked"' : '' ?>>
	            <?= $item['NAME'] ?>
	            <div class="payment-text">
	              <?= $item['DESCRIPTION'] ?>
	            </div>
	          </label>
	        </div>
	      <? endforeach; ?>
      </div> 

			<div class="js_paysystem_block">
	      <h1>Способ оплаты</h1>

	      <div class="form-line payment-block">
	      	<? foreach($arResult['PAY_SYSTEM'] as $item): ?>
			      <div class="form-group payment-item">
			        <label>
			          <input id="ID_PAY_SYSTEM_ID_<?= $item['ID'] ?>" type="radio" class="circle" name="PAY_SYSTEM_ID" value="<?= $item['ID'] ?>"<?= $item['CHECKED'] == Y ? ' checked="checked"' : '' ?>>
			          <?= $item['NAME'] ?>
			          <div class="payment-text">
			            <?= $item['DESCRIPTION'] ?>
			          </div>
			        </label>
			      </div>
			    <? endforeach; ?>
	      </div>
	    </div>

      <div class="form-line">
        <input type="submit" value="Оформить заказ">
      </div>

    </div>
  </form>
</section>