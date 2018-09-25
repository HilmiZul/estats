<?php
if (isset($_POST['terapkan'])) {
  $bulan = $_POST['bulan'];
  $tahun = $_POST['tahun'];
  $selected = "selected";

  // NYARI.NILAI.TERTINGGI.DARI.BANYAK.KENDARAAN.DI.KECAMATAN
  // GRUP BY KECAMATAN, MEREK DAN ORDER BY COUNT(MEREK)
  // ***
  // 1. CUMA NGAMBIL NAMA KECAMATAN DOANG UNTUK DIBANDINGKAN/CEK/COCOKAN
  // DENGAN HASIL QUERY tb_peta DIBAWAH.
  //
  // 2. UNTUK MENAMPILKAN HASIL DI BAGIAN SIDEBAR "DOMINAN"
  // ***
  $q_max = mysqli_query($conn, "select a.nama, b.merek, count(merek) as jumlah from tb_peta a
                        inner join tb_pemilik_kendaraan b on a.nama=b.kecamatan
                        where month(tgl_bayar)='$bulan' and
                        year(tgl_bayar)='$tahun'
                        group by a.nama, b.merek
                        order by count(merek) desc limit 0,1");
  $peta = mysqli_fetch_array($q_max);
  // END.NYARI.NILAI.TERTINGGI

  // MENGEMBALIKAN JUMLAH DARI HASIL QUERY $q_max. yaitu 1 (SATU)
  // KARENA DILIMIT 0,1
  $dominan = mysqli_num_rows($q_max);


  // FETCH DATA PEMILIK KENDARAAN BERDASARKAN BULAN DAN TAHUN YG DITENTUKAN
  // OLEH USER. BULAN DAN TAHUN DIAMBIL DARI FORM YG DI SUBMUT USER.
  // $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan
  //                   where month(tgl_bayar)='$bulan' and year(tgl_bayar)='$tahun'
  //                   group by kecamatan, merek
  //                   order by kecamatan, merek asc");
  $q_merek = mysqli_query($conn, "select a.nama, b.merek, count(merek) as jumlah from tb_peta a
                        inner join tb_pemilik_kendaraan b on a.nama=b.kecamatan
                        where month(tgl_bayar)='$bulan' and
                        year(tgl_bayar)='$tahun'
                        group by a.nama, b.merek
                        order by count(merek) desc");
  // END.FETCH.DATA.BULAN.TAHUN.

  // STATS-RANK-COLOR.PHP
  //include "layout/stats-rank-color.php";


  # $result digunakan untuk menampilkan pesan data belum di filter.
  # kalo nilainya false, berarti data sudah di filter
  $result = false;
} else {
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan order by kecamatan, merek asc");
  $bulan = "";
  $tahun = "";
  $selected = "";
  $result = true;
} ?>
<div class="row">

  <!-- STATS.MAP -->
  <div class="col-md-8">
    <?php include "layout/stats-map.php"; ?>

    <?php include "layout/stats-chart.php"; ?>
  </div>

  <!-- SIDEBAR.RIGHT -->
  <div class="col-md-4">
    <div class="card">
      <div class="header">
        <h4 class="title"><i class="fa fa-lightbulb-o"></i> Penting</h4>
      </div>
      <div class="content">
        <ul>
          <li>Filter data terlebih dahulu.</li>
          <li>Arahkan pointer ke salah satu wilayah untuk melihat dominan kendaraan.</li>
          <li>Klik nama wilayah untuk melihat rincian.</li>
        </ul>
      </div>
    </div>
    <div class="card">
      <div class="header">
        <h4 class="title"><i class="fa fa-filter"></i> Filter</h4>
      </div>
      <div class="content">
        <form action="" method="post">
          <div class="form-group">
            <select class="form-control" name="bulan" required>
              <option value="">&#8212;Pilih Bulan&#8212;</option>
              <?php
              $month = [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
              ];
              $q_bulan = mysqli_query($conn, "select month(tgl_bayar) as bulan from tb_pemilik_kendaraan group by month(tgl_bayar)");
              while($b = mysqli_fetch_array($q_bulan)) {
                $bln = (int)$b['bulan'];
                $bln = $bln - 1;
                $bln_str = (string)$bln;?>
                <option value="<?php print $b['bulan'] ?>" <?php if ($bulan==$b['bulan']) { print $selected; } ?>><?php print $month[$bln] ?></option>
              <?php } ?>
              <!--<option value="1" <?php if ($bulan=='1') { print $selected; } ?>>Januari</option>
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
              <option value="12" <?php if ($bulan=='12') { print $selected; } ?>>December</option>-->
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="tahun" required>
              <option value="">&#8212;Pilih Tahun&#8212;</option>
              <?php
              $q_year = mysqli_query($conn, "select year(tgl_bayar) as tahun from tb_pemilik_kendaraan group by year(tgl_bayar)");
              while($baris = mysqli_fetch_array($q_year)) { ?>
                <option value="<?php print $baris['tahun']?>" <?php if ($tahun==$baris['tahun']) { print $selected; } ?>><?php print $baris['tahun']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-biru" name="terapkan">Terapkan</button>
          </div>
        </form>
      </div>
    </div> <!-- TUTUP.CARD -->
    <!-- <div class="card">
      <div class="header">
        <h4 class="title"><i class="fa fa-flag"></i> Dominan</h4>
      </div>
      <div class="content">
      <?php
      if ($dominan > 0) { ?>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>KECAMATAN</th>
              <th>MEREK</th>
              <th>JUMLAH</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php print $peta['nama'] ?></td>
              <td><?php print $peta['merek'] ?></td>
              <td><?php print $peta['jumlah'] ?></td>
            </tr>
          </tbody>
        </table>
      <?php } else { ?>
        <div class="alert alert-danger">
          <em>Tidak ada data. Silahkan filter.</em>
        </div>
      <?php } ?>
      </div>
    </div> -->

    <div class="card">
      <div class="header">
        <h4 class="title"><i class="fa fa-flag"></i> Conclusion</h4>
      </div>
      <div class="content">
        <?php $q_conclusion = mysqli_query($conn, "select kecamatan, count(merek) as jml_unit from tb_pemilik_kendaraan
                                    where merek='TOYOTA' and
                                    month(tgl_bayar)='$bulan' and
                                    year(tgl_bayar)='$tahun'
                                    group by kecamatan, merek
                                    order by count(merek) desc");
        $count = mysqli_num_rows($q_conclusion);


        # PILIH STYLE CONCLUSION :D

        # 1. BENTUK TABEL
        #include 'layout/stats-conclusion-table.php';
        # 2. BENTUK CHART DONAT
        include 'layout/stats-conclusion-chart.php';
        ?>
      </div>
    </div>

  </div>
</div>
