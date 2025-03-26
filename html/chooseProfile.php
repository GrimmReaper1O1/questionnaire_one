<?php
$currentPath = dirname(__DIR__); 
include "includes/headerStyle2.php";
?>

<?php


$results = $cms->getMember()->selectStyles();
?>


<div class="heightHeader">
</div>
<div class="main marginAuto">


  <div class="width80 marginAuto centeredText">

    <?php
    if ($results !== false) {
      foreach ($results as $styles) {
        ?>
        <p>
          <a href="chooseProfile.php?update=yes&id=<?= $styles['id'] ?>"><?= $styles['profile_name'] ?></a><br>
        </p>

        <?php
      }
    }
    ?>
  </div>
</div>

<?php
if (isset($_SESSION['layoutOfSite']['disableMovingBars'])) {
  if ($_SESSION['layoutOfSite']['disableMovingBars'] == 0) {

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
