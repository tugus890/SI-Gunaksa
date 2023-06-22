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
          <li <?= $this->uri->segment(1) == 'admin/dashboard' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
              <a href=" <?= base_url('admin/dashboard') ?>" class="menu-link">
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
                  <div>Data</div>
              </a>
              <ul class="menu-sub">
                  <li <?= $this->uri->segment(1) == 'data_user' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
                      <a href="<?= base_url('admin/data_user') ?>" class="menu-link">
                          <div>Data User</div>
                      </a>
                  </li>
                  <li <?= $this->uri->segment(1) == 'admin/data_produk' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
                      <a href="<?= base_url('admin/data_produk') ?>" class="menu-link">
                          <div>Data Produk</div>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div>Penyewaan</div>
              </a>
              <ul class="menu-sub">
                  <li <?= $this->uri->segment(1) == 'admin/transaksi' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
                      <a href="<?= base_url('admin/transaksi') ?>" class="menu-link">
                          <div>Pengajuan Sewa</div>
                      </a>
                  </li>
                  <li <?= $this->uri->segment(1) == 'CadminJadwal' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
                      <a href="<?= base_url('CadminJadwal') ?>" class="menu-link">
                          <div>Jadwal</div>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div>Informasi</div>
              </a>
              <ul class="menu-sub">
                  <li <?= $this->uri->segment(1) == 'admin/data_faq' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
                      <a href="<?= base_url('admin/data_faq') ?>" class="menu-link">
                          <div>FAQ</div>
                      </a>
                  </li>
                  <li <?= $this->uri->segment(1) == 'admin/pendapatan' || $this->uri->segment(1) == '' ? 'class="menu-item active"' : '' ?> class="menu-item">
                      <a href="<?= base_url('admin/pendapatan') ?>" class="menu-link">
                          <div>Pendapatan Sewa</div>
                      </a>
                  </li>
              </ul>
          </li>
      </ul>
  </aside>
  <!-- / Menu -->