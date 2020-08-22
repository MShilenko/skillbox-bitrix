<?

AddEventHandler("main", "OnEpilog", "SetSeoData");
function SetSeoData()
{
    global $APPLICATION; 

    $title = $APPLICATION->GetPageProperty('title');
    $SEO_CITY_PREPOSITIONAL = $APPLICATION->GetPageProperty('SEO_CITY_PREPOSITIONAL'); 
    $SEO_MIN_PRICE = $APPLICATION->GetPageProperty('SEO_MIN_PRICE'); 
    $SEO_MAX_PRICE = $APPLICATION->GetPageProperty('SEO_MAX_PRICE'); 
    $SEO_QUANTITY = $APPLICATION->GetPageProperty('SEO_QUANTITY'); 
    $SEO_IS_CATEGORY = $APPLICATION->GetPageProperty('SEO_IS_CATEGORY'); 

    if ($SEO_IS_CATEGORY == 'Y') {
        
        $seoTitle = str_replace([
            '##SEO_CITY_PREPOSITIONAL##',
            '##SEO_MIN_PRICE##',
            '##SEO_MAX_PRICE##',
            '##SEO_QUANTITY##',
        ], [
            $SEO_CITY_PREPOSITIONAL,
            $SEO_MIN_PRICE,
            $SEO_MAX_PRICE,
            $SEO_QUANTITY,
        ], $title);

        $APPLICATION->SetPageProperty("title", $seoTitle);
    }
}