<div class="card">
  <div class="header">
    <h4 class="title"><i class="fa fa-bar-chart-o"></i> Grafik Simpulan</h4>
  </div>
  <div class="content">
    <?php $q_conclusion = mysqli_query($conn, "select kecamatan, count(merek) as jml_unit from tb_pemilik_kendaraan
                                where merek='TOYOTA' and
                                month(tgl_bayar) 
                                between '$bulan' and '$bulan_end'
                                group by kecamatan, merek
                                order by count(merek) desc");
    $count = mysqli_num_rows($q_conclusion); 

    // total seluruh kendaraan
    $q_total = mysqli_query($conn, "select * from tb_pemilik_kendaraan 
                        where merek = 'TOYOTA'");

    // total seluruh kendaraan rentang bulan
    $q_total_range = mysqli_query($conn, "select * from tb_pemilik_kendaraan 
                        where merek = 'TOYOTA' and
                        month(tgl_bayar)
                        between '$bulan' and '$bulan_end'");

    $total_kendaraan = mysqli_num_rows($q_total);
    $total_kendaraan_range = mysqli_num_rows($q_total_range);

    $bln_start = $bulan - 1;
    $bln_start = $month[$bln_start];
    $bln_end = $bulan_end - 1;
    $bln_end = $month[$bln_end];
    
    if ($count > 0) { ?>

    <h3>Total Kendaraan Bulan <?php print $bln_start ?> - <?php print $bln_end?>: <?php print $total_kendaraan_range?> unit.</h3>
    <h3>Total Kendaraan Sepanjang Periode: <?php print $total_kendaraan?> unit.</h3>
    <div id="chart"></div>

    <?php
      $chart_data = "";
      while ($r_chart = mysqli_fetch_assoc($q_conclusion)) {
        $label = $r_chart['kecamatan'];
        $value = $r_chart['jml_unit'];
        $chart_data .= "{label:'$label', value:$value}, ";
        // $chart_data[] = $r_chart;
      }
      $chart_data = substr($chart_data, 0, -2);
    } else {
      print "<em>Tidak ada data. Silahkan filter.</em>";
    }
    ?>
  </div>
</div>
