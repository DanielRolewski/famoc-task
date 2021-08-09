<?php
function calculateScore($weatherList, $citiesList) {
  $scoreList = [];
  for($i = 0; $i < count($citiesList); $i++) {
    $score = 0;
    $parameterType = 0;
    foreach($weatherList as $element) {
      $rankPosition = 0;
      foreach($element as $cityName) {
        if($cityName["cityName"] == $citiesList[$i]) {
          switch($parameterType) {
            case 0:
              $score += ((100 - 10 * $rankPosition) * 0.6);
              break;
            case 1:
              $score += ((100 - 10 * $rankPosition) * 0.3);
              break;
            case 2:
              $score += ((100 - 10 * $rankPosition) * 0.1);
              break;
            default:
              print("Error!");
          }
        }
        $rankPosition++;
      }
      $parameterType++;
    }
    array_push($scoreList, [$citiesList[$i], $score]);
  }
  return $scoreList;
}
?>
