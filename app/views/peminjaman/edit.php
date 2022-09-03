<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Edit Peminjaman</h4>
            
            </div>
            <div class="card-body">
            <?php

use App\Core\Flash;

Flash::get_flash() ?>
                <form method="POST">
                    <div class="form-group">
                        <label>
                            Tanggal pinjam
                        </label>
                        <input type="date" class="form-control border ps-2" placeholder="Masukan kode buku..." name="tanggal_pinjam" value="<?= $data['detail']['tanggal_pinjam'] ?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Tanggal Kembali
                        </label>
                        <input type="date" class="form-control border ps-2" placeholder="Masukan kode buku..." name="tanggal_kembali" value="<?= $data['detail']['tanggal_kembali'] ?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Status
                        </label>
                        <select name="status" class="form-control border ps-2">
                            <option value="<?= $data['detail']['status'] ?>"><?= $data['detail']['status'] ?></option>
                            <option value="pinjam">Pinjam</option>
                            <option value="kembali">Kembali</option>
                        </select>
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