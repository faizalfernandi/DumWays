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
              <label for="categori">Categories</label>
              <select class="form-control" name="cat" id="categori">
                <?php
                require 'PDO/Books.php';
                $books = new Books();
                $stmt = $books->readCategory();
                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) :
                  ?>
                <option value="<?= $data['id'] ?>"><?= $data['category_name'] ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea type="text" name="desc" class="form-control" id="deskripsi">
        </textarea>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="inputGroupFile01"
                  aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
            <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
          </form>
          <?php
          if (isset($_POST['btn_submit'])) {
            $categori = $_POST['cat'];
            $nama = $_POST['nama'];
            $stok = $_POST['stok'];
            $desc = $_POST['desc'];
            $imgName = $_FILES['img']['name'];
            $tmpName = $_FILES['img']['tmp_name'];

            $books = new Books();
            $books->createBook($categori, $nama, $stok, $desc, $imgName);
            move_uploaded_file($tmpName, 'img/' . $imgName);
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