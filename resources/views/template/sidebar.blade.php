<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Puskesmas Karanganyar</div>
    </a>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Navigasi
    </div>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/obat">
            <i class="fas fa-capsules"></i>
            <span>Data Obat</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/forecasting">
            <i class="fas fa-fw fa-table"></i>
            <span>Forecasting</span></a>
    </li>

    <div class="sidebar-heading">
        Menu Lainya
    </div>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="/user">
            <i class="fas fa-users"></i>
            <span>Kelola Data User</span></a>
    </li>

    <li class="nav-item">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="nav-link btn">
                <i class="fas fa-window-close"></i>
                <span>Keluar</span></a>
            </button>
        </form>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
