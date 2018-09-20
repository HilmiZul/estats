<?php
// LOOP.PER.KECAMATAN DULU
// DARI.TABEL tb_kecamatan
$q_kec = mysqli_query($conn, "select * from tb_kecamatan");
while ($r_kec = mysqli_fetch_array($q_kec)) {
  $rank = 0;
  $i = 0;
  $last_score = false;
  // NYARI.RANK.DARI.PENGGUNA.KENDARAAN.TOYOTA
  // DISETIAP.KECAMATAN.
  // =====
  // Q: APAKAH HARUS BIKIN QUERY MANUAL UNTUK
  // CEK SATU-PER-SATU KECAMATAN?
  // A: SOLUSI PRIMITIF ITU MAH WKWKK
  //
  // BARIS KOSONG DALAM QUERY DIBAWAH
  // NANTINYA DISI 'CLAUSA WHERE' HAHAHAA
  $q_rank = mysqli_query($conn, "select a.nama, b.merek, count(merek) as jumlah_unit from tb_pemilik_kendaraan b
                        inner join tb_peta a on a.nama=b.kecamatan
                        where a.nama='".$r_kec['nama']."'
                        group by a.nama, b.merek
                        order by count(merek) desc");
  // SEKRANG.DISINI.NGAPAIN? HAHA
  // .....

  while ($r_rank = mysqli_fetch_array($q_rank)) {
    $i++;
    if ($last_score != $r_rank['jumlah_unit']) {
      $last_score = $r_rank['jumlah_unit'];
      $rank = $r_rank['merek'];
    }

    if ($r_kec['nama'] == $r_rank['nama']) {
      // if ('TOYOTA' == $rank[1]) {
      //   $fill = "rgba(70, 255, 70, .5)";
      // } elseif ('TOYOTA' == $rank[2]) {
      //   $fill = "rgba(70, 255, 200, .5)";
      // } else {
      //   $fill = "rgba(200, 50, 50, .5)";
      // }
    }
  }



} // TUTUP.WHILE.KECAMATAN
