<?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

if ($_SESSION['administrator']['admin'] == 1) {





  if (isset($_GET['makeLive']) || isset($_SESSION['subject'])) {
    $subject = $cms->getQuestions()->selectSubjectViaTableIdNSAndClassId($_SESSION['subject']);
    if (($_GET['sid'] == $subject['table_id'] && $subject['live'] == 0) ) {

      $enter = 1;

    }
  } else {
    header("Location: questionAndAnswers.php");
    exit;
  }




  if (isset($_GET['delete']) && $enter == 1) {
    $result = $cms->getQuestions()->deleteQuestion($_GET['delete']);
    if ($result > 0) {
      $error .= "THE DELETION WAS A SUCCESS!";
    } else {
      $error .= "THE DELETION WAS NOT SUCCESSFULL.";
    }
  }






} else {
  header("Location: ../classes.php");
  exit();
}
?>
<div>
  <?php
  include '../includes/footer2.php';
  ?>
</div>
</body>
</html>
