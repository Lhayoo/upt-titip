<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

class orderModel extends Database
{
    public function get_OrderInfo()
    {
        $user_id = $_SESSION['user']['id'];
        $query = $this->connect->query("SELECT * from transaksi where `users_id`='$user_id' order by tanggal_order desc");
        return $query;
    }
    public function tambah($post)
    {
        $user_id = $_SESSION['user']['id'];
        $kode_order = $user_id . '_' . uniqid();
        $menu_id = htmlspecialchars($post['menu_id']);
        $harga = htmlspecialchars($post['harga_makanan']);
        $jumlah = htmlspecialchars($post['jumlah']);
        $subtotal = htmlspecialchars($post['subtotal']);
        $tanggal_order = date('Y-m-d');
        if (empty($user_id) && empty($kode_order) && empty($menu_id) && empty($harga) && empty($jumlah) && empty($subtotal) && empty($tanggal_order)) {
            Flash::set_flash('Invalid input', 'danger');
        } else {
            $insert = $this->connect->query("INSERT INTO `transaksi` (`kode_order`, `menu_id`, `harga_makanan`, `jumlah`, `subtotal`, `users_id`, `tanggal_order`, `status`) VALUES ('$kode_order', '$menu_id', '$harga', '$jumlah', '$subtotal', '$user_id', '$tanggal_order', 'aktif'");
        }
        if ($insert) {
            Flash::set_flash('Orderan Berhasil Di buat', 'success');
        } else {
            Flash::set_flash('Orderan Gagal Dibuat', 'danger');
        }
        Controller::redirect(BASE_URL . 'order/tambah');
    }
}