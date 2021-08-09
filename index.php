<?php
  require 'src/Request.php';
  require 'src/City.php';
  require 'src/sortCities.php';
  require 'src/calculateScore.php';
  require 'src/sortScores.php';
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

  $scoreList = calculateScore([$listTemperature, $listWindSpeed, $listHumidity], $citiesList);
  $sortedScoreList = sortScores($scoreList);
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="utf-8">
  <title>Famoc - WebService Task</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="src/static/css/style.css">
</head>
<body>
  <h1>Weather Dashboard</h1>
  <table>
    <tr>
      <th>City Name</th>
      <th>Temperature</th>
      <th>Wind Speed</th>
      <th>Humidity</th>
      <th>Score</th>
    </tr>
<?php
  print('<span>' . date("H:i:s") . '</span>'); //current time
    for($i = 0; $i < count($sortedScoreList); $i++) {
      print('<tr><td>' . $sortedScoreList[$i][0] . '</td>'); //city name
      for($j = 0; $j < count($objectList); $j++) {
        if($sortedScoreList[$i][0] == $objectList[$j]["cityName"]) {
          print('<td>' . $objectList[$j]["temperature"] . '</td>'); //temperature
          print('<td>' . $objectList[$j]["windSpeed"] . '</td>'); //wind speed
          print('<td>' . $objectList[$j]["humidity"] . '</td>'); //humidity
          break;
        }
      }
      print('<td>' . $sortedScoreList[$i][1] . '</td></tr>'); //score
    }
?>
  </table>
</body>
</html>
