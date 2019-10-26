<?php


require 'Books.php';
$books = new Books();

$id = $_POST['id'];

$result = $books->filter($id);
$data = [];
while ($row =  $result->fetch(PDO::FETCH_ASSOC)) {
  $data[] = $row;
}
echo json_encode($data);