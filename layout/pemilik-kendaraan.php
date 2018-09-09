<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <button type="button" data-toggle="modal" data-target="#impor" class="btn btn-biru pull-right">
          <i class="ti-import"></i> Import .XLS
        </button>
        <div class="row">
          <div class="col-md-3">
            <form action="" method="post">
              <div class="form-group">
                <label for="">FILTER BERDASARKAN BULAN</label>
                <select class="form-control selectpicker" data-live-search="true" name="bulan">
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
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
          $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan order by kecamatan, merek asc");
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
