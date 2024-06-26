<?php
// CLEAR DATA
if (isset($_POST['clear'])) {
  mysqli_query($conn, "truncate tb_pemilik_kendaraan");
  $msg = "<div class='alert alert-success'><i class='fa fa-check'></i> Semua data telah dihapus.</div>";
}

if (isset($_POST['terapkan'])) {
  $bulan = $_POST['bulan'];
  $bulan_end = $_POST['bulan_end'];
  $selected = "selected";
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan
                    where month(tgl_bayar)
                    between '$bulan' and '$bulan_end'
                    order by kecamatan, merek asc");
} else {
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan order by kecamatan, merek asc limit 0,100");
  $bulan = "";
  $bulan_end = "";
  $selected = "";
}

// CEK APAKAH ADA DATA?
$q_data = mysqli_query($conn, "select * from tb_pemilik_kendaraan");
$count = mysqli_num_rows($q_data);
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">

    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header alert alert-grey">
        <div class="row">
          <form action="" method="post">
            <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control" name="bulan" required>
                    <option value="">&#8212;Pilih Bulan Awal&#8212;</option>
                    <?php
                    $q_bulan = mysqli_query($conn, "select month(tgl_bayar) as bulan from tb_pemilik_kendaraan group by month(tgl_bayar)");
                    while($b = mysqli_fetch_array($q_bulan)) {
                      $bln = (int)$b['bulan'];
                      $bln = $bln - 1;
                      $bln_str = (string)$bln;?>
                      <option value="<?php print $b['bulan'] ?>" <?php if ($bulan==$b['bulan']) { print $selected; } ?>><?php print $month[$bln] ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control" name="bulan_end" required>
                    <option value="">&#8212;Pilih Bulan Akhir&#8212;</option>
                    <?php
                    $q_bulan = mysqli_query($conn, "select month(tgl_bayar) as bulan from tb_pemilik_kendaraan group by month(tgl_bayar)");
                    while($b = mysqli_fetch_array($q_bulan)) {
                      $bln = (int)$b['bulan'];
                      $bln = $bln - 1;
                      $bln_str = (string)$bln;?>
                      <option value="<?php print $b['bulan'] ?>" <?php if ($bulan_end==$b['bulan']) { print $selected; } ?>><?php print $month[$bln] ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <button type="submit" class="btn btn-biru" name="terapkan">Terapkan</button>
                <button type="button" data-toggle="modal" data-target="#impor" class="btn btn-success">
                  <i class="ti-import"></i> Import
                </button>
                <!-- <a href="layout/pemilik-kendaraan-export.php?bulan=#&bulan_end=#" class="btn btn-info">
                  <i class="ti-export"></i> Export
                </a> -->
              </div>
            </div>
          </form>
          
          <div class="col-md-2">
            <?php if ($count > 0) { ?>
            <button type="button" data-toggle="modal" data-target="#clear-data" class="btn btn-danger pull-right">
              <i class="fa fa-trash-o"></i>
            </button>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php print $msg; ?>
      <div class="content table-responsive table-full-width">
        <table class="table table-striped table-hover" id="dataTables">
          <thead>
            <th>NO.</th>
            <th>NAMA PEMILIK</th>
            <th>ALAMAT</th>
            <th>KEC.</th>
            <th>MEREK</th>
            <th>AKSI</th>
          </thead>
          <tbody>
          <?php
          $no = 0;
          while($row = mysqli_fetch_array($q)) {
            $no++; ?>
            <tr>
              <td><?php print $no?>.</td>
              <td><?php print $row['nama_pemilik'] ?></td>
              <td><?php print $row['alamat_pemilik']?></td>
              <td><?php print $row['kecamatan']?></td>
              <td><?php print $row['merek']?></td>
              <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#detil-<?php print $row['id'] ?>">RINCIAN</a>
              </td>
            </tr>
          <?php } // TUTUP.WHILE ?>
          </tbody>
        </table>
      </div> <!-- ./content -->
    </div> <!-- ./card -->
  </div> <!-- ./col-md-12 -->
</div> <!-- ./row -->
