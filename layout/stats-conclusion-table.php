<?php
if ($count > 0) { ?>
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>KECAMATAN</th>
        <th>JUMLAH</th>
      </tr>
    </thead>
    <tbody>
    <?php
    while ($row_conclu = mysqli_fetch_array($q_conclusion)) {?>
      <tr>
        <td><?php print $row_conclu['kecamatan'] ?></td>
        <td><?php print $row_conclu['jml_unit'] ?></td>
      </tr>
    <?php
    } # TUTUP.WHILE.LOOP.DATA?>
    </tbody>
  </table>
<?php
} else {
  print "<em>Tidak ada data. Silahkan filter.";
}?>
