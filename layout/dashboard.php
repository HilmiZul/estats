<div class="row">
  <div class="col-md-12">
    <div class="alert alert-grey">
      <h3 class="text-center"><em>Selamat Datang di Aplikasi Monitoring Pengguna Kendaraan Wilayah Kab.Karawang</em></h3>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card ">
      <div class="header">
        <h3 class="title"><i class="ti ti-import"></i> Impor</h3>
      </div>
      <div class="content">
        <div class="alert alert-grey">Impor Data Pemilik Kendaraan dari berkas <strong>.XLS</strong></div>
        <form action="?nav=impor-data" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="pilih">PILIH BERKAS .XLS</label>
            <input type="file" accept="application/vnd.ms-excel" class="btn btn-default" name="berkas" id="pilih" required>
          </div>
          <button type="submit" class="btn btn-biru" name="upload"><i class="ti-import"></i> Import</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card ">
      <div class="header">
        <h3 class="title"><i class="ti ti-server"></i> Backup Database</h3>
      </div>
      <div class="content">
        <div class="alert alert-grey">Backup database cepat dengan menekan tombol <code>Backup</code></div>
        <a href="layout/backup-db.php" class="btn btn-biru"><i class="ti-download"></i> Backup</a>
      </div>
    </div>
  </div>
</div>
