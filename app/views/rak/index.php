<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary d-flex align-items-center justify-content-between px-2 shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Table anggota</h6>
              </div>
              <div class="mt-2">
                <?php
              use App\Core\Flash;
              Flash::get_flash() ?>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="px-2">
                <h4>Tambahkan rak</h4>
              <form action="<?php if(isset($_GET['edit_id'])): ?><?= BASE_URL ?>rak/update<?php else: ?><?= BASE_URL ?>rak/tambah<?php endif ?>" method="POST">
                <div class="form-group">
                <?php if(isset($_GET['edit_id'])): ?>
                  <input type="hidden" name="rak_id" value="<?= $data['edit']['id'] ?>">
                  <input type="text" class="form-control border ps-2" name="rak" placeholder="masukan Rak" value="<?= $data['edit']['rak'] ?>">
                  <?php else: ?>
                    <input type="text" class="form-control border ps-2" name="rak" placeholder="masukan Rak">
                    <?php endif ?>
                </div>
                <div class="form-group mt-2">
                  <?php if(isset($_GET['edit_id'])): ?>
                  <button class="btn btn-primary" type="submit">
                    Edit
                  </button>
                  <?php else: ?>
                    <button class="btn btn-primary" type="submit">
                      Simpan
                    </button>
                  <?php endif ?>
                </div>
              </form>
              </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rak</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Buku</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php while($rak = $data['rak']->fetch_assoc()): ?>
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">
                                <?= $rak['rak'] ?>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="badge badge-sm bg-gradient-primary">
                            <?= $rak['jumlah_buku'] ?> Buku
                          </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="<?= BASE_URL ?>rak&edit_id=<?= $rak['id'] ?>" class="btn btn-info font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                          <form action="<?= BASE_URL ?>rak/hapus" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ?')" method="POST">
                          <input type="hidden" name="rak_id" value="<?= $rak['id'] ?>">
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