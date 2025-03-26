<?php
$currentPath = dirname(__DIR__);
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {
  $descript = $_POST['classDescription'] ?? '';
  $name = $_POST['className'] ?? '';
  $verrified = $_POST['verrified'] ?? '';

  $error = "";

  $row = false;

  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($descript === '') {
      $error .= "The description is empty. <br>";
    }

    if ($name === '') {
      $error .= "You must fill in both class number fields. <br>";
    }

    if ($verrified === '') {
      $error .= "You must ensure the information entered is correct and the verrified checkbox is checked. <br>";
    }



    if ($descript != "" && $name != '' && $verrified != '') {
      $row = $cms->getMember()->getClassRowViaName($name);
    }
    print_r($row);
    if ($descript != '' && strlen($descript) > 6 && $name != '' && strlen($name) > 1 && $verrified != '' && $row == false) {
      try {
        $result = $cms->getMember()->insertIntoClass($descript, $name, $_SESSION['id']);
        $error .= "The action was completed successfully! ";
      }  catch(Exception $e) {
        try {
          $row = $cms->getMember()->selectClassRowViaName($name);
          $count1 = $cms->getMember()->deleteClassFromTable($row['class_id']);
          $count2 = $cms->getMember()->deleteClassFromClasses($row['class_id']);
          if ($count1 < 1 || $count2 < 1) {
            $error .= "There is likely a problem with the server or there is already another entry with that name. <br>";
          } } catch(Exception $e) {

            $error .= "There is likely a problem with the server. <br>";
            $error .= "It may require you delete the class in the administrative pages.";
            $error .= "Please try again or try another name. <br> ";
          }
        }
      } else {

        $error .= "The information wasn't entered in correctly or the class already exists. Are you missing a field or checkbox? ";

      }

    }

    ?>
    <div id="main" class="main">

      <div class="heightHeader">
      </div>
      <div class="mainbody">
        <div class="centered">
          <?php

          echo "<p>" . $error . "</p>";
          ?>
        </div>
        <div class="margin80">
          <!-- needs work -->
          <fieldset class="fieldset01">
            <form action="create_new_class.php" method="POST">
              <label for="className">Class name:</label><br><input class="width100" type="text" name="className" value="<?= $name ?? "" ?>"><br>
              <label for="classDescription">Class description:</label><br>
              <textarea style="height: 60%" class="width100" rows='30' name='classDescription'><?= $descript ?? "" ?></textarea><br>
              <label for="verrified">I have verrified the information is correct:</label><br>
              <input type="checkbox" name="verrified">
              <input class="submit-middle" type="submit" value="SUBMIT!">
            </form>
          </fieldset>
          <div style="height: 1200px;">
          </div>
        </div>
      </div>
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

} else {
  header("Location: ../../classes.php");
  exit();
}
?>
<div>
  <?php include '../../includes/footer2.php'; ?>
</div>
</body>
</html>
