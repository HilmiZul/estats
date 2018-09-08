<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <button type="button" data-toggle="modal" data-target="#impor" class="btn btn-primary">
          <i class="ti-import"></i> Import .XLS
        </button>
      </div>
      <div class="content table-responsive table-full-width">
        <table class="table table-striped table-hover" id="dataTables">
          <thead>
            <th>ID</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>KEC.</th>
            <th>MEREK</th>
            <th>TAHUN</th>
          </thead>
          <tbody>
          <?php
          $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan");
          while($row = mysqli_fetch_array($q)) {
          ?>
            <tr>
              <td><?php print $row['id']?></td>
              <td><?php print $row['nama_pemilik']?></td>
              <td><?php print $row['alamat_pemilik']?></td>
              <td><?php print $row['kecamatan']?></td>
              <td><?php print $row['merek']?></td>
              <td><?php print $row['tahun']?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div> <!-- ./content -->
    </div> <!-- ./card -->
  </div> <!-- ./col-md-12 -->
</div> <!-- ./row -->
