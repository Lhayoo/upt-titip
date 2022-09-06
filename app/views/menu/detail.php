<div class="row">
    <div class="col-8 mx-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Detail Menu</h4>
            </div>
            <div class="card-body">
                <ul>
                    <li>Nama Makanan : <?= $data['id']['nama_makanan'] ?></li>
                    <li>Harga : <?= $data['id']['harga_makanan'] ?></li>
                    <img src="<?= BASE_URL ?>assets/foto_makanan/<?= $data['id']['foto_makanan'] ?>" alt="IMG"
                        class="img-thumbnail mb-3">
                    <li>Deskripsi : <?= $data['id']['deskripsi'] ?> </li>
                </ul>
            </div>
            <div class="card-footer bg-primary">
                <a href="<?= BASE_URL . 'menu/index' ?>" class=" btn btn-warning text-center">kembali</a>
            </div>
        </div>
    </div>
</div>