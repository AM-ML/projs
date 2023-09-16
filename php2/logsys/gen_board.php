<?php
$boardSize = 3;
for ($i = 0; $i < $boardSize; $i++) {
  echo '<div class="row">';
  for ($j = 0; $j < $boardSize; $j++) {
    echo '<div class="cell" onclick="makeMove(' . $i . ', ' . $j . ')"></div>';
  }
  echo '</div>';
}
?>
