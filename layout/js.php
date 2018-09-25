<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="plugin/dataTables/js/jquery.dataTables.js"></script>
<script src="plugin/dataTables/js/dataTables.bootstrap.js"></script>
<script src="plugin/dataTables/js/dataTables.responsive.js"></script>
<script src="lib/raphael/raphael-min.js"></script>
<script src="lib/morris/js/morris.min.js"></script>
<script type="text/javascript" src="plugin/tooltipster/js/tooltipster.bundle.js"></script>
<script type="text/javascript" src="plugin/tooltipster/js/tooltipster-follower.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
  // DATATABLES.PEM.KENDARAAN
  $('#dataTables').DataTable({
      responsive: true
  });

  // TOOLTIP.UNTUK.DETIL.STATS
  for(var i=0; i<30; i++) {
    $('#tooltip-'+i).tooltipster({
      theme: 'tooltipster-shadow',
      plugins: ['follower'],
      anchor: 'top-left',
      offset: [20, -20]
    });
  }
});
</script>

<script type="text/javascript">
 Morris.Donut({
 element: 'chart',
 data: [
   // {label:'TELUKJAMBE TIMUR', value:24},{label:'KARAWANG BARAT', value:19},{label:'TALAGASARI', value:9},{label:'MAJALAYA', value:8},{label:'CIAMPEL', value:6},{label:'RAWAMERTA', value:4},
   <?php print $chart_data; ?>
 ],
});
</script>
