<?php
  require "../smpro-con.php";

  $tables = '*';

  //get all of the tables
  if($tables == '*'){
    $tables = array();
    $result = mysqli_query($conn, 'SHOW TABLES');
    while($row = mysqli_fetch_row($result)) {
      $tables[] = $row[0];
    }
  } else {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }

  //cycle through
  foreach($tables as $table) {
    $result = mysqli_query($conn, 'SELECT * FROM '.$table);
    $num_fields = mysqli_num_fields($result);

    $return.= 'DROP TABLE IF EXISTS '.'`'.$table.'`'.';';
    $row2 = mysqli_fetch_row(mysqli_query($conn, 'SHOW CREATE TABLE `'.$table.'`'));
    $return.= "\n\n".$row2[1].";\n\n";

    for ($i = 0; $i < $num_fields; $i++) {
      while($row = mysqli_fetch_row($result)){
        $return.= 'INSERT INTO `'.$table.'` VALUES(';
        for($j=0; $j<$num_fields; $j++) {
          $row[$j] = addslashes($row[$j]);
          $row[$j] = preg_replace("/\r\n/","\\r\\n",$row[$j]);
          if (isset($row[$j])) { $return.= '\''.$row[$j].'\'' ; } else { $return.= '\'\''; }
            if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
  } // foreach tutup

  //save file
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=backup-db-".date("Y-m-d").".sql");
  header("Pragma: no-cache");
  header("Expires: 0");
  print "$return";
?>
