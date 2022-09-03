<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary d-flex align-items-center justify-content-between px-2 shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Table Peminjaman</h6>
                <a href="<?= BASE_URL.'peminjaman/tambah' ?>" class="btn btn-info btn-sm">Tambahkan Peminjam</a>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Buku</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Peminjam</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pinjam</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Kembali</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php while($peminjaman = $data['peminjaman']->fetch_assoc()): ?>
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">
                                <?= $peminjaman['judul'] ?>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs text-secondary mb-0"><?= $peminjaman['nama'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">
                            <?= $peminjaman['tanggal_pinjam'] ?>
                          </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-primary">
                            <?= $peminjaman['tanggal_kembali'] ?>
                          </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <?php if($peminjaman['status'] == 'pinjam'): ?>
                            <span class="badge badge-sm bg-gradient-info">
                                    <?= $peminjaman['status'] ?>
                            </span>
                            <?php elseif($peminjaman['status'] == 'kembali'): ?>
                            <span class="badge badge-sm bg-gradient-success">
                                    <?= $peminjaman['status'] ?>
                            </span>
                            <?php else: ?>
                              <span class="badge badge-sm bg-gradient-danger">
                                      <?= $peminjaman['status'] ?>
                              </span>
                          <?php endif ?>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="<?= BASE_URL ?>peminjaman/edit/<?= $peminjaman['id'] ?>" class="btn btn-info font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                          <form action="<?= BASE_URL ?>peminjaman/hapus" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ?')" method="POST">
                          <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id'] ?>">
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