<?php
if (isset($_POST['simpan'])) {
  $pass_sekarang = $_POST['password_sekarang'];
  $pass_baru = $_POST['password_baru'];
  $re_pass_baru = $_POST['re_password_baru'];

  $q_pass_curr = mysqli_query($conn, "select passwd from tb_users
                where passwd=SHA1('$pass_sekarang')");
  $cek_pass_curr = mysqli_num_rows($q_pass_curr);
  if ($cek_pass_curr > 0) {
    if ($pass_baru == $re_pass_baru) {
      mysqli_query($conn, "update tb_users set passwd=sha1('$pass_baru') where uid=".$_SESSION['uid']."");
      $msg = "<div class='alert alert-success'>Password Berhasil diperbaharui!</div>";
    } else {
      $msg = "<div class='alert alert-danger'>Password baru tidak sama!</div>";
    }
  } else {
    $msg = "<div class='alert alert-danger'>Password sekarang salah!</div>";
  }
}
?>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="header">
        <h4 class="title"><i class="ti-unlock"></i> Sunting Katasandi</h4>
      </div>
      <div class="content">
        <?php print $msg;?>
        <form action="" method="post">
          <div class="form-group">
            <input type="password" class="form-control" name="password_sekarang" placeholder="Ketik password sekarang" autofocus required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password_baru" placeholder="Ketik password sekarang" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="re_password_baru" placeholder="Ketik ulang password sekarang" required>
          </div>
          <button type="submit" class="btn btn-biru" name="simpan"><i class="ti-save"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
