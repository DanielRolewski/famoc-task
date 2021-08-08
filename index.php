<?php
require 'src/Request.php';
require 'src/City.php';
require 'src/sortCities.php';
$config = require('config.php');

$citiesList = $config['cities'];
$apiKey = $config['apiKey'];

$request = new Request();
$city = new City();
$objectList = [];

for($i = 0; $i < count($citiesList); $i++) {
  $url = $request->makeUrl($apiKey, $citiesList[$i]);
  $response = $request->getResponse($url);
  $city = new City();
  array_push($objectList, $city->getData(json_decode($response)));
}

$listTemperature = sortCities($objectList, "temperature"); //list sorted by temperature
$listWindSpeed = sortCities($objectList, "windSpeed"); //list sorted by wind speed
$listHumidity = sortCities($objectList, "humidity"); //list sorted by humidity

?>
