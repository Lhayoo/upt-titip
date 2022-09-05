<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">weekend</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">
                        Total Orderan
                    </p>
                    <h4 class="mb-0">
                        <?= $data['info']['total_order'] ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">
                        Orderan Aktif
                    </p>
                    <h4 class="mb-0"> <?= $data['info']['orderan_aktif'] ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">
                        Orderan Selesai
                    </p>
                    <h4 class="mb-0">
                        <?= $data['info']['orderan_selesai'] ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Table Riwayat Order</h4>
                </div>
                <div class="card-body">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">No</th>
                                <th class="align-middle text-center">Kode Order</th>
                                <th class="align-middle text-center">Tanggal Order</th>
                                <th class="align-middle text-center">Menu</th>
                                <th class="align-middle text-center">Jumlah</th>
                                <th class="align-middle text-center">Subtotal</th>
                                <th class="align-middle text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php while ($order = $data['riwayat']->fetch_assoc()) : ?>
                            <tr>
                                <td class="align-middle text-center">
                                    <?= $no++ ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $order['kode_order'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $order['tanggal_order'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $order['nama_makanan'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $order['jumlah'] ?>
                                </td>
                                <td class="align-middle text-center">Rp.
                                    <?= $order['subtotal'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?php if ($order['status'] == 'aktif') : ?>
                                    <span class="badge badge-sm bg-gradient-warning"><?= $order['status'] ?></span>
                                    <?php elseif ($order['status'] == 'done') : ?>
                                    <span class="badge badge-sm bg-gradient-success"><?= $order['status'] ?></span>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>