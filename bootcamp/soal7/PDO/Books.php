<?php

class Books
{

  public function __construct()
  {
    $this->db = new PDO("mysql:host=localhost;dbname=db_perpus", "root", "");
  }

  public function readAll()
  {
    try {
      $query = "SELECT * FROM books INNER JOIN categories ON books.category_id = categories.id";
      $stmt = $this->db->prepare($query);
      $stmt->execute();

      return $stmt;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function createBook($categori, $nama, $stok, $desc, $imgName)
  {

    try {
      $query = "INSERT INTO books VALUES ('','$nama', '$stok', '$imgName', '$desc', '$categori')";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function readCategory()
  {
    try {
      $query = "SELECT * FROM categories";
      $stmt = $this->db->prepare($query);
      $stmt->execute();

      return $stmt;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function createCategori($categori)
  {

    try {
      $query = "INSERT INTO categories VALUES ('','$categori')";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
  public function filter($id)
  {

    try {
      $query = "SELECT * FROM books WHERE category_id = '$id'";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
}