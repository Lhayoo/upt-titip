<?php
require_once 'auto_load.php';
require_once 'config/constant.php';

use App\Core\App;
use App\Core\Database;

new Database();
$app = new App;