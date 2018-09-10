<?php
$q = mysqli_query($conn, "select * from tb_kecamatan");
while ($row = mysqli_fetch_array($q)) {
  $nama = preg_replace('/\s+/', '-', $row['nama']);
  ?>
  <div class="tooltip_templates">
    <span id="<?php print $nama?>">
      <div class="alert alert-grey">
        <h5 class="title text-center">KEC.<?php print $nama?></h5>
      </div>
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
        <?php } // tutup.else
        } // END.IF
        else { ?>
          <tr>
            <td colspan="2">Tidak ada data.</td>
          </tr>
        <?php } // END.ELSE ?>
      </tbody>
    </table>
    </span>
  </div>
<?php } ?>
