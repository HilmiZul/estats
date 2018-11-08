<?php
if (isset($_POST['terapkan'])) {
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan
                    where month(tgl_bayar)
                    between '$bulan' and '$bulan_end'
                    order by kecamatan, merek asc
                    ");
} else {
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan order by kecamatan, merek asc limit 0,100");
}
while ($r = mysqli_fetch_array($q)) {
  $tgl = date('d F Y', strtotime($r['tgl_bayar']));
?>
  <div class="modal fade" id="detil-<?php print $r['id']?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4>RINCIAN PEMILIK KENDARAAN a.n. <br><?php print $r['nama_pemilik']?></h4>
        </div>
        <div class="modal-body">
          <table class="table table-hover table-striped">
            <tbody>
              <tr>
                <th>No.Pol</th>
                <td><?php print $r['no_pol']?></td>
              </tr>
              <tr>
                <th>Plat</th>
                <td><?php print $r['plat']?></td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td><?php print $r['alamat_pemilik']?></td>
              </tr>
              <tr>
                <th>Kecamatan</th>
                <td><?php print $r['kecamatan']?></td>
              </tr>
              <tr>
                <th>Jenis</th>
                <td><?php print $r['jenis']?></td>
              </tr>
              <tr>
                <th>Merek</th>
                <td><?php print $r['merek']?></td>
              </tr>
              <tr>
                <th>Model/Tipe</th>
                <td><?php print $r['model_type']?></td>
              </tr>
              <tr>
                <th>Tahun</th>
                <td><?php print $r['tahun']?></td>
              </tr>
              <tr>
                <th>Tanggal Bayar</th>
                <td><?php print $tgl?></td>
              </tr>
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
