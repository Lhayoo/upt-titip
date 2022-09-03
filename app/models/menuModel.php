<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

class BukuModel extends Database
{
    public function getBuku()
    {
        return $this->connect->query('SELECT * FROM menu');
    }
    public function simpanMenu($post)
    {
        $nama = htmlspecialchars($post['nama']);
        $harga = htmlspecialchars($post['harga']);
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $x = explode('.', $foto);
        $ext = end($x);
        $deskripsi = $post['deskripsi'];
        if (!empty($nama) && !empty($harga) && !empty($deskripsi)) {
            if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                Flash::set_flash('Invalid ekstensi , hanya jpg,jpeg,png', 'danger');
                Controller::redirect(BASE_URL . 'buku/tambah');
            } else {
                $insert = $this->connect->query("INSERT INTO menu (nama,harga,foto,deskripsi) VALUES ('$nama','$harga','$foto','$deskripsi')");
                if ($insert) {
                    if (!is_dir('assets/cover')) {
                        mkdir('assets/cover');
                    }
                    if (is_dir('assets/cover')) {
                        move_uploaded_file($tmp, 'assets/cover/' . $foto);
                    }
                    Flash::set_flash('Berhasil Menambahkan buku', 'success');
                    Controller::redirect(BASE_URL . 'buku/tambah');
                }
            }
        } else {
            Flash::set_flash('Tidak boleh ada yang kosong', 'danger');
            Controller::redirect(BASE_URL . 'buku/tambah');
        }
    }
    public function hapusMenu($id)
    {
        $all = $this->connect->query("DELETE FROM menu WHERE id='$id'");
        if ($all) {
            Flash::set_flash('Berhasil Menghapus buku', 'success');
            Controller::redirect(BASE_URL . 'buku');
        }
    }
    public function get_menuById($id)
    {
        return $this->connect->query("SELECT * FROM menu WHERE id='$id'");
    }
    public function update($post, $id)
    {
        $nama = htmlspecialchars($post['nama']);
        $harga = htmlspecialchars($post['harga']);
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $x = explode('.', $foto);
        $ext = end($x);
        $deskripsi = $post['deskripsi'];
        if (!empty($nama) && !empty($harga) && !empty($deskripsi)) {
            if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                Flash::set_flash('Invalid ekstensi , hanya jpg,jpeg,png', 'danger');
                Controller::redirect(BASE_URL . 'buku/edit/' . $id);
            } else {
                $update = $this->connect->query("UPDATE menu SET nama='$nama',harga='$harga',foto='$foto',deskripsi='$deskripsi' WHERE id='$id'");
                if ($update) {
                    if (!is_dir('assets/cover')) {
                        mkdir('assets/cover');
                    }
                    if (is_dir('assets/cover')) {
                        move_uploaded_file($tmp, 'assets/cover/' . $foto);
                    }
                    Flash::set_flash('Berhasil Mengubah buku', 'success');
                    Controller::redirect(BASE_URL . 'buku');
                }
            }
        } else {
            Flash::set_flash('Tidak boleh ada yang kosong', 'danger');
            Controller::redirect(BASE_URL . 'buku/edit/' . $id);
        }
    }
}