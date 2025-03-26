<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['root'] == 1) {


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unixTime = strToTime($_POST['date']);

    $result = $cms->getMember()->deletePreviousUsers($unixTime);

    if ($result > 0) {
      $error = 'There were ' . $result . ' users deleted!';
    } else {
      $error = 'No users were deleted.';
    }

  }




  ?>
  <div class="heightHeader"></div>
  <div class="main mainbody">
    <br><br><br>

    <?php if (isset($_GET['remove'])) { ?>


      <h4><?= $error ?></h4>




    <?php } ?>


    <?php if (!isset($_GET['remove'])) { ?>


      <h4>PLEASE SELECT THE DATE FROM WHICH ALL PREVIOUS USERS SHOULD BE DELETED.</h4>
      <br>
      <form id="form1" action="removePreviousUsers.php?remove=yes" method="POST">
        <input type="date" name="date"><br>
        <button type="submit" form="form1">DELETE ALL USERS</button>
      </form>





    <?php } ?>


    <div style="height: 100px;"></div>
    <div class="addHeight"></div>
  </div>



  <?php include '../../includes/footer2.php'; ?>
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
</body>
</html>
<?php
} else {
  header('Location: ../../classes.php');
}
