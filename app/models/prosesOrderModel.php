<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

class prosesOrderModel extends Database
{
    public function aktif($post)
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
                Flash::set_flash('Transaksi berhasil', 'success');
            } else {
                Flash::set_flash('SERVER ERROR', 'danger');
            }
        }
        Controller::redirect(BASE_URL . 'prosesOrder');
    }
}