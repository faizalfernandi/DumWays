$(document).ready(function() {
    $('.kategori').click(function(e) {
        e.preventDefault();
        $('.list-book').html('');
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "PDO/filterRequest.php",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $.each(response, function(i, value) {
                    console.log(value.image);
                    $('.list-book').append(`
                    <div class="col-lg-3">
                      <div class="card">
                        <img src="img/` + value.image + `" style="height: 200px;width: 100%;" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">` + value.name + `</h5>
                          <p class="card-text">` + value.deskripsi + `.</p>
                        </div>
                        <div class="card-body">
                          <span class="font-weight-bold">Stok : ` + value.stok + `</span>
                        </div>
                        <div class="card-body">
                          <a href="#" class="card-link btn btn-warning text-white">Pinjam</a>
                          <a href="#" class="card-link btn btn-success">Kembalikan</a>
                        </div>
                      </div>
                    </div>
                   `);
                });
            }
        });
    });
});