<?php

if ($_GET['nav'] == 'dashboard' || empty($_GET['nav'])) {
  include 'layout/dashboard.php';
}
elseif ($_GET['nav'] == "keluar") {
  include 'layout/keluar.php';
}
elseif ($_GET['nav'] == "pemilik-kendaraan") {
  include 'layout/pemilik-kendaraan.php';
}
elseif ($_GET['nav'] == "impor-data") {
  include 'layout/impor-data.php';
}
elseif ($_GET['nav'] == "stats") {
  include 'layout/stats.php';
}
elseif ($_GET['nav'] == "pengaturan") {
  if ($_GET['sunting'] == 'true') {
    include 'layout/sunting-pengguna.php';
  } else {
    include 'layout/pengaturan.php';
  }
}
