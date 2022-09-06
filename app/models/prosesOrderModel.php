<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

class prosesOrderModel extends Database
{
    public function done($post)
    {
        if (empty($post['kode_order'])) {
            Flash::set_flash('invalid input', 'danger');
        } else {
            $kode = htmlspecialchars($post['kode_order']);
            $check = $this->connect->query("SELECT kode_order from transaksi where `kode_order`='$kode'")->num_rows;
            if (!$check) {
                Flash::set_flash('Invalid kode', 'danger');
            } else {
                $update = $this->connect->query("UPDATE transaksi set `status`='done' where `kode_order`='$kode'");
            }
            if ($update) {
                Flash::set_flash('Orderan berhasil diproses', 'success');
            } else {
                Flash::set_flash('Orderan gagal diproses', 'danger');
            }
        }
        Controller::redirect(BASE_URL . 'prosesOrder');
    }
}