<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <?php
            if ($_GET['nav'] == 'dashboard' || empty($_GET['nav'])) {
              print "<span class='navbar-brand'>Dashboard</span>";
            }
            elseif ($_GET['nav'] == 'pemilik-kendaraan') {
              print "<span class='navbar-brand'>Pemilik Kendaraan</span>";
            }
            elseif ($_GET['nav'] == 'impor-data') {
              print "<span class='navbar-brand'>Impor Data</span>";
            }
            elseif ($_GET['nav'] == 'stats') {
              if ($_GET['detil'] == 'true') {
                print "<span class='navbar-brand'>Rincian Statistik</span>";
              } else {
                print "<span class='navbar-brand'>Statistik</span>";
              }
            }
            elseif ($_GET['nav'] == 'pengaturan') {
              if ($_GET['sunting'] == 'true') {
                print "<span class='navbar-brand'>Sunting Pengguna</span>";
              } else {
                print "<span class='navbar-brand'>Pengaturan</span>";
              }
            }
            ?>

        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a>Halo, <?php print $_SESSION['fullname']?></a></li>
              <li>
                <a href="?nav=keluar">
                  KELUAR
                </a>
              </li>
            </ul>
        </div>
    </div>
</nav>
