<?php
use App\Core\Flash;
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Tambahkan Buku</h4>
               
            </div>
            <div class="card-body">
                <?php Flash::get_flash() ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control border ps-2" name="judul" placeholder="Ketikan Judul..." value="<?= $data['detail']['judul'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" class="form-control border ps-2" name="penulis" placeholder="Ketikan Penulis..." value="<?= $data['detail']['penulis'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input type="text" class="form-control border ps-2" name="pengarang" placeholder="Ketikan Pengarang..." value="<?= $data['detail']['pengarang'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" class="form-control border ps-2" name="penerbit" placeholder="Ketikan Penerbit..." value="<?= $data['detail']['penerbit'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Tahun terbit</label>
                        <input type="number" min="0" class="form-control border ps-2" name="tahun_terbit" placeholder="Ketikan Tahun Terbit..." value="<?= $data['detail']['tahun_terbit'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" min="0" name="stok" class="form-control border ps-2" placeholder="Ketikan Stok..." value="<?= $data['detail']['stok'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Pilih Rak</label>
                        <select class="form-control border" name="rak_id" value="<?= $data['detail']['rak_id'] ?>>
                            <option value="">Pilih Rak</option>
                            <?php while($rak = $data['rak']->fetch_assoc()): ?>
                                <option value="<?= $rak['id'] ?>"><?= $rak['rak'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <input type="file" name="cover" min="0" class="form-control border ps-2" >
                        <img src="<?= BASE_URL ?>assets/cover/<?= $data['detail']['cover'] ?>" alt="IMG" class="img-thumbnail">
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>