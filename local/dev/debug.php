<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
// $soap = (new \Skillbox\SimpleSoap('http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL'))->getSOAPClient();
// vd($soap->__getFunctions());
// vd($soap->GetCityForecastByZIP("23454"));

// echo '-----------------------------------------------------------------------------' . PHP_EOL;

// $proudctsImport = new \Skillbox\SimpleProductsImport('data.xml');
// $deb = $proudctsImport->deb();
// vd($proudctsImport->run());

// print_r((new \Skillbox\SimpleLocations('Иваново', 'sa92121'))->run());
// $result = new \Skillbox\SimpleLocations('Москва', 'cascascas');
// var_dump($result->getDadataLocation());

// function addLocationsData(string $file): string
// {
//     $result = ''; 

//     if (($handle = fopen($file, "r")) !== FALSE) {
//         while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
//             $row++;
//             $result .= (new \Skillbox\SimpleLocations($data[0], $data[1]))->run();
//         }
//         fclose($handle);
//     }

//     return $result;
// }

//print_r(addLocationsData($_SERVER['DOCUMENT_ROOT'] . '/local/locations_data/delivery1.csv'));
//print_r(addLocationsData($_SERVER['DOCUMENT_ROOT'] . '/local/locations_data/delivery2.csv'));

//print_r(\Skillbox\SimpleLocations::getCity($_SERVER['REMOTE_ADDR']));


phpinfo();