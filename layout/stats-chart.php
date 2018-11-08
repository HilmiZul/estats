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
    $count = mysqli_num_rows($q_conclusion); ?>

    <div id="chart"></div>

    <?php
    if ($count > 0) {
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
