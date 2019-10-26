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
        <div class="col-lg-2">
          <a href="tambah.php" class="card-link btn btn-success text-white">+ Tambah</a>
        </div>
        <div class="col-lg-3">
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <?php
              require 'PDO/Books.php';
              $books = new Books();
              $stmt = $books->readCategory();
              while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
              <a class="dropdown-item kategori" href="#" data-id="<?= $data['id'] ?>"><?= $data['category_name'] ?></a>
              <?php } ?>
              <a class="dropdown-item" href="tambahKategori.php">+ Categories</a>
            </div>
          </div>
        </div>
        <div class="col-lg-12 mt-5">
          <h5 class="mb-3">List Buku</h5>
          <div class="row list-book">
            <?php
            $books = new Books();
            $stmt = $books->readAll();
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
              ?>
            <div class="col-lg-3">
              <div class="card">
                <img src="img/<?= $data['image'] ?>" style="height: 200px;width: 100%;" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $data['name'] ?></h5>
                  <p class="card-text"><?= $data['deskripsi'] ?>.</p>
                </div>
                <div class="card-body">
                  <span class="font-weight-bold">Stok : <?= $data['stok'] ?></span>
                </div>
                <div class="card-body">
                  <?php if ($data['stok'] == 0) : ?>
                  <a href="#" class="card-link btn btn-warning text-white disabled">Pinjam</a>
                  <?php else : ?>
                  <a href="#" class="card-link btn btn-warning text-white">Pinjam</a>
                  <?php endif; ?>
                  <a href="#" class="card-link btn btn-success">Kembalikan</a>
                </div>
              </div>
            </div>
            <?php }; ?>
          </div>
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
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>