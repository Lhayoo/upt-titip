<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Edit Anggota</h4>
            
            </div>
            <div class="card-body">
            <?php

use App\Core\Flash;

Flash::get_flash() ?>
                <form method="POST">
                    <div class="form-group">
                        <label>
                            Nama
                        </label>
                        <input type="text" class="form-control border ps-2" placeholder="Masukan Nama..." name="nama" value="<?= $data['detail']['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Username
                        </label>
                        <input type="text" class="form-control border ps-2" placeholder="Masukan username... " name="username" value="<?= $data['detail']['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label>
                            Password
                        </label>
                        <input type="text" class="form-control border ps-2" placeholder="Masukan Password..." name="password" value="<?= $data['detail']['password'] ?>">
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