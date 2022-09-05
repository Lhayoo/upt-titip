<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= BASE_URL ?>">
            <h4 class="text-center text-white">
                UPT<span class="m-2">Titip</span>
            </h4>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <?php if ($_SESSION['user']['role'] === 'anggota') : ?>
            <li class="nav-item ps-3 text-white text-sm mb-2">
                Selamat datang , <?= $_SESSION['user']['nama'] ?>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if ($data['active'] == 'anggota') : ?> active bg-gradient-primary <?php endif ?> "
                    href="<?= BASE_URL . 'anggota' ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if ($data['active'] == 'order') : ?> active bg-gradient-primary <?php endif ?> "
                    href="<?= BASE_URL ?>order/index">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if ($data['active'] == 'menuOrder') : ?> active bg-gradient-primary <?php endif ?>"
                    href="<?= BASE_URL ?>menuOrder">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Menu</span>
                </a>
            </li>
            <?php endif ?>
            <?php if ($_SESSION['user']['role'] === 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link text-white <?php if ($data['active'] == 'home') : ?> active bg-gradient-primary <?php endif ?> "
                    href="<?= BASE_URL ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if ($data['active'] == 'orderInfo') : ?> active bg-gradient-primary <?php endif ?> "
                    href="<?= BASE_URL ?>orderInfo">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Order Info</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if ($data['active'] == 'menu') : ?> active bg-gradient-primary <?php endif ?>"
                    href="<?= BASE_URL ?>menu">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if ($data['active'] == 'prosesOrder') : ?> active bg-gradient-primary <?php endif ?>"
                    href="<?= BASE_URL ?>prosesOrder">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Proses Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if ($data['active'] == 'users') : ?> active bg-gradient-primary <?php endif ?>"
                    href="<?= BASE_URL ?>users">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <?php endif ?>
            <div class="sidenav-footer  w-100 bottom-0 fixed-bootom">
                <div class="mx-3">
                    <form action="<?= BASE_URL ?>logout" onsubmit="return confirm('Yakin ingin Logout ?')"
                        method="POST">
                        <button class="btn btn-primary text-white mt-4 w-100" type="submit">
                            <span class="nav-link-text ms-1">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </ul>
    </div>
</aside>