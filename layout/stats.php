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
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan
                    where month(tgl_bayar)='$bulan' and year(tgl_bayar)='$tahun'
                    order by kecamatan, merek asc");
  // END.FETCH.DATA.BULAN.TAHUN.

  // STATS-RANK-COLOR.PHP
  //include "layout/stats-rank-color.php";


} else {
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan order by kecamatan, merek asc");
  $bulan = "";
  $tahun = "";
  $selected = "";
  $result = true;
} ?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <?php if($result) {?>
        <div class="header">
          <div class="alert alert-danger">
            <p><em>Belum ada data. Silahkan Filter terlebih dahulu.</em></p>
          </div>
        </div>
      <?php } ?>
      <div class="content">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="0 0 700 900" class="peta">
          <defs>
            <clipPath id="_clipPath_33BetrrifSpbuoHPpqZQ8QOSHptk58aG"><rect width="700" height="900"/></clipPath>
          </defs>
          <g clip-path="url(#_clipPath_33BetrrifSpbuoHPpqZQ8QOSHptk58aG)">
            <!-- PAKISJAYA -->
            <!--<a  data-tooltip-content="#PAKISJAYA">-->

            <?php
            // LOOP.PETA
            // FETCH.DATA.PETA.DAN.SIMPAN KE XML/SVG
            $q_peta = mysqli_query($conn, "select * from tb_peta order by pid asc");
            $i = 0;
            while($r = mysqli_fetch_array($q_peta)) {
              if ($peta['nama'] == $r['nama']) {
                $fill = "rgba(70, 255, 70, .5)";
              } else {
                $fill = "rgba(200, 200, 200, .9)";
              } ?>
              <!-- shape -->
              <a id="tooltip-<?php print $i?>" data-tooltip-content="#<?php print $r['slug']?>">
                <path stroke="rgba(90, 90, 90, .9)" stroke-width="1" stroke-linecup="round" d=" <?php print $r['shape']?> " fill="<?php print $fill?>"/>
              </a>
            <?php
            $i++;
            } // END.LOOP.PETA ?>


            <!-- ############################ LABEL ###########################-->
            <a href="?nav=stats&detil=true&kecamatan=PAKISJAYA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,14.44,84.68)">
                <text transform="matrix(1,0,0,1,0,18.17)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:17px;font-style:normal;fill:#575757;stroke:none;">PAKISJAYA</text>
              </g>
            </a>

            <!--<a href="#" data-toggle="modal" data-target="#detil-kec-2">-->
            <a href="?nav=stats&detil=true&kecamatan=BATUJAYA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,86.99,169.03)">
                <text transform="matrix(1,0,0,1,7.15,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">BATUJAYA</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=TIRTAJAYA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,177.54,142.24)">
                <text transform="matrix(1,0,0,1,6.34,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">TIRTAJAYA</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=CIBUAYA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,271.97,107.7)">
                <text transform="matrix(1,0,0,1,11.55,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">CIBUAYA</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=JAYAKERTA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,232,248.19)">
                <text transform="matrix(1,0,0,1,9.17,13.9)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:13px;font-style:normal;fill:#575757;stroke:none;">JAYAKERTA</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=PEDES&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,313.43,227.03)">
                <text transform="matrix(1,0,0,1,17.83,18.17)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:17px;font-style:normal;fill:#575757;stroke:none;">PEDES</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=CILEBAR&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,371.78,264.33)">
                <text transform="matrix(1,0,0,1,9.47,18.17)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:17px;font-style:normal;fill:#575757;stroke:none;">CILEBAR</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=TEMPURAN&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,398.84,354.65)">
                <text transform="matrix(1,0,0,1,2.2,18.17)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:17px;font-style:normal;fill:#575757;stroke:none;">TEMPURAN</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=RAWAMERTA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,265.59,404.39)">
                <text transform="matrix(1,0,0,1,6.12,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">RAWAMERTA</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=MAJALAYA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,295.39,513.15)">
                <text transform="matrix(1,0,0,1,15.53,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">MAJALAYA</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=KLARI&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,305.93,584.91)">
                <text transform="matrix(1,0,0,1,8.55,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">KLARI</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=PURWASARI&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,369.65,586.16)">
                <text transform="matrix(1,0,0,1,0.01,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">PURWA-</text>
                <text transform="matrix(1,0,0,1,13.28,36.46)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">SARI</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=CIKAMPEK&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,399.27,660.9)">
                <text transform="matrix(1,0,0,1,2.81,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">CIKAMPEK</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=TIRTAMULYA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,432.25,561.99)">
                <text transform="matrix(1,0,0,1,17.18,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">TIRTA-</text>
                <text transform="matrix(1,0,0,1,14.17,36.46)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">MULYA</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=JATISARI&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,520.99,567.31)">
                <text transform="matrix(1,0,0,1,10.22,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">JATISARI</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=BANYUSARI&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,553.6,475.11)">
                <text transform="matrix(1,0,0,1,0,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">BANYUSARI</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=CILAMAYA-WETAN&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,584.91,373.55)">
                <text transform="matrix(1,0,0,1,2.78,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">CILAMAYA</text>
                <text transform="matrix(1,0,0,1,13.77,36.46)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">WETAN</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=CILAMAYA-KULON&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,506.06,368.74)">
                <text transform="matrix(1,0,0,1,7.76,13.9)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:13px;font-style:normal;fill:#575757;stroke:none;">CILAMAYA</text>
                <text transform="matrix(1,0,0,1,17.41,31.6)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:13px;font-style:normal;fill:#575757;stroke:none;">KULON</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=LEMAHABANG&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,445.68,462.73)">
                <text transform="matrix(1,0,0,1,12.4,11.76)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:11px;font-style:normal;fill:#575757;stroke:none;">LEMAH-</text>
                <text transform="matrix(1,0,0,1,13.85,26.74)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:11px;font-style:normal;fill:#575757;stroke:none;">ABANG</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=KOTABARU&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,477.52,623.79)">
                <text transform="matrix(1,0,0,1,6.07,12.83)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:12px;font-style:normal;fill:#575757;stroke:none;">KOTA-</text>
                <text transform="matrix(1,0,0,1,7.71,29.17)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:12px;font-style:normal;fill:#575757;stroke:none;">BARU</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=CIAMPEL&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,261.93,670.55)">
                <text transform="matrix(1,0,0,1,3.94,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">CIAMPEL</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=PANGKALAN&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,143.42,683.46)">
                <text transform="matrix(1,0,0,1,6.16,14.96)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:14px;font-style:normal;fill:#575757;stroke:none;">PANGKALAN</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=TEGALWARU&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,121.67,795.09)">
                <text transform="matrix(1,0,0,1,6.38,14.96)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:14px;font-style:normal;fill:#575757;stroke:none;">TEGALWARU</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=TELAGASARI&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,354.89,441.82)">
                <text transform="matrix(1,0,0,1,8.23,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">TELAGASARI</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=KARAWANG-BARAT&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,144.31,413.78)">
                <text transform="matrix(1,0,0,1,31.74,13.9)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:13px;font-style:normal;fill:#575757;stroke:none;">KARAWANG </text>
                <text transform="matrix(1,0,0,1,64.62,31.6)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:13px;font-style:normal;fill:#575757;stroke:none;">BARAT</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=KARAWANG-TIMUR&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,246.37,463.73)">
                <text transform="matrix(1,0,0,1,13.06,11.76)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:11px;font-style:normal;fill:#575757;stroke:none;">KARAWANG</text>
                <text transform="matrix(1,0,0,1,27.04,26.74)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:11px;font-style:normal;fill:#575757;stroke:none;">TIMUR</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=TELUKJAMBE-BARAT&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,86.31,546.25)">
                <text transform="matrix(1,0,0,1,13.83,16.03)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">TELUKJAMBE</text>
                <text transform="matrix(1,0,0,1,58.25,36.46)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:15px;font-style:normal;fill:#575757;stroke:none;">BARAT</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=TELUKJAMBE-TIMUR&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,210.68,543.25)">
                <text transform="matrix(1,0,0,1,3.8,11.76)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:11px;font-style:normal;fill:#575757;stroke:none;">TELUKJAMBE</text>
                <text transform="matrix(1,0,0,1,20.15,26.74)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:11px;font-style:normal;fill:#575757;stroke:none;">TIMUR</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=KUTAWALUYA&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,288.85,315.37)">
                <text transform="matrix(1,0,0,1,24.42,13.9)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:13px;font-style:normal;fill:#575757;stroke:none;">KUTA-</text>
                <text transform="matrix(1,0,0,1,16.53,31.6)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:13px;font-style:normal;fill:#575757;stroke:none;">WALUYA</text>
              </g>
            </a>

            <a href="?nav=stats&detil=true&kecamatan=RENGASDENGKLOK&bulan=<?php print $bulan?>&tahun=<?php print $tahun?>">
              <g transform="matrix(1,0,0,1,144.79,333.02)">
                <text transform="matrix(1,0,0,1,7.67,13.9)" style="font-family:&quot;Quicksand&quot;;font-weight:600;font-size:13px;font-style:normal;fill:#575757;stroke:none;">RENGASDENGKLOK</text>
              </g>
            </a>
          </g>
        </svg>
      </div>
    </div>
  </div>
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
    <div class="card">
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
    </div>

  </div>
</div>
