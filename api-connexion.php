<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('dump.php');
include('.env');

if (empty($_POST["iata"]) || empty($_POST["icao"])) { 
    header('Location: '.BASE_URL);
    exit;
}

function trim_value(&$value) { 
    $value = trim($value); 
}

array_walk($_POST, 'trim_value');

$iata = $_POST["iata"];
$icao = $_POST["icao"];


$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://airport-info.p.rapidapi.com/airport?iata=".$iata."&icao=".$icao,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: airport-info.p.rapidapi.com",
		"x-rapidapi-key:".API_KEY  // Here my API KEY
	],
]);

$response = json_decode(curl_exec($curl));

$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {

    $_SESSION['response'] = $response;
    header('Location: '.BASE_URL);
    exit;

}

