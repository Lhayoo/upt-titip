<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

class orderModel extends Database
{
    public function get_OrderInfo()
    {
        $user_id = $_SESSION['user']['id'];
        $query = $this->connect->query("SELECT `transaksi`.`kode_order`,`transaksi`.`tanggal_order`,`menu`.`nama_makanan`,`transaksi`.`jumlah`,`transaksi`.`subtotal`,`transaksi`.`status` from transaksi,menu WHERE `transaksi`.`menu_id`=`menu`.`id` AND `users_id`='$user_id' AND `status`='aktif ' order by tanggal_order desc");
        return $query;
    }
    public function tambah($post)
    {
        $user_id = $_SESSION['user']['id'];
        $kode_order = 'ORD' . '-' . uniqid();
        $menu_id = htmlspecialchars($post['menu_id']);
        $harga = htmlspecialchars($post['harga']);
        $jumlah = htmlspecialchars($post['jumlah']);
        $subtotal = htmlspecialchars($post['subtotal']);
        $tanggal_order = date('Y-m-d');
        if (empty($user_id) || empty($kode_order) || empty($menu_id) || empty($harga) || empty($jumlah) || empty($subtotal) || empty($tanggal_order)) {
            Flash::set_flash('Invalid input', 'danger');
        } else {
            $insert = $this->connect->query("INSERT INTO `transaksi` (`kode_order`, `menu_id`, `harga_makanan`, `jumlah`, `subtotal`, `users_id`, `tanggal_order`, `status`) VALUES ('$kode_order', '$menu_id', '$harga', '$jumlah', '$subtotal', '$user_id', '$tanggal_order', 'aktif');");
            if ($insert) {
                Flash::set_flash('Order berhasil', 'success');
            } else {
                Flash::set_flash('Orderan gagal', 'danger');
            }
        }
        Controller::redirect(BASE_URL . 'order/tambah');
    }

    public function get_menu()
    {
        $query = $this->connect->query("SELECT * from menu");
        return $query;
    }
}