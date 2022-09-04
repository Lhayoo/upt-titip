<?php

use App\Core\Flash;
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Tambahkan Menu</h4>

            </div>
            <div class="card-body">
                <?php Flash::get_flash() ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_makanan">Nama Makanan</label>
                        <input type="text" name="nama_makanan" id="nama_makanan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto_makanan">Foto Makanan</label>
                        <input type="file" name="foto_makanan" id="foto_makanan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
            </div>
        </div>
    </div>
</div>