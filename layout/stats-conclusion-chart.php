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
  print "<em>Tidak ada data. Silahkan filter.";
}
?>
