<?php
$get_uid = $_GET['uid'];
$q = mysqli_query($conn, "select * from tb_users where uid=$get_uid");
$user = mysqli_fetch_assoc($q);
?>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="content">
        <form action="" method="post">
          <input type="hidden" value="<?php print $_GET['uid']?>" name="uid">
          <div class="form-group">
            <input type="text" class="form-control" name="uname" value="<?php $user['uname']?>">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
