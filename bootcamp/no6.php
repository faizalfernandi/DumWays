<?php

$array = [
  ['a', 'b', 's', 'r'],
  ['a', 'g', 'w', 't', 'z', 'j', 'y'],
  ['b', 'a', 'k', 'r', 'd', 'h']
];

sort($array);
foreach ($array as $data) {
  sort($data);
  foreach ($data as $value) {
    echo '[' . $value . ']';
  }

  echo "<br>";
}