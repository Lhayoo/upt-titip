<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Tambahkan Peminjaman</h4>
            
            </div>
            <div class="card-body">
            <?php

use App\Core\Flash;

Flash::get_flash() ?>
                <form method="POST">
                    <div class="form-group">
                        <label>
                            Kode buku
                        </label>
                        <input type="text" class="form-control border ps-2" placeholder="Masukan kode buku..." name="kode_buku">
                    </div>
                    <div class="form-group">
                        <label>
                            Masukan kode anggota / username anggota
                        </label>
                        <input type="text" class="form-control border ps-2" placeholder="Masukan kode anggota..." name="kode_anggota">
                    </div>
                    <div class="form-group">
                        <label>
                            Tanggal pinjam
                        </label>
                        <input type="date" class="form-control border ps-2" placeholder="Masukan kode buku..." name="tanggal_pinjam">
                    </div>
                    <div class="form-group">
                        <label>
                            Tanggal Kembali
                        </label>
                        <input type="date" class="form-control border ps-2" placeholder="Masukan kode buku..." name="tanggal_kembali">
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