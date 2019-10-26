<?php

function hitung($kembalian)
{

  $uang5000 = '5000';
  $uang10000 = '10000';
  $uang20000 = '20000';
  $uang50000 = '50000';
  $a1 = 0;
  $b1 = 0;
  $c1 = 0;
  $d1 = 0;

  $a = $kembalian % $uang50000;
  $a1 = $kembalian / $uang50000;
  $b = $a % $uang20000;
  $b1 = $a / $uang20000;
  $c = $b % $uang10000;
  $c1 = $b / $uang10000;
  $d = $c % $uang5000;
  $d1 = $c / $uang5000;

  echo "Jumlah Uang Kembalian Adalah : " . $kembalian;
  echo "<br>";
  echo "<br>";
  echo floor($a1) . " Lembar " . $uang50000;
  echo "<br>";
  echo floor($b1) . " Lembar " . $uang20000;
  echo "<br>";
  echo floor($c1) . " Lembar " . $uang10000;
  echo "<br>";
  echo floor($d1) . " Lembar " . $uang5000;
  echo "<br>";
  echo $d . ' untuk donasi';
}
function kembalian($blanjaan, $bayar)
{
  if ($blanjaan > 200000) {
    $cashback = $blanjaan * 10 / 100;
    $hasilCashBack = $blanjaan - $cashback;
    $kembalian = $bayar - $hasilCashBack;
    hitung($kembalian);
  } else {
    $kembalian = $bayar - $blanjaan;
    hitung($kembalian);
  }
}

if (isset($_POST['btn_kirim'])) {
  kembalian($_POST['blanjaan'], $_POST['uangbayar']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<form action="" method="post">
  <input type="text" name="blanjaan" placeholder="jumlah blanjaan">
  <input type="text" name="uangbayar" placeholder="jumlah uang bayar">
  <button type="submit" name="btn_kirim">kirim</button>
</form>

<body>

</body>

</html>