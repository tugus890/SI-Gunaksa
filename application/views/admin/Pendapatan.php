<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 >Data Produk</h4>
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data Produk <strong>Berhasil </strong><?= $this->session->flashdata('sukses'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                                 
      <div class="main-content">
        <section class="section">
          
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-university"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Produk</h4>
                  </div>
                  <div class="card-body">
                    <?php foreach ($total_produk as $row) { echo $row->banyak_disewa;} ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Produk Terpopuler</h4>
                  </div>
                  <div class="card-body">
                  <?php foreach ($populer as $pop) { echo $pop->nama_produk;} ?>
           
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pendapatan Hari ini</h4>
                  </div>
                  <div class="card-body">
                  <?php foreach ($pendapatan_hari_ini as $day) { echo $day->transaksi_day;} ?>
                  </div>
                </div>
              </div>
            </div>
            

<table class="table table-striped table-bordered mt-4">
  <tr>
    <th>No</th>
    <th>Nama Produk</th>
    <th>Total Produk Disewa</th>
    <th>Jumlah Pendapatan/produk</th>


  </tr>

    <?php 
    $no = 1;
    foreach ($produkStats as $produk) :
    ?>

    <tr>
    <td>
    <?php echo $no++ ?></td>
        <td><?php echo $produk->nama_produk ?></td>
        <td><?php echo $produk->banyak_disewa?></td>
        <td><?php echo $produk->nominal_per_produk ?></td>
    </tr>

<?php endforeach; ?>
</table>


</section>
</div>
          

    
          

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
