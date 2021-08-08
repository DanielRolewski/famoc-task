<?php
$config = require('config.php');
require 'src/Request.php';

$citiesList = $config['cities'];
$apiKey = $config['apiKey'];
$request = new Request();
?>
