<?php
if (isset($_POST['bulan'])) {
  $bulan = $_POST['bulan'];
  $selected = "selected";
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan where month(tgl_bayar)='$bulan' order by kecamatan, merek asc");
} else {
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan order by kecamatan, merek asc");
  $bulan = "";
  $selected = "";
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header alert alert-grey">
        <button type="button" data-toggle="modal" data-target="#impor" class="btn btn-biru pull-right">
          <i class="ti-import"></i> Import .XLS
        </button>
        <div class="row">
          <div class="col-md-3">
            <form action="" method="post">
              <div class="form-group">
                <label >FILTER BERDASARKAN BULAN</label>
                <select class="form-control" name="bulan" onchange='if(this.value != 0) { this.form.submit(); }'>
                  <option value="">-----</option>
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
            </form>
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
