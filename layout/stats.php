<table class="table table-bordered">
  <thead>
    <tr>
      <th>KECAMATA</th>
      <th>DATA</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan where kecamatan='CIAMPEL'");
  while($r = mysqli_fetch_array($q)) { ?>
    <tr>
      <th></th>
    </tr>
  <?php } ?>
  </tbody>
</table>
