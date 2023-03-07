<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= B ?>/admin">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-money-bill"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SPPSKENSA</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?= ($data['section'] == 'dashboard') ? "active" : "" ?>">
    <a class="nav-link" href="<?= B ?>/admin"> 
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menus
</div>

<!-- Nav Item - Utilities Collapse Menu -->
<?php if($_SESSION['user']['role'] == '0'): ?>

<li class="nav-item <?= ($data['section'] == 'pengguna') ? "active" : "" ?>">
    <a class="nav-link collapsed" href="<?= B ?>/pengguna">
        <i class="fas fa-fw fa-users"></i>
        <span>Pengguna</span>
    </a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= ($data['section'] == 'petugas') ? "active" : "" ?>">
    <a class="nav-link collapsed" href="<?= B ?>/petugas">
        <i class="fas fa-fw fa-user"></i>
        <span>Petugas</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item <?= ($data['section'] == 'siswa') ? "active" : "" ?>">
    <a class="nav-link collapsed" href="<?= B ?>/siswa">
        <i class="fas fa-fw fa-user-graduate"></i>
        <span>Siswa</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item <?= ($data['section'] == 'kelas') ? "active" : "" ?>">
    <a class="nav-link collapsed" href="<?= B ?>/kelas">
        <i class="fas fa-fw fa-object-group"></i>
        <span>Kelas</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item <?= ($data['section'] == 'pembayaran') ? "active" : "" ?>">
    <a class="nav-link collapsed" href="<?= B ?>/pembayaran">
        <i class="fas fa-fw fa-money-bill-wave"></i>
        <span>Pembayaran</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item <?= ($data['section'] == 'entri') ? "active" : "" ?>">
    <a class="nav-link collapsed" href="<?= B ?>/entri">
        <i class="fas fa-fw fa-cash-register"></i>
        <span>Entri Pembayaran</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item <?= ($data['section'] == 'history') ? "active" : "" ?>">
    <a class="nav-link collapsed" href="<?= B ?>/history">
        <i class="fas fa-fw fa-clock"></i>
        <span>History Pembayaran</span>
    </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item <?= ($data['section'] == 'laporan') ? "active" : "" ?>">
    <a class="nav-link collapsed" href="<?= B ?>/laporan">
        <i class="fas fa-fw fa-exclamation"></i>
        <span>Generate Laporan</span>
    </a>
</li>

<?php else: ?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ($data['section'] == 'kelas') ? "active" : "" ?>">
        <a class="nav-link collapsed" href="<?= B ?>/kelas">
            <i class="fas fa-fw fa-object-group"></i>
            <span>Kelas</span>
        </a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ($data['section'] == 'entri') ? "active" : "" ?>">
        <a class="nav-link collapsed" href="<?= B ?>/entri">
            <i class="fas fa-fw fa-cash-register"></i>
            <span>Entri Pembayaran</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ($data['section'] == 'history') ? "active" : "" ?>">
        <a class="nav-link collapsed" href="<?= B ?>/history">
            <i class="fas fa-fw fa-clock"></i>
            <span>History Pembayaran</span>
        </a>
    </li>
<?php endif ?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->