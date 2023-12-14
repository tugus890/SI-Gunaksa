      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1 class="ml-3 text-warning">Dashboard</h1>
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light ml-4">Hello Admin  <?= 
        ucfirst ($this->session->userdata('nama'));?></span></h4>
          </div>
          <div class="row">
          <div class="col-xl-3 col-md-6 mb-4 ml-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Objek Wisata</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach ($objek as $row) { echo $row->total_objek;} ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4 ml-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Total Paket Wisata</div>
                                               <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach ($paket as $row) { echo $row->total_paket_wisata;} ?></div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4 ml-3">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Review</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach ($review as $row) { echo $row->total_review;} ?></div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
          </div>


          

       