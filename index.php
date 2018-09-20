<?php
include 'smpro-con.php';
include 'layout/head.php';
?>
<body>

<div class="wrapper">
  <?php
  if (empty($_SESSION['uid'])) {
    include 'layout/masuk.php';
  } else {
  include 'layout/sidebar.php';
  ?>
    <div class="main-panel">
      <?php
      include 'layout/nav.php';
      ?>
      <div class="content">
        <div class="container-fluid">
          <?php include 'content.php'; ?>
        </div>
      </div>
      <?php include 'layout/footer.html'; ?>
    </div>
  <?php
    if ($_GET['nav'] == 'stats') {
      include 'layout/tooltip-stats.php';
    } elseif ($_GET['nav'] == 'pemilik-kendaraan') {
      include 'layout/modal-impor.html';
      include 'layout/modal-pemilik-kendaraan.php';
    }
  } // END.ELSE.SESSION.GA.KOSONG ?>
</div>


</body>
<?php include 'layout/js.html'; ?>
</html>
