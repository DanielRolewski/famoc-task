<?php
class City {  //create object with all required informations about weather
  private string $cityName;
  private float $windSpeed;
  private float $temperature;
  private int $humidity;

  public function getData($response) {
    $this->cityName = $response->name;
    $this->windSpeed = $response->wind->speed;
    $this->temperature = $response->main->temp;
    $this->humidity = $response->main->humidity;

    return array(
      'cityName' => $this->cityName,
      'windSpeed' => $this->windSpeed,
      'temperature' => $this->temperature,
      'humidity' => $this->humidity
    );
  }
}
?>
