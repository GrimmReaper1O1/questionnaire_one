<?php


include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1 || $_SESSION['administrator']['viewer'] == 1) {
  $start = microtime(true);
  if (isset($_GET['id'])) {
    $_SESSION['ident'] = $_GET['id'];
  }
  if (isset($_GET['letter'])) {
    $_SESSION['letter'] = $_GET['letter'];
  }
  $limit = 10;

  $letterString = 'A B C D E F G H I J K L M N O P Q R S T U V W X Y Z';
  $letterArray = preg_split('/[\s]+/', $letterString);

  if (isset($_GET['unset'])) {
    unset($_SESSION['letter']);
    unset($_SESSION['page']);
  }

  $_SESSION['page'] = $_GET['page'] ?? 1;

  if (isset($_GET["letter"])) {
    $_SESSION['letter'] = $_GET['letter'];
  }

  if (isset($_SESSION['letter'])) {

    $classesArray = $cms->getQuestions()->selectUndertakenClassesViaLetter($_SESSION['ident'], $_SESSION['page'], $limit, $_SESSION['letter']);

    $totalResults = $classesArray[0]['count'];


    $totalPages = ceil($totalResults / $limit);

  }

  if (!isset($_SESSION['letter'])) {

    $classesArray = $cms->getQuestions()->selectUndertakenClasses($_SESSION['ident'], $_SESSION['page'], $limit);

    $totalResults = $classesArray[0]['count'];

    $totalPages = ceil($totalResults / $limit);



  }



  if (isset($classesArray)) {
    if ($classesArray[0] != false) {

      $totalResults = $classesArray[0]['count'];

      $totalPages = ceil($totalResults / $limit);
      ?>
      <div id="main" class="main">

        <div class="heightHeader">
        </div>
        <div class="mainbody">
          <div class="centeredText">
            <p><?php
            foreach($letterArray as $letters) { ?>
              <?= "-" ?><a href="check_class.php?unset=yes&letter=<?= $letters ?>"><?= $letters ?></a><?= "-" ?>

              <?php
            }
            ?>
            <br><a href="check_class.php?unset=yes">GO BACK TO ALPHABETICAL ORDER!</a></p><br>

            <?php



            foreach($classesArray[1] as $class) {

              ?>

              <h4>Class<br>
                <p><a href="check_subject.php?classId=<?= $class['class'] ?>&name=<?= $class['class_name'] ?>"><?= $class['class_name'] ?></a><p></h4><br><br>



                  <?php
                }
                ?>
              </div><?php
            }
          }
          ?>



          <div id="pagination">
            <?php


            echo "-";
            for ($i = 1; $i <= $totalPages; $i++) {
              echo '<a href="bioOne.php?page=' . $i . '">' . $i . '</a> - ';
            }
            ?>
          </div>
          <div class="addHeight"></div>
          <div class="addHeight"></div>
        </div>

        <?php
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
    </div>
    <?php

    $end = microtime(true);
    echo ($end - $start);
    ?>
    <div class="copyright">
 
    </div>
  </div>
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



?>
