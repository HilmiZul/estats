<?php
if (isset($_POST['upload'])) {

  $allowed_ext	= array('xls');
  $file_name		= $_FILES['berkas']['name'];
  $file_ext_tmp		= explode('.', $file_name);
  $file_ext = end($file_ext_tmp);

  if(in_array($file_ext, $allowed_ext) == true) {
    include "lib/ereader/ereader2.1.php";

    $data = new Spreadsheet_Excel_Reader($_FILES['berkas']['tmp_name']);
    $hasildata = $data->rowcount($sheet_index=0);

    // untuk status (sementara)
    $sukses = 0;
    $gagal = 0;

    $coun = 0;

    for ($i=2; $i<=$hasildata; $i++) {
      $no_pol = $data->val($i,2);
      $plat = $data->val($i,3);
      $nama_pemilik = $data->val($i,4);
      $alamat_pemilik = $data->val($i,5);
      $jenis = $data->val($i,6);
      $merek = $data->val($i,7);
      $model_type = $data->val($i,8);
      $tahun = $data->val($i,9);
      $tgl_bayar = $data->val($i,10);
      $tgl_bayar = date_create($tgl_bayar);
      $tgl_bayar = date_format($tgl_bayar, 'Ymd');

      $alamat = explode(" ",$alamat_pemilik);
      foreach ($alamat as $index => $value) {
        # 1 CIKAMPEK
        if ($alamat[$index] == "CIKAMPEK") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysql_query($query);


        }
        # 2 KARAWANG TIMUR
        elseif (($alamat[$index] == "KRW") && ($alamat[$index+1] == "TMR") ||
                ($alamat[$index] == "KARAWANG") && ($alamat[$index+1] == "WETAN") ||
                ($alamat[$index] == "KARAWANG") && ($alamat[$index+1] == "TIMUR") ||
                ($alamat[$index] == "KARAWANG") && ($alamat[$index+1] == "TMR")) {
          $kec = "KARAWANG TIMUR";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysql_query($query);


        }
        # 3 CILAMAYA KULON
        elseif (($alamat[$index] == "CILAMAYA") && ($alamat[$index+1] == "KULON")) {
          $kec = "CILAMAYA KULON";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysql_query($query);


        }
        # 4 PURWASARI
        elseif ($alamat[$index] == "PURWASARI") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysql_query($query);


        }
        # 5 CILAMAYA WETAN
        elseif (($alamat[$index] == "CILAMAYA") && ($alamat[$index+1] == "WTN") ||
                ($alamat[$index] == "CILAMAYA") && ($alamat[$index+1] == "WETAN")) {
          $kec = "CILAMAYA WETAN";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysql_query($query);


        }
        # 6 JATISARI
        elseif ($alamat[$index] == "JATISARI") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysql_query($query);


        }
        # 7 KOTABARU
        elseif ($alamat[$index] == "KOTABARU") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysql_query($query);


        }
        # 8 KLARI
        elseif (($alamat[$index] == "KLARI") || ($alamat[$index] == "JKARI")) {
          $kec = "KLARI";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysql_query($query);


        }
        # 9 TELUKJAMBE TIMUR
        elseif (($alamat[$index] == "TLJB") && ($alamat[$index+1] == "TIMUR") ||
                ($alamat[$index] == "TLJB") && ($alamat[$index+1] == "TMR") ||
                ($alamat[$index] == "TELUKJAMBE") && ($alamat[$index+1] == "TIMUR")) {
          $kec = "TELUKJAMBE TIMUR";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 10 TALAGASARI / TELAGASARI
        elseif (($alamat[$index] == "TELAGASARI") || ($alamat[$index] == "TALAGASARI")) {
          $kec = "TALAGASARI";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 11 TEMPURAN
        elseif ($alamat[$index] == "TEMPURAN") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 12 MAJALAYA
        elseif ($alamat[$index] == "MAJALAYA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 13 BATUJAYA
        elseif ($alamat[$index] == "BATUJAYA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 14 CIAMPEL
        elseif ($alamat[$index] == "CIAMPEL") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 15 KARAWANG BARAT
        elseif (($alamat[$index] == "KARAWANG") && ($alamat[$index+1] == "BARAT") ||
                ($alamat[$index] == "KRW") && ($alamat[$index+1] == "BARAT") ||
                ($alamat[$index] == "KARAWANG") && ($alamat[$index+1] == "BRT") ||
                ($alamat[$index] == "KRW") && ($alamat[$index+1] == "BRT")) {
          $kec = "KARAWANG BARAT";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 16 CIBUAYA
        elseif ($alamat[$index] == "CIBUAYA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 17 TEGALWARU
        elseif ($alamat[$index] == "TEGALWARU") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 18 JAYAKERTA
        elseif ($alamat[$index] == "JAYAKERTA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 19 TIRTAMULYA
        elseif ($alamat[$index] == "TIRTAMULYA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }

        # 20 RENGASDENGKLOK
        elseif ($alamat[$index] == "RENGASDENGKLOK" || $alamat[$index] == "RDK") {
          $kec = "RENGASDENGKLOK";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }

        # 21 PEDES
        elseif ($alamat[$index] == "PEDES") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 22 PAKISJAYA
        elseif ($alamat[$index] == "PAKISJAYA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 23 BANYUSARI
        elseif ($alamat[$index] == "BANYUSARI") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 24 CILEBAR
        elseif ($alamat[$index] == "CILEBAR") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 25 KUTAWALUYA
        elseif ($alamat[$index] == "KUTAWALUYA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 26 LAMAHABANG
        elseif ($alamat[$index] == "LAMAHABANG" || $alamat[$index] == "LEMAHABANG") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 27 PANGKALAN
        elseif ($alamat[$index] == "PANGKALAN") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 28 RAWAMERTA
        elseif ($alamat[$index] == "RAWAMERTA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 29 TELUKJAMBE BARAT
        elseif (($alamat[$index] == "TLJB") && ($alamat[$index+1] == "BARAT") ||
                ($alamat[$index] == "TLJB") && ($alamat[$index+1] == "BRT") ||
                ($alamat[$index] == "TELUKJAMBE") && ($alamat[$index+1] == "BARAT") ||
                ($alamat[$index] == "TELUKJAMBE") && ($alamat[$index+1] == "BRT")
                ) {
          $kec = "TELUKJAMBE BARAT";

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);


        }
        # 30 TIRTAJAYA
        elseif ($alamat[$index] == "TIRTAJAYA") {
          $kec = $alamat[$index];

          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);
        }
        /*else {
          $kec = "";
          $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                    null, '$no_pol', $plat, '$nama_pemilik',
                    '$alamat_pemilik', '$kec', 'KARAWANG', '$jenis',
                    '$merek', '$model_type', $tahun, '$tgl_bayar'
                  )";
          mysqli_query($conn, $query);
        }*/
      }
      /*if ($hasildata) $sukses++;
      else $gagal++;*/
    }

    $msg = "<div class='alert alert-success'><i class='ti-check'></i> DATA BERHASIL DI IMPOR. <a href='?nav=pemilik-kendaraan' class='btn btn-success'>LIHAT</a></div>";
  } else {
    $msg = "<div class='alert alert-danger'><h4><i class='ti-na'></i> ERROR!</h4> BERKAS TIDAK DIIJINKAN. SILAHKAN IMPOR BERKAS DENGAN TIPE .XLS</div>";
  }
}
?>

<div class="row">
  <div class="col-md-6">
    <div class="card ">
      <div class="content">
        <?php print $msg ?>
        <div class="alert alert-grey">
          Tipe berkas yang diijinkan adalah <strong>.XLS</strong>. Jika berkas bertipe <strong>.XLSX</strong>,
          silahkan ubah dengan cara:
          <ol>
            <li>Buka berkas menggunakan Ms.Excel</li>
            <li><em>Save as...</em></li>
            <li>Pilih tipe <strong>.XLS</strong></li>
          </ol>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="pilih">PILIH BERKAS .XLS</label>
            <input type="file" accept="application/vnd.ms-excel" class="form-control" name="berkas" id="pilih" required>
          </div>
          <button type="submit" class="btn btn-biru" name="upload"><i class="ti-import"></i> Import</button>
        </form>
      </div>
    </div>
  </div>
</div>
