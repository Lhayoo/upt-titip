<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div
                    class="bg-gradient-primary d-flex align-items-center justify-content-between px-2 shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Table Orderan</h6>
                </div>
                <div class="mt-2">
                    <?php

                    use App\Core\Flash;

                    Flash::get_flash() ?>
                </div>
            </div>
            <div class="card-body px-0 pb-2 m-4">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <th class="align-middle text-center">No</th>
                            <th class="align-middle text-center">Kode Order</th>
                            <th class="align-middle text-center">Tanggal Order</th>
                            <th class="align-middle text-center">Menu</th>
                            <th class="align-middle text-center">Jumlah</th>
                            <th class="align-middle text-center">Subtotal</th>
                            <th class="align-middle text-center">Status</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            while ($order = $data['orderInfo']->fetch_assoc()) : ?>
                            <tr>
                                <td class="align-middle text-center">
                                    <?= $no++ ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $order['kode_order'] ?>
                                <td class="align-middle text-center">
                                    <?= $order['tanggal_order'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $order['nama_makanan'] ?>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $order['jumlah'] ?>
                                </td>
                                <td class="align-middle text-center">
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
</div>