<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
  <? foreach($arResult["HIDDEN"] as $arItem): ?>
    <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
  <? endforeach; ?>
  <input type="hidden" name="set_filter" value="Показать" />
  <div class="aside-block">
    <h1>Фильтр по цене</h1>
    <div class="price-range">
      <div id="range"></div>
      <input type="text" name="<?= $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["CONTROL_ID"] ?>" id="min-price" value="<?= $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] ?? $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["VALUE"] ?>" data-min="<?= $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] ?? $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["VALUE"] ?>">
      <input type="text" name="<?= $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["CONTROL_ID"] ?>" id="max-price" value="<?= $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"] ?? $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["VALUE"] ?>" data-max="<?= $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"] ?? $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["VALUE"] ?>">

      <div class="info">
        <p>Выбранный диапозон:</p>
        <div class="info-price">
          ЦЕНА:
          <span class="min-price"><span><?= $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] ?? $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["VALUE"] ?></span> р.</span> - <span class="max-price"><span><?= $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"] ?? $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["VALUE"] ?></span> р.</span>
          <span class="ui-delete"> </span>
        </div>
      </div>
      <input type="submit" value="Показать" class="small">
    </div>

  </div>
  <? foreach ($arResult["ITEMS"] as $arItem): ?>
  	<? if (!empty($arItem['VALUES'])): ?>
		  <div class="aside-block">
		    <h1><?= $arItem['NAME'] ?></h1>
		    <? foreach ($arItem['VALUES'] as $value): ?>
			    <div class="aside-line">
			      <label for="check">
			        <input name="<?= $value['CONTROL_ID'] ?>" type="checkbox" value="<?= $value['HTML_VALUE'] ?>"<?= $value['CHECKED'] ? ' checked' : '' ?>>
			        <?= $value['VALUE'] ?>
			        <span><?= $value['ELEMENT_COUNT'] ?></span>
			      </label>
			    </div>
			  <? endforeach; ?>
		  </div>
		<? endif; ?>
	<? endforeach; ?>
	<input type="submit" value="Показать" class="small">
</form>