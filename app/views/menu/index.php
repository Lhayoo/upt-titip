<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div
                    class="bg-gradient-primary d-flex align-items-center justify-content-between px-2 shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Table Menu</h6>
                    <a href="<?= BASE_URL . 'menu/tambah' ?>" class="btn btn-info btn-sm">Tambahkan Menu</a>
                </div>
                <div class="mt-2">
                    <?php

          use App\Core\Flash;

          Flash::get_flash() ?>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <th class="align-middle text-center">No</th>
                            <th class="align-middle text-center">Nama Makanan</th>
                            <th class="align-middle text-center">Harga Makanan</th>
                            <th class="align-middle text-center">Foro Makanan</th>
                            <th class="align-middle text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
              $no = 1;
              while ($menu = $data['menu']->fetch_assoc()) :
              ?>
                            <tr>
                                <td class="align-middle text-center">
                                    <?= $no++ ?>
                                <td class="align-middle text-center">
                                    <?= $menu['nama_makanan'] ?>
                                </td>
                                <td class="align-middle text-center">Rp.
                                    <?= $menu['harga_makanan'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <img src="<?= BASE_URL . 'assets/foto_makanan/' . $menu['foto_makanan'] ?>" alt=""
                                        class="avatar avatar-sm rounded-circle">
                                </td>
                                <td class="align-middle text-center pt-3">
                                    <a href="<?= BASE_URL . 'menu/edit/' . $menu['id'] ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="<?= BASE_URL ?>menu/hapus" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus ?')" method="POST">
                                        <input type="hidden" name="id" value="<?= $menu['id'] ?>">
                                        <button class="btn btn-sm btn-danger text-white" type="submit">
                                            <span class="nav-link-text">Hapus</span>
                                        </button>
                                </td>
                                <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>