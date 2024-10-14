<?php

$x = 1;
$y = 2;
echo "x = $x, y = $y <br/>";

//логика
$x = $x ^ $y;
$y = $x ^ $y;
$x = $x ^ $y;

echo "x = $x, y = $y";