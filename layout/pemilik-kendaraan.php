<?php
if (isset($_POST['terapkan'])) {
  $bulan = $_POST['bulan'];
  $tahun = $_POST['tahun'];
  $selected = "selected";
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan
                    where month(tgl_bayar)='$bulan' and year(tgl_bayar)='$tahun'
                    order by kecamatan, merek asc");
} else {
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan order by kecamatan, merek asc");
  $bulan = "";
  $tahun = "";
  $selected = "";
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header alert alert-grey">
        <div class="row">
          <form action="" method="post">
            <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control" name="bulan" required>
                    <option value="">&#8212;Pilih Bulan&#8212;</option>
                    <option value="1" <?php if ($bulan=='1') { print $selected; } ?>>Januari</option>
                    <option value="2" <?php if ($bulan=='2') { print $selected; } ?>>Februari</option>
                    <option value="3" <?php if ($bulan=='3') { print $selected; } ?>>Maret</option>
                    <option value="4" <?php if ($bulan=='4') { print $selected; } ?>>April</option>
                    <option value="5" <?php if ($bulan=='5') { print $selected; } ?>>Mei</option>
                    <option value="6" <?php if ($bulan=='6') { print $selected; } ?>>Juni</option>
                    <option value="7" <?php if ($bulan=='7') { print $selected; } ?>>Juli</option>
                    <option value="8" <?php if ($bulan=='8') { print $selected; } ?>>Agustus</option>
                    <option value="9" <?php if ($bulan=='9') { print $selected; } ?>>September</option>
                    <option value="10" <?php if ($bulan=='10') { print $selected; } ?>>Oktober</option>
                    <option value="11" <?php if ($bulan=='11') { print $selected; } ?>>November</option>
                    <option value="12" <?php if ($bulan=='12') { print $selected; } ?>>December</option>
                  </select>
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <select class="form-control" name="tahun" required>
                  <option value="">&#8212;Pilih Tahun&#8212;</option>
                  <?php
                  $q_year = mysqli_query($conn, "select year(tgl_bayar) as tahun from tb_pemilik_kendaraan group by year(tgl_bayar)");
                  while($r = mysqli_fetch_array($q_year)) { ?>
                    <option value="<?php print $r['tahun']?>" <?php if ($tahun==$r['tahun']) { print $selected; } ?>><?php print $r['tahun']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <button type="submit" class="btn btn-biru" name="terapkan">Terapkan</button>
              </div>
            </div>
          </form>
          <div class="col-md-3">
            <button type="button" data-toggle="modal" data-target="#impor" class="btn btn-success pull-right">
              <i class="ti-import"></i> Import .XLS
            </button>
          </div>
        </div>
      </div>
      <div class="content table-responsive table-full-width">
        <table class="table table-striped table-hover" id="dataTables">
          <thead>
            <th>NO.</th>
            <th>NAMA PEMILIK</th>
            <th>ALAMAT</th>
            <th>KEC.</th>
            <th>MEREK</th>
          </thead>
          <tbody>
          <?php
          $no = 0;
          while($row = mysqli_fetch_array($q)) {
            $no++;
          ?>
            <tr>
              <td><?php print $no?>.</td>
              <td><em>(Dirahasiakan)</em> </td>
              <td><?php print $row['alamat_pemilik']?></td>
              <td><?php print $row['kecamatan']?></td>
              <td><?php print $row['merek']?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div> <!-- ./content -->
    </div> <!-- ./card -->
  </div> <!-- ./col-md-12 -->
</div> <!-- ./row -->
