<?php
$q = mysqli_query($conn, "select * from tb_kecamatan");
while ($row = mysqli_fetch_array($q)) {
  $nama = preg_replace('/\s+/', '-', $row['nama']);
  ?>
  <div class="tooltip_templates">
    <span id="<?php print $nama?>">
      <h5 class="title text-center"><?php print $row['nama']?></h5>
      <table class="table table-hover">
        <tbody>
        <?php

        // CARI MEREK MOBIL BERIKUT JUMLAH UNITNYA
        // BERDASARKAN KECAMATAN, BULAN DAN TAHUN PEMBELIAN
        // DIURUTKAN BERDASARKAN JUMLAH UNIT TERBANYAK.
        $q_detil_map = mysqli_query($conn, "select kecamatan, merek, count(merek) as jml_unit from tb_pemilik_kendaraan
                       where kecamatan='".$row['nama']."' and
                       month(tgl_bayar)='$bulan' and
                       year(tgl_bayar)='$tahun'
                       group by merek
                       order by jml_unit desc");

        // CARI JUMLAH KENDARAAN DI KECAMATAN TERTENTU.
        $q_count_merek = mysqli_query($conn, "select count(merek) as jumlah from tb_pemilik_kendaraan where kecamatan='".$row['nama']."'");

        // FETCH DATANYA UNTUK DIAMBIL JUMLAHNYA DARI ARRAY.
        $c = mysqli_fetch_array($q_count_merek);

        // JUMLAHKAN HASIL DARI QUERY q_detil_map
        // UNTUK CEK APAKAH ADA DATA ATAU TIDAK.
        $count = mysqli_num_rows($q_detil_map);
        if ($count > 0) {
          while($r = mysqli_fetch_array($q_detil_map)) {
            // HITUNG PROSENTASE DARI JUMLAH KENDARAAN DI KECAMATAN TERTENTU.
            $prosentase = ($r['jml_unit']/$c['jumlah']) * 100;
            $prosentase = round($prosentase, 2); // DUA ANGKA DIBELAKANG KOMA. :D

            // KALAU ADA KENDARAAN MEREK TOYOTA,
            // KASIH WARNA IJO.
            if ($r['merek'] == 'TOYOTA') {
              $bgcolor = 'rgba(70, 255, 70, .3)';
            } else {
              $bgcolor = 'transparent';
            } ?>
            <tr style="background:<?php print $bgcolor ?>">
              <td><?php print $r['merek']?></td>
              <td><?php print $r['jml_unit']?></td>
              <td><?php print $prosentase?>%</td>
            </tr>
        <?php
          } // TUTUP.WHILE
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
