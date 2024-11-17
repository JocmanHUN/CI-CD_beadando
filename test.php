<?php

require_once 'functions.php';

$array = [5, 3, 8, 4, 2];
echo "Eredeti tömb: " . implode(", ", $array) . PHP_EOL;

$sortedArray = cocktailShakerSort($array);
echo "Rendezett tömb: " . implode(", ", $sortedArray) . PHP_EOL;
