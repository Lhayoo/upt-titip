 <div class="row">
     <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
             <div class="card-header p-3 pt-2">
                 <div
                     class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                     <i class="material-icons opacity-10">weekend</i>
                 </div>
                 <div class="text-end pt-1">
                     <p class="text-sm mb-0 text-capitalize">
                         Total Orderan
                     </p>
                     <h4 class="mb-0">
                         <?= $data['info']['total_orderan'] ?>
                     </h4>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
             <div class="card-header p-3 pt-2">
                 <div
                     class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                     <i class="material-icons opacity-10">person</i>
                 </div>
                 <div class="text-end pt-1">
                     <p class="text-sm mb-0 text-capitalize">Total anggota</p>
                     <h4 class="mb-0"> <?= $data['info']['total_users'] ?></h4>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
             <div class="card-header p-3 pt-2">
                 <div
                     class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                     <i class="material-icons opacity-10">person</i>
                 </div>
                 <div class="text-end pt-1">
                     <p class="text-sm mb-0 text-capitalize">Total aktif</p>
                     <h4 class="mb-0">
                         <?= $data['info']['total_aktif'] ?>
                     </h4>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-sm-6">
         <div class="card">
             <div class="card-header p-3 pt-2">
                 <div
                     class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                     <i class="material-icons opacity-10">weekend</i>
                 </div>
                 <div class="text-end pt-1">
                     <p class="text-sm mb-0 text-capitalize">Total Orderan selesai</p>
                     <h4 class="mb-0">
                         <?= $data['info']['total_done'] ?>
                     </h4>
                 </div>
             </div>
         </div>
     </div>
     <div class="row mt-4">
         <div class="col-lg-12 mx-auto col-md-6 mt-4 mb-4">
             <div class="card z-index-2 ">
                 <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                     <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                         <div class="chart">
                             <canvas id="chart-bars" class="chart-canvas" height="400"></canvas>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <h6 class="mb-0 ">Grafik Peminjaman</h6>
                 </div>
             </div>
         </div>
     </div>