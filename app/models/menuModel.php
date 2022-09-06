<?php

use App\Core\Controller;
use App\Core\Database;
use App\Core\Flash;

class menuModel extends Database
{
    public function getMenu()
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
                Controller::redirect(BASE_URL . 'menu/tambah');
            } else {
                $insert = $this->connect->query("INSERT INTO `menu` (`nama_makanan`, `harga_makanan`, `foto_makanan`, `deskripsi`) VALUES ('$nama', '$harga', '$foto', '$deskripsi');");
                if ($insert) {
                    if (!is_dir('assets/foto_makanan')) {
                        mkdir('assets/foto_makanan');
                    }
                    if (is_dir('assets/foto_makanan')) {
                        move_uploaded_file($tmp, 'assets/foto_makanan/' . $foto);
                    }
                    Flash::set_flash('Berhasil Menambahkan Menu', 'success');
                    Controller::redirect(BASE_URL . 'menu/tambah');
                }
            }
        } else {
            Flash::set_flash('Tidak boleh ada yang kosong', 'danger');
            Controller::redirect(BASE_URL . 'menu/tambah');
        }
    }
    public function hapusMenu($id)
    {
        $delete = $this->connect->query("DELETE FROM menu WHERE id='$id'");
        if ($delete) {
            Flash::set_flash('Berhasil Menghapus Menu', 'success');
            Controller::redirect(BASE_URL . 'menu');
        }
    }
    public function getMenuById($id)
    {
        return $this->connect->query("SELECT * FROM menu WHERE id='$id'")->fetch_assoc();
    }
    public function detail()
    {
        return $this->connect->query("SELECT * FROM menu");
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
            if ($_FILES['foto']['name'] != '') {
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    Flash::set_flash('Invalid ekstensi , hanya jpg,jpeg,png', 'danger');
                    Controller::redirect(BASE_URL . 'menu');
                } else {
                    $old_foto = $this->getMenuByID($id)['foto'];
                    if (file_exists('assets/foto_makanan/' . $old_foto)) {
                        unlink('assets/foto_makanan/' . $old_foto);
                    }
                    $update = $this->connect->query("UPDATE `menu` SET `nama_makanan` = '$nama', `harga_makanan` = '$harga', `foto_makanan` = '$foto', `deskripsi` = '$deskripsi' WHERE `menu`.`id` = '$id'");
                    if ($update) {
                        if (!is_dir('assets/foto_makanan')) {
                            mkdir('assets/foto_makanan');
                        }
                        if (is_dir('assets/foto_makanan')) {
                            move_uploaded_file($tmp, 'assets/foto_makanan/' . $foto);
                        }
                        Flash::set_flash('Berhasil mengubah menu', 'success');
                        Controller::redirect(BASE_URL . 'menu');
                    }
                }
            } else {
                $update = $this->connect->query("UPDATE `menu` SET `nama_makanan` = '$nama', `harga_makanan` = '$harga', `deskripsi` = '$deskripsi' WHERE `menu`.`id` = '$id'");
                if ($update) {
                    Flash::set_flash('Berhasil Mengedit menu', 'success');
                    Controller::redirect(BASE_URL . 'menu');
                }
            }
        } else {
            Flash::set_flash('Gagal mengubah menu', 'danger');
            Controller::redirect(BASE_URL . 'menu');
        }
    }
}