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
  include 'layout/modal-impor.html';
  include 'layout/modal-stats.php';
  }
  ?>
</div>


</body>
<?php include 'layout/js.html'; ?>
</html>
