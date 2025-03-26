<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['root'] == 1 || $_SESSION['administrator']['viewer'] == 1) {
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST['firstName'] ? $_POST['firstName'] : NULL;
    $lastName = $_POST['lastName'] ? $_POST['lastName'] : NULL;
    $error = '';
    $email = $_POST['email'] ? $_POST['email'] : NULL;
    if ($email != NULL && $firstName == NULL && $lastName == NULL) {
      $array = $cms->getMember()->selectViaEmailArray($email);
      if ($array == false) {
        $error .= "THERE WAS A PROBLEM THE INFORAMTION COULD NOT BE FOUND.";
      }
    }
    if ($email == NULL && $firstName != NULL && $lastName != NULL) {
      $array = $cms->getMember()->selectViaFirstLastName($firstName, $lastName);
      if ($array == false) {
        $error .= "THERE WAS A PROBLEM. THE INFORMATION COULD NOT BE FOUND.";
      }
    }
    if ($email == NULL && $firstName != NULL && $lastName == NULL) {
      $array = $cms->getMember()->selectViaFirst($firstName);
      if ($array == false) {
        $error .= "THERE WAS A PROBLEM. THE INFORMATION COULD NOT BE FOUND.";
      }
    }

    if ($email != NULL && ($firstName != NULL || $lastName != NULL)) {
      $error .= "YOU MAY NOT ENTER EITHER NAMES AND EMAIL TOGETHER.";
    }
    if ($email == NULL && $firstName == NULL && $lastName != NULL) {
      $array = $cms->getMember()->selectViaLast($lastName);

    }
  }

  ?><div id="main" class="main">

    <div class="heightHeader">
    </div>
    <div class="mainbody">
      <div class="centeredText">
        <?= $error ?? '' ?>
      </div>
      <br>
      <br>
      <br>
      <br>
      <div style="padding-right: 25px;"  class="margin20">


        <form  action="search_via_email.php" method="POST">
          <div class="settings"><label name="email">USERNAME:<label></div><div class="settings0"><input  type="text" name="email" size="20"></div><br>
            <div class="settings"><label name="firstName">FIRST NAME:<label></div><div  class="settings0"><input  type="text" name="firstName" ></div><br>
              <div class="settings"><label name="lastName">LAST NAME:<label></div><div class="settings0"><input type="text" name="lastName" ></div><br>
                <div class="submit-middle"><br><input type="submit" value="SUBMIT!"></div><br>
              </form>

              <br><br>
            </div>
            <div class="margin60">
              <div class="centeredText">
                <?php

                if (isset($array)) {
                  if ($array != false) {
                    if (isset($array[0])) {
                      foreach($array as $info) {
                        ?>
                        <a href="check_class.php?id=<?= $info['user_id'] ?>&ident=y">
                          <?php if ($_SESSION['administrator']['root'] == 1) { ?>
                            USERNAME:<?= $info['email'] ?><br><?php } ?>
                            <br>
                            FULL NAME:<?= $info['concat_full_name'] ?><br>
                            <?php
                            if ($_SESSION['administrator']['viewer'] == 1 || $_SESSION['administrator']['root']) { ?>
                              PHONE NUMBER:<?= $info['phone_number'] ?></a> <br> <?php } ?>
                              <br>
                              <?php
                              if ($info['admin'] != 1) { ?>
                                <a href="resetPassword.php?resetpassword=yes&id=<?= $info['user_id'] ?>">RESET PASSWORD!</a>
                              <?php } elseif ($info['admin'] == 1 && $_SESSION['administrator']['root'] == 1) {
                                ?>
                                <a href="resetPassword.php?resetpassword=yes&id=<?= $info['user_id'] ?>">RESET PASSWORD!</a>
                                <?php
                              } ?>
                              <br>
                              <?php
                            }} else {
                              ?>
                              <a href="check_class.php?id=<?= $array['user_id'] ?>&ident=y">
                                <?php if ($_SESSION['administrator']['root'] == 1) { ?>
                                  USERNAME:<?= $array['email'] ?><br> <?php } ?>

                                  FULL NAME:<?= $array['concat_full_name'] ?><br><?php
                                  if ($_SESSION['administrator']['root'] == 1) { ?>
                                    PHONE NUMBER:<?= $info['phone_number'] ?></a><br> <?php } ?>

                                    <?php
                                  }




                                }
                              }
                              ?>
                            </div>
                            <div style="height: 1600px;">
                            </div>
                          </div>
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
