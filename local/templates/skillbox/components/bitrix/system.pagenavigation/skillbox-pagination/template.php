<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<? if($arResult['NavPageCount'] > 1): ?>
	<section class="pagination-block">
		<div class="pagination-page">
			<? for ($i = 1; $i <= $arResult['NavPageCount']; $i++): ?>
		  	<a href="<?= $arResult['sUrlPathParams'] ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $i ?>" class="key<?= $arResult['NavPageNomer'] == $i ? ' active' : '' ?>"><?= $i ?></a>
			<? endfor; ?>
		</div>
		<? if ($arResult['NavPageNomer'] + 1 <= $arResult["nEndPage"]): ?>
			<a href="<?= $arResult['sUrlPathParams'] ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult['NavPageNomer'] + 1 ?>" class="key">Следующая</a>
		<? endif; ?>

		<span class="pagination-text">Показано <?= $arResult['NavFirstRecordShow'] ?>-<?= $arResult['NavLastRecordShow'] ?> из <?= $arResult['NavRecordCount'] ?> результатов</span>
	</section>
<? endif; ?>