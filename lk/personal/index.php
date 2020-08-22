<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle(""); ?><?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"skillbox-lk-personal", 
	array(
		"CHECK_RIGHTS" => "N",
		"SEND_INFO" => "N",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array(
		),
		"USER_PROPERTY_NAME" => "",
		"COMPONENT_TEMPLATE" => "skillbox-lk-personal"
	),
	false
);?><? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>