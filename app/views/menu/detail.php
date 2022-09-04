<div class="row">
    <div class="col-8 mx-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Detail Menu</h4>
            </div>
            <div class="card-body">
                <ul>
                    <li>Nama Makanan : <?= $data['detail']['nama_makanan'] ?></li>
                    <li>Harga : <?= $data['detail']['harga'] ?></li>
                    <li>Foto : <img src="<?= BASE_URL ?>assets/cover/<?= $data['detail']['foto_makanan'] ?>" alt="IMG" class="img-thumbnail"></li>
                    <li>Deskripsi : <?= $data['detail']['deskripsi'] ?> </li>
                </ul>
            </div>
        </div>
    </div>
</div>