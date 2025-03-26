<?php
include '../src/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  for($i = 1; $i < 31; $i++) {
    $sql = "insert into  tables (subject_information) values ('empty')";
    $stmt = $cms->db->prepare($sql);
    $stmt->execute();
  }
  echo "Completed";
}
?>
<form action="initialize.php" method="POST">
  <input type="submit" value="INITIALIZE!">
</form>
