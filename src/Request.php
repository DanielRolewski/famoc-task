<?php
class Request {
  public function makeUrl($apiKey, $city) {
    $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . $apiKey; //adding city and Api Key to url
    return $url;
  }

  public function getResponse($url) {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //return the transfer as a string
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); //curl HTTP authentication method

    $result = curl_exec($curl);

    if(!$result) {
      die('Error!'); //will throw error when connection is broken or if it is not authorized
    }

    curl_close($curl);
    return $result;
  }
}
?>
