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

    // DATA YANG UDAH DI FILTER, MASUKKIN KE TABEL
    // ENGGA DI FILTER LAGI. LANGSUNG MASUKIN KE TABEL
    for ($i=2; $i<=$hasildata; $i++) {
      $no_pol = $data->val($i,2);
      $plat = $data->val($i,3);
      $nama_pemilik = $data->val($i,4);
      $alamat_pemilik = $data->val($i,5);
      $kecamatan = $data->val($i,6);
      $jenis = $data->val($i,7);
      $merek = $data->val($i,8);
      $model_type = $data->val($i,9);
      $tahun = $data->val($i,10);
      $tgl_bayar = $data->val($i,11);
      $tgl_bayar = date_create($tgl_bayar);
      $tgl_bayar = date_format($tgl_bayar, 'Ymd');

      $query = "INSERT INTO tb_pemilik_kendaraan  VALUES (
                null, \"$no_pol\", $plat, \"$nama_pemilik\",
                \"$alamat_pemilik\", \"$kecamatan\", \"KARAWANG\", \"$jenis\",
                \"$merek\", \"$model_type\", $tahun, $tgl_bayar
              )";
      mysqli_query($conn, $query);
    }
    // END.FOR
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
            <input type="file" accept="application/vnd.ms-excel" class="btn btn-default" name="berkas" id="pilih" required>
          </div>
          <button type="submit" class="btn btn-biru" name="upload"><i class="ti-import"></i> Import</button>
        </form>
      </div>
    </div>
  </div>
</div>
