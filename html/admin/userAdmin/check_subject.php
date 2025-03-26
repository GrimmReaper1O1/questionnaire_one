<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1 || $_SESSION['administrator']['viewer'] == 1) {
  if (isset($_GET['classId'])) {
    $classId = $_GET['classId'];
    $_SESSION['classId'] = $classId;
  }
  if (isset($_GET['name'])) {
    $_SESSION['cName'] = $_GET['name'];
  }

  $start = microtime(true);
  $subjects = $cms->getQuestions()->selectUndertakenSubjects($_SESSION['ident'], $_SESSION['classId']);
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
echo $_SESSION['id'] . ' ' . $_SESSION['site']['cId'];

        foreach($subjects as $subject) {
          if ($subject['subject_information'] != 'empty') {
            ?>
            <h1>CLASS: <?= $_SESSION['cName'] ?></h1><br>
            <?php
            if(isset($_GET['a']) && $_SESSION['administrator']['admin'] == 1) {
              $averageClassScore = $cms->getQuestions()->findClassesAverageScoreAdminOnly($_SESSION['id'], $_SESSION['classId'], $arr);

              ?>

              <h2>AVERAGE SCORE FROM CLASS: <?= $averageClassScore ?><h2><br>
                <?php
              }
              if(isset($_GET['m']) && $_SESSION['administrator']['admin'] == 1) {
                $maxClassScore = $cms->getQuestions()->findClassesMaxScoreAdminOnly($_SESSION['id'], $_SESSION['classId'], $arr);
                ?>

                <h2>MAX SCORE FROM CLASS: <?= $maxClassScore ?><h2><br>
                  <?php
                }
                if(isset($_GET['l']) && $_SESSION['administrator']['admin'] == 1) {
                  $lastClassScore = $cms->getQuestions()->findClassesLastScoreAdminOnly($_SESSION['id'], $_SESSION['classId'], $arr);
                  ?>
                  <h2>LAST SCORE FROM CLASS: <?= $lastClassScore ?><h2><br>

                    <?php
                  }

                  if($_SESSION['administrator']['admin'] == 1) {
                    ?>

                    <a href="check_subject.php?a=yes">Check avarage score</a><br>
                    <a href="check_subject.php?m=yes">Check average max score</a><br>
                    <a href="check_subject.php?l=yes">Check average last score</a><br>
                    <?php
                  }
                  ?>

                  <a href="check_users_score_history.php?subject=<?=$subject['id'] ?? '' ?>&sName=<?= $subject['subject_information'] ?>"><?= $subject['subject_information'] ?? '' ?> </a><br><br>


                  <br>
                  <br>

                  <?php
                }
              }
              ?>
            </div>
          </div>
        </div>

        <?php
        if (isset($_SESSION['layoutOfSite']['enableMovingBars'])) {
          if ($_SESSION['layoutOfSite']['enableMovingBars'] == 0) {
            ?>
            <div id="rightLowerSidebar" class="rightLowerSidebar">

            </div>

            <?php

          }
        }

        ?>
      </div>
    </div>
    <div class="copyright">

    </div>
    <div>
      <?php include '../../includes/footer2.php'; ?>
    </div>
  </body>
  </html>
  <?php
} else {
  header("Location: ../../classes.php");
  exit;
}
