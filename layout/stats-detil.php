<?php
if ($_GET['detil'] == 'true') {
  if (!empty($_GET['kecamatan']) && !empty($_GET['bulan']) && !empty($_GET['bulan_end'])) {
    $bulan = $_GET['bulan'];
    $bulan_end = $_GET['bulan_end'];
    $kec = $_GET['kecamatan'];
    $kec = str_replace('-', ' ', $kec);
    $selected = "selected";
    $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan
                      where month(tgl_bayar)
                      between '$bulan' and '$bulan_end'
                      and kecamatan='$kec'
                      order by kecamatan, merek asc");
    $count = mysqli_num_rows($q);
  } else {
    header('Location: ?nav=stats');
  }
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="alert alert-grey">
        <a href="?nav=stats" class="btn btn-danger">
          <i class="ti-arrow-left"></i> Kembali
        </a>
        <?php
        if ($count > 0) { ?>
          <a href="layout/stats-detil-export.php?kecamatan=<?php print $_GET['kecamatan']?>&bulan=<?php print $_GET['bulan']?>&tahun=<?php print $_GET['tahun']?>" class="btn btn-success">
            <i class="ti-export"></i> Expor .XLS
          </a>
        <?php } ?>
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
              <td><?php print $row['nama_pemilik'] ?></td>
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
