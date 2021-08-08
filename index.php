<?php
$config = require('config.php');
require 'src/Request.php';
require 'src/City.php';

$citiesList = $config['cities'];
$apiKey = $config['apiKey'];

$request = new Request();
$objectList = [];

for($i = 0; $i < count($citiesList); $i++) {
  $url = $request -> makeUrl($apiKey, $citiesList[$i]);
  $response = $request -> getResponse($url);
  array_push($objectList, json_decode($response));
}

$city = new City();
?>
