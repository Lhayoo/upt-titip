<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary d-flex align-items-center justify-content-between px-2 shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Table anggota</h6>
                <a href="<?= BASE_URL.'users/tambah' ?>" class="btn btn-info btn-sm">Tambahkan anggota</a>
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
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php while($user = $data['anggota']->fetch_assoc()): ?>
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">
                                <?= $user['nama'] ?>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs text-secondary mb-0">
                            <b><?= $user['username'] ?></b>
                          </p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-primary">
                            <?= $user['role'] ?>
                          </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="<?= BASE_URL ?>users/edit/<?= $user['id'] ?>" class="btn btn-info font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                          <form action="<?= BASE_URL ?>users/hapus" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ?')" method="POST">
                          <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                          <button class="btn btn-danger text-white" type="submit">
                            <span class="nav-link-text">Hapus</span>
                          </button>
                          </form>
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