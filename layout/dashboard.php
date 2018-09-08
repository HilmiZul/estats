<!--<div class="row">
    <div class="col-lg-6 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-warning text-center">
                            <i class="ti-map"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Wilayah</p>
                            30 Kecamatan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-danger text-center">
                            <i class="ti-car"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Kendaraan</p>
                            >7 Merek
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="row">
  <div class="col-md-6">
    <div class="card ">
      <div class="header">
        <h3 class="title"><i class="ti ti-import"></i> Impor Cepat</h3>
      </div>
      <div class="content">
        <div class="alert alert-warning">Impor Data Pemilik Kendaraan dari berkas <strong>.XLS</strong></div>
        <form action="?nav=impor-data" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="pilih">PILIH BERKAS .XLS</label>
            <input type="file" accept="application/vnd.ms-excel" class="form-control" name="berkas" id="pilih" required>
          </div>
          <button type="submit" class="btn btn-primary" name="upload"><i class="ti-import"></i> Import</button>
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
        <div class="alert alert-success">Backup database cepat dengan menekan tombol <code>Backup</code></div>
        <a href="layout/backup-db.php" class="btn btn-success"><i class="ti-download"></i> Backup</a>
      </div>
    </div>
  </div>
</div>
