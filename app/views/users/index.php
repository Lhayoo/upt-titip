<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div
                    class="bg-gradient-primary d-flex align-items-center justify-content-between px-2 shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Table anggota</h6>
                    <a href="<?= BASE_URL . 'users/tambah' ?>" class="btn btn-info btn-sm">Tambahkan anggota</a>
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
                            <th class="align-middle text-center">Nama</th>
                            <th class="align-middle text-center">Username</th>
                            <th class="align-middle text-center">Role</th>
                            <th class="align-middle text-center">Aksi</th>
                        </thead>
                        <tbody>
                            <?php while ($user = $data['users']->fetch_assoc()) : ?>
                            <tr>
                                <td class="align-middle text-center">
                                    <?= $user['nama'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $user['username'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-sm bg-gradient-primary"><?= $user['role'] ?></span>
                                </td>
                                <td class="align-middle text-center pt-3">
                                    <a href="<?= BASE_URL . 'users/edit/' . $user['id'] ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= BASE_URL . 'users/hapus/' . $user['id'] ?>"
                                        class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>