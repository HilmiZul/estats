<?php
if (!empty($_GET['kecamatan']) && !empty($_GET['bulan']) && !empty($_GET['tahun'])) {
  include '../smpro-con.php';
  // KAMUS BULAN :D
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

  $bulan = $_GET['bulan'];
  $tahun = $_GET['tahun'];
  $kec = $_GET['kecamatan'];
  $kec = str_replace('-', ' ', $kec);

  // KONVERSI KE INTEGER BIAR BISA DIGANTI
  // KE FORMAT BULAN TEXT DENGAN CARA NGAMBIL ELEMEN
  // DARI VARIABEL $month :P
  $bln = (int)$bulan;
  $bln = $bln - 1;

  header("Content-type:  application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=$kec-$month[$bln]-$tahun.xls");

  $selected = "selected";
  $q = mysqli_query($conn, "select * from tb_pemilik_kendaraan
                    where month(tgl_bayar)='$bulan' and year(tgl_bayar)='$tahun'
                    and kecamatan='$kec'
                    order by kecamatan, merek asc");
?>
  <table border="1">
    <thead>
      <tr>
        <th>NO.</th>
        <th>NO.POL</th>
        <th>PLAT</th>
        <th>NAMA PEMILIK</th>
        <th>ALAMAT</th>
        <th>KECAMATAN</th>
        <th>JENIS</th>
        <th>MEREK</th>
        <th>MODEL/TIPE</th>
        <th>TAHUN</th>
        <th>TANGGAL BAYAR</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $no = 0;
    while($row = mysqli_fetch_array($q)) {
      $no++;
    ?>
      <tr>
        <td><?php print $no?>.</td>
        <td><?php print $row['no_pol'] ?></td>
        <td><?php print $row['plat'] ?></td>
        <td><?php print $row['nama_pemilik'] ?></td>
        <td><?php print $row['alamat_pemilik']?></td>
        <td><?php print $row['kecamatan']?></td>
        <td><?php print $row['jenis']?></td>
        <td><?php print $row['merek']?></td>
        <td><?php print $row['model_type']?></td>
        <td><?php print $row['tahun']?></td>
        <td><?php print $row['tgl_bayar']?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
<?php
} else {
  header('Location: ?nav=stats');
} ?>
