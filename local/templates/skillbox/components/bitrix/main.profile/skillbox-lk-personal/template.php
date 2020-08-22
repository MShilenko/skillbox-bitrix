<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="bx-auth-profile">

	<h1>Профиль пользователя</h1>

	<?ShowError($arResult["strProfileError"]);?>
	<?
	if ($arResult['DATA_SAVED'] == 'Y')
		ShowNote(GetMessage('PROFILE_DATA_SAVED'));
	?>

	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>">
		<?=$arResult["BX_SESSION_CHECK"]?>
		<input type="hidden" name="lang" value="<?=LANG?>" />
		<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
		<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />

		<p><?=GetMessage('NAME')?> <input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" /></p>
		<p><?=GetMessage('LAST_NAME')?> <input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" /></p>
		<p><?=GetMessage('SECOND_NAME')?> <input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" /></p>

		<p><input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">&nbsp;&nbsp;<input type="reset" value="<?=GetMessage('MAIN_RESET');?>"></p>
	</form>
</div>