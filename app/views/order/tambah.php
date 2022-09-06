<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Tambahkan Orderan</h4>

            </div>
            <div class="card-body">
                <?php

                use App\Core\Flash;

                Flash::get_flash() ?>
                <form method="POST">
                    <div class="form-group">
                        <label>Pilih Menu</label>
                        <select class="form-control border p-2" name="menu_id" id="menu_id" onchange="pilih_menu()">
                            <option value="">Pilih Menu</option>
                            <?php while ($menu = $data['menu']->fetch_assoc()) : ?>
                            <option value="<?= $menu['id'] ?>"><?= $menu['nama_makanan'] ?></option>
                            var_dump($menu);
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">
                            Harga
                        </label>
                        <input type="text" class="form-control border ps-2" placeholder="harga..." name="harga"
                            id="harga" id="harga">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">
                            Jumlah
                        </label>
                        <input type="text" class="form-control border ps-2" placeholder="Jumlah..." name="jumlah"
                            id="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="subtotal">
                            Subtotal
                        </label>
                        <input type="text" class="form-control border ps-2" placeholder="subtotal..." name="subtotal"
                            id="subtotal">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= BASE_URL . 'order/index' ?>" class=" btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script>
function pilih_menu() {
    var menu_id = document.getElementById('menu_id').value;
    $.ajax({
        url: '<?php // BASE_URL . '../models/orderModels' 
                ?>',
        data: "menu_id=" + menu_id,
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            document.getElementById('harga').value = data.harga;
        }
    });
}
$(function() {
    $(document).ready(function() {
        $('#id_menu').select2();
    })
}); -->