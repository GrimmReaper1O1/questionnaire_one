<?php
include "../includes/header_others.php";
if ($_SESSION['administrator']['admin'] = 1) {
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $limit = 1;
  $error = '';


  if (isset($_SESSION['caseNum404'])) {

    $row = $cms->getMember()->getRowCountUsers2($_SESSION['caseNum404']);
    $totalRecords = $row['count'];
    // $page = intval($page);
    $totalPages = ceil($totalRecords / $limit);




    $offset = ($page - 1) * $limit;

    $sql = "SELECT *, concat(first_name, ', ', middle_name, ', ', last_name) as concat_full_name, case when agree = 1 then 'YES!' else 'NO!' end as agree2, case when accepted = 1 THEN 'YES!' ELSE 'NO!' END AS accepted2  from users where case_id LIKE :caseNum order by last_name, first_name desc offset $offset ROWS FETCH NEXT $limit ROWS ONLY";
    $stmt = $cms->db->prepare($sql);
    $stmt->bindValue('caseNum', $_SESSION['caseNum404']);

    $stmt->execute();
    $rows = $stmt->fetchAll();

    if ($row == false || $rows == false) {
      $error = "There was a problem gathering your information. You may have selected a case that doesn't exist. <br>";

    }




  }







  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['caseNum404'] = $_POST['caseNum'];
    $row = $cms->getMember()->getRowCountUsers2($_POST['caseNum']);
    $totalRecords = $row['count'];
    $page = intval($page);
    $totalPages = ceil($totalRecords / $limit);

    $offset = ($page - 1) * $limit;
    if ($offset = -0) {
      $offset = 0;
    }


    $sql = "SELECT *, concat(first_name, ', ', middle_name, ', ', last_name) as concat_full_name, case when agree = 1 then 'YES!' else 'NO!' end as agree2, case when accepted = 1 THEN 'YES!' ELSE 'NO!' END AS accepted2 from users where case_id LIKE :caseNum order by last_name, first_name desc offset $offset ROWS FETCH NEXT $limit ROWS ONLY";
    $stmt = $cms->db->prepare($sql);
    $stmt->bindValue('caseNum', $_POST['caseNum']);

    $stmt->execute();
    $rows = $stmt->fetchAll();
    if ($row == false || $rows == false) {
      $error = "There was a problem gathering your information. You may have selected a case that doesn't exist. <br>";

    }

  }

  echo $error;
  ?>
  <form action="list_users_via_case.php" method="POST">
    <label name="caseNum">Case number:<label>
      <input type="text" name="caseNum"><br>
      <input type="submit" value="SUBMIT!"><br>
    </form>
    <?php
    if (isset($rows)) {
      if ($rows != false) {
        foreach ($rows as $row) {?>
          User: <?= $row['email'] ?><br>
          Full name:<?= $row['concat_full_name'] ?><br>
          Case: <?= $row['case_id'] ?> <br>
          Accepted: <?= $row['accepted2'] ?> <br>
          Agreed to contract: <?= $row['agree2'] ?><br>
          <a href="delete_account_passthrough.php?id=<?= $row['user_id'] ?>">Delete account!</a><br><br>
        <?php }


        if (isset($_GET['page'])) {
          $i = $_GET['page'];
        } else {
          $i = "1";
        }
        echo "<br>";
        for ($i = 1; $i <= $totalPages; $i++) {
          echo "<a href='list_users_via_case.php?page=" . $i . "'>" . $i . " - </a>";

        }}}
      } else {
        header("Location: how_dare_you.php");
        exit();
      }
