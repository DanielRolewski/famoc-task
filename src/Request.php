<?php
class Request {
  public function makeUrl($apiKey, $city) {
    $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . $apiKey; //adding city and Api Key to url
    return $url;
  }
}
?>
