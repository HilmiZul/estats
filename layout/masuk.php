<?php
if (isset($_POST['masuk'])) {
  $uname = $_POST['uname'];
  $passwd = $_POST['passwd'];

  $q = mysqli_query($conn, "select * from tb_users
                    where uname='$uname' and passwd=SHA1('$passwd')");
  $result = mysqli_num_rows($q);
  if ($result > 0) {
    $sesi = mysqli_fetch_assoc($q);

    $_SESSION['uid'] = $sesi['uid'];
    $_SESSION['uname'] = $sesi['uname'];
    $_SESSION['fullname'] = $sesi['fullname'];
    $_SESSION['role'] = $sesi['role'];

    header('Location: ?nav=dashboard');
  } else {
    $msg = "<div class='alert alert-danger'>Username dan Password tidak cocok.</div>";
  }
}
?>
<section class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center">E-STATS.</h2> 
        <div class="card">
          <div class="content">
            <?php print $msg; ?>
            <form action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="uname" placeholder="Username" required autofocus>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="passwd" placeholder="Password" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-biru" name="masuk"><i class="fa fa-sign-in"></i> Masuk</button>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
