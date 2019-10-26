<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Data buku perpustakaan!</title>
</head>

<body>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Buku Perpustakaan</h1>
      <p class="lead">daftar buku perpustakaan DumbWays.</p>
    </div>
  </div>
  <section class="listBuku" id="listBuku">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="nama">Categori Name</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama kategori">
            </div>

            <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
          </form>
          <?php
          require 'PDO/Books.php';
          if (isset($_POST['btn_submit'])) {
            $categori = $_POST['nama'];

            $books = new Books();
            $books->createCategori($categori);
            echo '<script>alert("Data berhasil di tambahkan!")</script>';
            echo '<script>document.location.href = "index.php" </script>';
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="js/bootstrap.min.js">
  </script>
</body>

</html>