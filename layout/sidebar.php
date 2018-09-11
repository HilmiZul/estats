<?php

if ($_GET['nav'] == 'dashboard' || empty($_GET['nav'])) {
  $dashboard_active = 'active';
}
elseif ($_GET['nav'] == 'pemilik-kendaraan') {
  $pk_active = 'active';
}
elseif ($_GET['nav'] == 'impor-data') {
  $impor_active = 'active';
}
elseif ($_GET['nav'] == 'stats') {
  $stats_active = 'active';
}
elseif ($_GET['nav'] == 'pengaturan') {
  $pengaturan_active = 'active';
}

?>

<div class="sidebar" data-background-color="white" data-active-color="danger">
  <div class="sidebar-wrapper">
    <div class="logo">
        <a href="#" class="simple-text">
            e-STATS.
        </a>
    </div>

    <ul class="nav">
        <li class="<?php print $dashboard_active?>">
          <a href="?nav=dashboard">
            <i class="ti-panel"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="<?php print $impor_active?>">
          <a href="?nav=impor-data">
            <i class="ti-import"></i>
            <p>Impor Data</p>
          </a>
        </li>
        <li class="<?php print $pk_active?>">
          <a href="?nav=pemilik-kendaraan">
            <i class="ti-view-list-alt"></i>
            <p>Pemilik Kendaraan</p>
          </a>
        </li>
        <li class="<?php print $stats_active?>">
          <a href="?nav=stats">
            <i class="ti-map-alt"></i>
            <p>Statistik</p>
          </a>
        </li>
        <li class="<?php print $pengaturan_active?>">
          <a href="?nav=pengaturan">
            <i class="ti-settings"></i>
            <p>Pengaturan</p>
          </a>
        </li>
    </ul>
  </div>
</div>
