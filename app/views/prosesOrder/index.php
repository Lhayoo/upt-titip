<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header bg-success">
                <h4 class="text-white">Proses Order</h4>
            </div>
            <div class="card-body">
                <?php

                use App\Core\Flash;

                Flash::get_flash() ?>
                <form method="POST" action="<?= BASE_URL ?>prosesOrder/orderComplete"
                    onsubmit="return confirm('Yakin ingin melakukan aksi ini ?')">
                    <div class="form-group">
                        <input type="text" name="kode_order" class="form-control border ps-2"
                            placeholder="Masukan Kode Order...">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">
                            Proses Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>