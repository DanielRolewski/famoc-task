<?php
function sortCities($citiesList, $index) {
  switch($index) {
    case "temperature":
      usort($citiesList, function($x, $y) {
        return $x["temperature"] > $y["temperature"] ? -1 : 1;
      });
      break;
    case "humidity":
      usort($citiesList, function($x, $y) {
        return $x["humidity"] > $y["humidity"] ? -1 : 1;
      });
      break;
    case "windSpeed":
      usort($citiesList, function($x, $y) {
        return $x["windSpeed"] > $y["windSpeed"] ? -1 : 1;
      });
      break;
    default:
      print("Please insert correct parameter!");
  }
  return $citiesList;
}
?>
