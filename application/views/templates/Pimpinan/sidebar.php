<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <h3 class="app-brand-text fw-bolder ms-2">E-Catalogue</h3>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li <?= $this->uri->segment(1) == 'CpimpinanDashboard/index' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
            <a href=" <?= base_url('CpimpinanDashboard/index') ?>" class="menu-link">
                <i class="menu-icon tf-icons fas fa-home fa-md "></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div>Laporan</div>
            </a>
            <ul class="menu-sub">
                <li <?= $this->uri->segment(1) == 'CpimpinanDashboard/pendapatan' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
                    <a href=" <?= base_url('CpimpinanDashboard/pendapatan') ?>" class="menu-link">
                        <div>Pendapatan</div>
                    </a>
                </li>
               
            </ul>
        </li>
       
    </ul>
</aside>
<!-- / Menu -->