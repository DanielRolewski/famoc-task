<?php
function sortScores($scoreList) {
  usort($scoreList, function($x, $y) {
    return $y[1] <=> $x[1];
  });
  return $scoreList;
}
?>
