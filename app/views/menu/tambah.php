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
                    <div class="form-group pb-3">
                        <label for="nama">Nama Makanan</label>
                        <input type="text" class="form-control border ps-2" name="nama" placeholder="Masuakan Nama Makanan..." id="nama">
                    </div>
                    <div class="form-group pb-3">
                        <label for="harga">Harga Makanan</label>
                        <input type="text" class="form-control border ps-2" name="harga" placeholder="Masukan Harga ..." id="harga">
                    </div>
                    <div class="form-group pb-3">
                        <label>Foto Maakanan</label>
                        <input type="file" name="foto" min="0" class="form-control border ps-2">
                    </div>
                    <div class="form-group pb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text-area" class="form-control border ps-2" name="deskripsi" placeholder="Masukan Deskripsi Product" id="deskripsi"></textarea>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= BASE_URL . 'menu/index' ?>" class=" btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>