<div class="row">
    <div class="col-8 mx-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Detail Buku</h4>
            </div>
            <div class="card-body">
                <ul>
                    <li>Kode Buku : <?= $data['detail']['kode_buku'] ?></li>
                    <li>Judul : <?= $data['detail']['judul'] ?></li>
                    <li>Penulis : <?= $data['detail']['penulis'] ?></li>
                    <li>Tahun Terbit : <?= $data['detail']['tahun_terbit'] ?></li>
                    <li>Stok : <?= $data['detail']['stok'] ?></li>
                    <li>Cover: <img src="<?= BASE_URL ?>assets/cover/<?= $data['detail']['cover'] ?>" alt="IMG" class="img-thumbnail"></li>
                </ul>
            </div>
        </div>
    </div>
</div>