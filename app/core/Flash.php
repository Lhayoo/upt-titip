<?php

namespace App\Core;

class Flash
{
    public static function set_flash($pesan, $tipe): void
    {
        $_SESSION['alert'] = [
            'tipe' => $tipe,
            'pesan' => $pesan
        ];
    }
    public static function get_flash()
    {
        if (isset($_SESSION['alert'])) {
            if ($_SESSION['alert']['tipe'] == 'success') {
                echo '<div class="alert alert-success text-white">' . $_SESSION['alert']['pesan'] . '</div>';
            } else {
                echo '<div class="alert alert-danger text-white">' . $_SESSION['alert']['pesan'] . '</div>';
            }
            unset($_SESSION['alert']);
        }
    }
}