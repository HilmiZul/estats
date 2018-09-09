<?php
$q = mysqli_query($conn, "select * from tb_kecamatan");
while ($row = mysqli_fetch_array($q)) {
  $nama = preg_replace('/\s+/', '-', $row['nama']);
  ?>
  <div class="modal fade" id="<?php print $nama?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4>Banyaknya Kendaraan di <?php print $row['nama']?></h4>
        </div>
        <div class="modal-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>MEREK</th>
                <th>JUMLAH</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $q_detil_map = mysqli_query($conn, "select kecamatan, merek, count(merek) as jumlah from tb_pemilik_kendaraan
                             where kecamatan='".$row['nama']."'
                             group by merek
                             order by jumlah desc");
              $count = mysqli_num_rows($q_detil_map);
              if ($count > 0) {
                while($r = mysqli_fetch_array($q_detil_map)) { ?>
                  <tr>
                    <td><?php print $r['merek']?></td>
                    <td><?php print $r['jumlah']?></td>
                  </tr>
                <?php }
              } // END.IF
              else { ?>
                <tr>
                  <td colspan="2">TIDAK ADA DATA.</td>
                </tr>
              <?php } // END.ELSE ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
