<div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">
                  Buku Yang di pinjam
                </p>
                <h4 class="mb-0">
                  <?= $data['info']['total_pinjam'] ?>
                </h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">
                    Buku yang sedang di pinjam
                </p>
                <h4 class="mb-0">  <?= $data['info']['total_masih_di_pinjam'] ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">
                    Buku yang sudah di kembalikan
                </p>
                <h4 class="mb-0">
                <?= $data['info']['total_kembali'] ?>
                </h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Denda</p>
                <h4 class="mb-0">
                  Rp.<?= ($data['info']['total_denda']['total_denda']) ? $data['info']['total_denda']['total_denda']:0  ?>
                </h4>
              </div>
            </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-lg-12 mx-auto">
          <div class="card">
            <div class="card-header bg-primary">
              <h4 class="text-white">Table Riwayat 5 Terakhir Peminjaman</h4>
            </div>
            <div class="card-body">
            <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="align-middle text-center">Kode Pinjam</th>
                    <th class="align-middle text-center">Judul</th>
                    <th class="align-middle text-center">Tanggal Pinjam</th>
                    <th class="align-middle text-center">Tanggal Kembali</th>
                    <th class="align-middle text-center">Status</th>
                    <th class="align-middle text-center">Telat</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $c = $data['riwayat'];
                  
                    while($s = $c->fetch_assoc()):
                  ?>
                  <tr>
                    <td class="align-middle text-center"><?= $s['kode_transaksi'] ?></td>
                    <td class="align-middle text-center"><?= $s['judul'] ?></td>
                    <td class="align-middle text-center">
                      <span class="badge badge-sm bg-gradient-success">
                        <?= $s['tanggal_pinjam'] ?>
                      </span>
                    </td>
                    <td class="align-middle text-center ">  <span class="badge badge-sm bg-gradient-primary">
                        <?= $s['tanggal_kembali'] ?>
                      </span>
                    </td>
                    <td class="align-middle text-center ">
                      <?php if($s['status'] == 'pinjam'): ?>
                        <span class="badge badge-sm bg-gradient-info">
                                <?= $s['status'] ?>
                        </span>
                        <?php elseif($s['status'] == 'kembali'): ?>
                        <span class="badge badge-sm bg-gradient-success">
                                <?= $s['status'] ?>
                        </span>
                        <?php else: ?>
                          <span class="badge badge-sm bg-gradient-danger">
                                  <?= $s['status'] ?>
                          </span>
                      <?php endif ?>
                    </td>
                    <td class="align-middle text-center">
                      <span class="badge badge-sm bg-gradient-info"><?= $s['status'] == 'telat' ? $s['telat_concat'] : "0 hari" ?></span>
                    </td>
                  </tr>
                  <?php endwhile ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-lg-12 mx-auto">
          <div class="card">
            <div class="card-header bg-primary">
              <h4 class="text-white">Table Denda </h4>
            </div>
            <div class="card-body">
            <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="align-middle">NO</th>
                    <th class="align-middle">Kode Pinjam</th>
                    <th class="align-middle">Denda</th>
                    <th class="align-middle">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $c = $data['denda'];
                  $no = 1;
                    while($s = $c->fetch_assoc()):
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td class="align-middle"><?= $s['kode_transaksi'] ?></td>
                    <td class="align-middle ">
                        <span class="badge badge-sm bg-gradient-danger">
                                Rp.<?= $s['denda'] ?>
                        </span>
                    </td class="align-middle">
                    <td class="align-middle">
                    <span class="badge badge-sm bg-gradient-success">  
                    <?= $s['tanggal'] ?>
                    </span>
                  </td>
                  </tr>
                  <?php endwhile ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>