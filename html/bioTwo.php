<?php
$currentPath = dirname(__DIR__); 
include "includes/header3.php";

if (isset($_GET['class'])) {
  $classId = $_GET['class'];
  $_SESSION['site']['cId'] = $classId;
}
if (isset($_GET['name'])) {
  $_SESSION['cName'] = $_GET['name'];
}
$start = microtime(true);
$subjects = $cms->getQuestions()->selectUndertakenSubjects($_SESSION['id'], $_SESSION['site']['cId']);
echo '<br><br>';
$counter = 0;
if ($_SESSION['administrator']['admin'] == 1) {
  foreach($subjects as $subject) {
    if ($subject['subject_information'] != 'empty') {
      $arr[$counter]['id'] = $subject['table_id'];

    }
  }
}




?>
<div id="main" class="main">
  <div class="heightHeader">
  </div>
  <div class="mainbody">
    <div class="centeredText">
      <?php

      foreach($subjects as $subject) {
        if ($subject['subject_information'] != 'empty') {
          ?>
          <h1>CLASS: <?= $_SESSION['cName'] ?></h1><br>
          <?php
          if(isset($_GET['a']) && $_SESSION['administrator']['admin'] == 1) {
            $averageClassScore = $cms->getQuestions()->findClassesAverageScoreAdminOnly($_SESSION['id'], $_SESSION['site']['cId'], $arr);

            ?>

            <h2>AVERAGE SCORE FROM CLASS: <?= $averageClassScore ?><h2><br>
              <?php
            }
            if(isset($_GET['m']) && $_SESSION['administrator']['admin'] == 1) {
              $maxClassScore = $cms->getQuestions()->findClassesMaxScoreAdminOnly($_SESSION['id'], $_SESSION['site']['cId'], $arr);
              ?>

              <h2>Max SCORE FROM CLASS: <?= $maxClassScore ?><h2><br>
                <?php
              }
              if(isset($_GET['l']) && $_SESSION['administrator']['admin'] == 1) {
                $lastClassScore = $cms->getQuestions()->findClassesLastScoreAdminOnly($_SESSION['id'], $_SESSION['site']['cId'], $arr);
                ?>
                <h2>Last SCORE FROM CLASS: <?= $lastClassScore ?><h2><br>

                  <?php
                }


                if($_SESSION['administrator']['admin'] == 1) {
                  ?>

                  <a href="bioTwo.php?a=yes">Check avarage score</a><br>
                  <a href="bioTwo.php?m=yes">Check average max score</a><br>
                  <a href="bioTwo.php?l=yes">Check average last score</a><br><br><br>
                  <?php
                }
                ?>
                <h2>
                  <a href="bioThree.php?subject=<?=$subject['id'] ?? '' ?>&sName=<?= $subject['subject_information'] ?>"><?= $subject['subject_information'] ?? '' ?> </a><br><br>
                </h2>

                <br>
                <br>
              </div>
              <div style="height: 400px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
  }
}
if (isset($_SESSION['layoutOfSite']['enableMovingBars'])) {
  if ($_SESSION['layoutOfSite']['enableMovingBars'] == 1) {

    ?>
    <div id="rightLowerSidebar" class="rightLowerSidebar">

    </div>

    <?php

  }
}

?>
</div>

<div class="copyright">
  <?php
  include "includes/footer.php";
  ?>
</div>
</body>
</html>
