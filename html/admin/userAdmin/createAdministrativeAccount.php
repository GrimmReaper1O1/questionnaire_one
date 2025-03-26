<?php
$currentPath = rtrim(__DIR__, DIRECTORY_SEPARATOR); include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1) {
  $timestamp = date("Y/m/d h:i:sa");
  $createAdmin = $_POST['create_administrative_account'] ?? '';
  $getRoot = $_POST['allow_root_privilages'] ?? '';
  $allowAlter = $_POST['set_allow_alter_evidence'] ?? '';
  $allowDelete = $_POST['set_allow_delete_evidence'] ?? '';
  $allowDeleteAll = $_POST['allow_delete_all_evidence_from_email'] ?? '';
  $alterAccount = $_POST['alter_administrative_account'] ?? '';
  $denyRoot = $_POST['deny_root_privilages'] ?? '';
  $denyAlter = $_POST['set_deny_alter_evidence'] ?? '';
  $denyDelete = $_POST['set_deny_delete_evidence'] ?? '';
  $denyDeleteAll = $_POST['deny_delete_all_evidence_from_email'] ?? '';
  $deleteAccount = $_POST['delete_account'] ?? '';

  $aA = 0; // allow alter
  $aD = 0; // allow delete
  $aDA = 0; // allow delete all
  $dA = 0; // deny alter
  $dD = 0; // deny delete
  $dDA = 0; // deny delete all
  $dR = 0; // deny root
  $gR = 0; // allow root or get root
  $c = 0; // create admin account
  $a = 0; // alter account either user or admin
  $f = 0; // failure
  $fR = 0; // failure root
  $fA = 0; // failure administrator
  $fU = 0; // failure user
  $fAC = 0; // failure administrator create
  $fAA = 0; // failure administrative account
  $wFTD = 0; // wrong field to delete
  $cD = 0; // can't delete
  $fDN = 0; // failure do nothing
  $fMCO = 0; // failure must choose options
  $fRR = 0; // failure Root deny Root selected
  $error = '';




  if ($alterAccount != '') {
    $ident = $cms->getMember()->selectAdminViaEmail($alterAccount);
    $row = $cms->getMember()->getRowViaEmail($alterAccount);

    if ($row != false) {
      $a = 1;

    }else {
      $fU = 1; }

      if ($ident != false) {
        $a = 1;
      }


    }


    if ($createAdmin !== '') {
      $ident = $cms->getMember()->selectAdminViaemail($createAdmin);
      if ($ident == false) {

        $row = $cms->getMember()->getRowViaEmail($createAdmin);

        if ($row != false) {
          $c = 1;

        } else { $fU = 1;}
      } else {$fAC = 1;}
    }






    // the bug is in regards to the conditional statement below.



    if ($c === 1 && $deleteAccount !== '') {
      $wFTD = 1;
    }

    if ($c === 1 || $a === 1) {
      if ($deleteAccount != '' && ($getRoot != '' || $allowAlter != '' || $allowDelete != '' || $allowDeleteAll != '' || $denyRoot != '' ||
      $denyAlter != '' || $denyDelete != '' || $denyDeleteAll != '')) {
        $cD = 1;
      }
      if ($alterAccount !== '' && $deleteAccount != '' && ($getRoot == '' && $allowAlter == '' && $allowDelete == '' && $allowDeleteAll == '' &&
      $denyAlter == '' && $denyDelete == '' && $denyDeleteAll == '')) {
        $_SESSION['alterAccount'] = $row['user_id'];
        header('Location:delete_account.php');
        exit();
      }

    }





    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if ($c === 1) {

        if ( $createAdmin !== '' && ($getRoot == '' && $allowAlter == '' && $allowDelete == '' && $allowDeleteAll == '' && $deleteAccount == '' && $denyRoot == '' &&
        $denyAlter == '' && $denyDelete == '' && $denyDeleteAll == '')) {
          $fDN = 1;

        }
        if ($getRoot !== '' && $createAdmin !== '' && ($allowAlter != '' || $allowDelete != '' || $allowDeleteAll != '' || $deleteAccount != '')) {
          $fR = 1;
          $c = 0;
        }
        if ($getRoot !== '' && $createAdmin !== '' && $allowAlter == '' && $allowDelete == '' && $allowDeleteAll == '' && $deleteAccount == '') {
          $gR = 1;

        }

        if ($getRoot == '' && $createAdmin !== '' && $allowAlter != '' && $allowDelete == '' && $allowDeleteAll == '' && $deleteAccount == '') {
          $aA = 1;


        }
        if ($getRoot == '' && $createAdmin !== '' && $allowAlter == '' && $allowDelete != '' && $allowDeleteAll == '' && $deleteAccount == '') {
          $aD = 1;

        }
        if ($getRoot == '' && $createAdmin !== '' && $allowAlter !== '' && $allowDelete != '' && $allowDeleteAll == '' && $deleteAccount == '') {
          $aD = 1;
          $aA = 1;
        }
        if ($getRoot == '' && $createAdmin !== '' && $allowAlter == '' && $allowDelete == '' && $allowDeleteAll !== '' && $deleteAccount == '') {
          $aDA = 1;

        }
        if ($getRoot == '' && $createAdmin !== '' && $allowAlter !== '' && $allowDelete == '' && $allowDeleteAll != '' && $deleteAccount == '') {
          $aA = 1;
          $aDA = 1;

        }

        if ($getRoot == '' && $createAdmin != '' && $allowAlter == '' && $allowDelete != '' && $allowDeleteAll != '' && $deleteAccount == '') {
          $aD = 1;
          $aDA = 1;

        }

        if ($getRoot == '' && $createAdmin !== '' && $allowAlter != '' && $allowDelete !== '' && $allowDeleteAll != '' && $deleteAccount == '') {
          $aA = 1;
          $aD = 1;
          $aDA = 1;

        }



      }













      if ($a === 1) {
        if ( $alterAccount !== '' && ($getRoot == '' && $allowAlter == '' && $allowDelete == '' && $allowDeleteAll == '' && $deleteAccount == '' && $denyRoot == '' &&
        $denyAlter == '' && $denyDelete == '' && $denyDeleteAll == '')) {
          $fDN = 1;
        }
        if ($getRoot !== '' && $alterAccount !== '' && ($allowAlter != '' || $allowDelete != '' || $allowDeleteAll != '' || $deleteAccount != '')) {
          $fR = 1;
        }
        if ($getRoot !== '' && $alterAccount !== '' && $allowAlter == '' && $allowDelete == '' && $allowDeleteAll == '' && $deleteAccount == '') {
          $gR = 1;
        }
        if ($getRoot !== 'on') {
          if ($getRoot == '' && $alterAccount !== '' && $allowAlter != '' && $allowDelete == '' && $allowDeleteAll == '' && $deleteAccount == '') {
            $aA = 1;


          }
          if ($getRoot == '' && $alterAccount !== '' && $allowAlter == '' && $allowDelete != '' && $allowDeleteAll == '' && $deleteAccount == '') {
            $aD = 1;

          }
          if ($getRoot == '' && $alterAccount !== '' && $allowAlter !== '' && $allowDelete != '' && $allowDeleteAll == '' && $deleteAccount == '') {
            $aD = 1;
            $aA = 1;
          }
          if ($getRoot == '' && $alterAccount !== '' && $allowAlter == '' && $allowDelete == '' && $allowDeleteAll !== '' && $deleteAccount == '') {
            $aDA = 1;

          }
          if ($getRoot == '' && $alterAccount !== '' && $allowAlter !== '' && $allowDelete == '' && $allowDeleteAll != '' && $deleteAccount == '') {
            $aA = 1;
            $aDA = 1;

          }

          if ($getRoot == '' && $alterAccount != '' && $allowAlter == '' && $allowDelete != '' && $allowDeleteAll != '' && $deleteAccount == '') {
            $aD = 1;
            $aDA = 1;

          }

          if ($getRoot == '' && $alterAccount !== '' && $allowAlter != '' && $allowDelete !== '' && $allowDeleteAll != '' && $deleteAccount == '') {
            $aA = 1;
            $aD = 1;
            $aDA = 1;

          }

        }
      }










      if ($a === 1) {

        if ($denyRoot !== '' && $alterAccount !== '' && ($denyAlter != '' || $denyDelete != '' || $denyDeleteAll != '')) {
          $fR = 1;

        }
        if ($denyRoot !== '' && $alterAccount !== '' && $denyAlter == '' && $denyDelete == '' && $denyDeleteAll == '') {
          $dR = 1;
        }

        if ($denyRoot == '' && $alterAccount !== '' && $denyAlter !== '' && $denyDelete == '' && $denyDeleteAll == '') {
          $dA = 1;

        }
        if ($denyRoot == '' && $alterAccount !== '' && $denyAlter == '' && $denyDelete != '' && $denyDeleteAll == '') {
          $dD = 1;

        }
        if ($denyRoot == '' && $alterAccount !== '' && $denyAlter !== '' && $denyDelete != '' && $denyDeleteAll == '') {
          $dA = 1;
          $dD = 1;
        }
        if ($denyRoot == '' && $alterAccount !== '' && $denyAlter == '' && $denyDelete == '' && $denyDeleteAll != '') {
          $dDA = 1;

        }
        if ($denyRoot == '' && $alterAccount !== '' && $denyAlter != '' && $denyDelete == '' && $denyDeleteAll != '') {
          $dA = 1;
          $dDA = 1;

        }
        if ($denyRoot == '' && $alterAccount !== '' && $denyAlter == '' && $denyDelete != '' && $denyDeleteAll != '') {
          $dD = 1;
          $dDA = 1;


        }
        if ($denyRoot == '' && $alterAccount !== '' && $denyAlter !== '' && $denyDelete != '' && $denyDeleteAll != '') {
          $dA = 1;
          $dD = 1;
          $dDA = 1;

        }

      }








      if ($c == 1) {
        try {
          if ($c === 1 && ($getRoot != '' || $allowAlter != '' || $allowDelete != '' || $allowDeleteAll != '' || $denyRoot != '' || $denyAlter != '' ||
          $denyDelete != '' || $denyDeleteAll != '')) {
            $created = $cms->getMember()->createAdmin($row['user_id'], $_SERVER['REMOTE_ADDR'], $row['user_id'], $timestamp);

          } else { $fMCO = 1; }
        }
        catch(Exception $e) {
          $error .= "There was a problem. The administrative account could not be inserted. <br>";
        }





        if ($gR === 1 && ($aD === 1 || $aDA === 1 || $aA === 1 || $dD === 1 || $dDA === 1 || $dA === 1 )) {

          $fR = 1;
        }


        if ($gR === 1 && ($aD === 0 || $aDA === 0 || $aA === 0 || $dD === 0 || $dDA === 0 || $dA === 0 )) {
          $set0 = $cms->getMember()->updateSetRootPrivilagesViaUserId($row['user_id']);
          if ($set0 === 0) {
            $f = 1; }  }
            if ($gR === 0 && ($aD === 1 || $aDA === 1 || $aA === 1 || $dD === 1 || $dDA === 1 || $dA === 1 )) {


              if ($aD === 1)
              {
                $set1 = $cms->getMember()->updateAllowDeleteEvidenceViaUserId($row['user_id']);
                if ($set1 === 0) {
                  $f = 1; }
                }
                if ($aDA === 1)
                {
                  $set2 = $cms->getMember()->updateAllowDeleteAllEvidenceViaUserId($row['user_id']);
                  if ($set2 === 0) {
                    $f = 1; }
                  }
                  if ($aA === 1)
                  {
                    $set3 = $cms->getMember()->updateAllowAlterEvidenceViaUserId($row['user_id']);
                    if ($set3 === 0) {
                      $f = 1; }
                    }
                  }
                }





                if ($a === 1) {
                  $isRoot = $cms->getMember()->selectAdminViaemail($alterAccount);
                  if (isset($isRoot)) {
                    if (($gR == 1 && $dR == 0) || ($gR == 0 && $dR == 1)) {
                      if ($gR == 1) {
                        $set0 = $cms->getMember()->updateSetRootPrivilagesViaUserId($ident['user_id']);

                        if ($set0 === 0) {
                          $f = 1; }

                        }
                        if ($dR === 1)
                        {
                          $set7 = $cms->getMember()->updateDenySetRootPrivilagesViaUserId($ident['user_id']);
                          if ($set7 === 0) {
                            $f = 1; }
                          }
                        }
                        if ($gR == 1 && $dR == 1) {
                          $fRR = 1;

                        }
                        if ($isRoot['root'] == 0 && ($aD === 1 || $aDA === 1 || $aA === 1 || $dD === 1 || $dA === 1 || $dDA === 1)) {
                          if ($aD === 1)
                          {
                            $set1 = $cms->getMember()->updateAllowDeleteEvidenceViaUserId($ident['user_id']);
                            if ($set1 === 0) {
                              $f = 1; }
                            }
                            if ($aDA === 1)
                            {
                              $set2 = $cms->getMember()->updateAllowDeleteAllEvidenceViaUserId($ident['user_id']);
                              if ($set2 === 0) {
                                $f = 1; }
                              }
                              if ($aA === 1)
                              {
                                $set3 = $cms->getMember()->updateAllowAlterEvidenceViaUserId($ident['user_id']);
                                if ($set3 === 0) {
                                  $f = 1; }
                                }
                                if ($dD === 1) {
                                  $set4 = $cms->getMember()->updateDenyDeleteEvidenceViaUserId($ident['user_id']);
                                  if ($set4 === 0) {
                                    $f = 1; }
                                  }
                                  if ($dA === 1) {
                                    $set5 = $cms->getMember()->updateDenyAlterEvidenceViaUserId($ident['user_id']);
                                    if ($set5 === 0) {
                                      $f = 1; }
                                    }
                                    if ($dDA === 1)
                                    {
                                      $set6 = $cms->getMember()->updateDenyDeleteAllEvidenceViaUserId($ident['user_id']);
                                      if ($set6 === 0) {
                                        $f = 1; }
                                      }

                                    }
                                  } else {
                                    $fA = 1;
                                  }
                                  if ($isRoot['root'] == 1 && ($aD === 1 || $aDA === 1 || $aA === 1 || $dD === 1 || $dA === 1 || $dDA === 1)) {
                                    $fR = 1;
                                  }
                                }

                                if ($fRR >= 1) {
                                  $error .= "You cannot select both deny root privilages and allow root privilages at the same time. <br>";
                                }
                                if ($fMCO >= 1) {
                                  $error .= "You must create an administrative account with options. <br>";
                                }
                                if ($fMCO != 1) {
                                  if ($fDN >= 1) {
                                    $error .= "You chose no options. <br>";
                                  }
                                }
                                if ($cD >= 1) {
                                  $error .= "You can't delete an account and apply other options. <br>";
                                }
                                if ($wFTD >= 1) {
                                  $error .= 'This is the wrong field to use to delete. <br>'; }
                                  if ($fAC >= 1) {
                                    $error .= "The administrator has already been created. <br>";
                                  }
                                  if ($fU >= 1) {
                                    $error .= "The user does not exist. <br>";}
                                    if ($fA >= 1) {
                                      $error .= "This is not an administrative user. <br>"; }
                                      if ($fR >= 1) {
                                        $error .= "You may not assign any other privilages to the root user. <br>"; }
                                        if ($f >= 1 || $fR >= 1 || $fA >= 1 || $fU >= 1 || $fAC >= 1 || $fAA >= 1 || $wFTD >= 1 || $cD >= 1 ||
                                        $fDN >= 1 || $fMCO >= 1 || $fRR >= 1) {
                                          $error .= "There was a problem. Please try again. <br>";} else { $error .= "The operation was successfull! <br>"; }

                                        }


                                        // echo $c . ' ' . $a . '<br>';
                                        // echo $f . " " . $fA . " " . $fR . ' ' . $fU . ' ' . $fAC . '<br>';
                                        // echo $aD . " " . $aDA . " " . $aA . " " . $dD . " " . $dA . " " . $dDA . ' ' . $gR . ' ' . $dR;

                                        echo $error . "<br><br>"; ?>
                                        <form action="createAdministrativeAccount.php" method="POST">
                                          <?php if ($administrator['root'] == 1) { ?>
                                            <label for="create_administrative_account">Create administrative account from existing account:</label>
                                            <input type="text" name="create_administrative_account" value="<?= $_POST['create_administrative_account']  ?? '' ?>"> <br>
                                          <?php } ?>
                                          <?php if ($administrator['root'] == 1 || $administrator['can_delete_all'] == 1) { ?>
                                            <label for="alter_administrative_account">Alter or delete administrative or user account:</label>
                                            <input type="text" name="alter_administrative_account" value="<?= $_POST['alter_administrative_account']  ?? '' ?>"> <br>
                                          <?php } ?>
                                          <?php if ($administrator['root'] == 1) { ?>
                                            <label for="allow_root_privilages">Allow root privilages:</label>
                                            <input type="checkbox" name="allow_root_privilages"><br>
                                            <label for="set_allow_alter_evidence">Set allow alter evidence:</label>
                                            <input type="checkbox" name="set_allow_alter_evidence"><br>
                                            <label for="set_allow_delete_evidence">Set allow delete evidence:</label>
                                            <input type="checkbox" name="set_allow_delete_evidence"><br>
                                            <label for="allow_delete_all_evidence_from_email">Set allow delete all evidence from email:</label>
                                            <input type="checkbox" name="allow_delete_all_evidence_from_email"><br>
                                            <label for="deny_root_privilages">Deny root privilages:</label>
                                            <input type="checkbox" name="deny_root_privilages"><br>
                                            <label for="set_deny_alter_evidence">Set deny alter evidence:</label>
                                            <input type="checkbox" name="set_deny_alter_evidence"><br>
                                            <label for="set_deny_delete_evidence">Set deny delete evidence:</label>
                                            <input type="checkbox" name="set_deny_delete_evidence"><br>
                                            <label for="deny_delete_all_evidence_from_email">Set deny delete all evidence from email:</label>
                                            <input type="checkbox" name="deny_delete_all_evidence_from_email"><br>
                                          <?php } ?>
                                          <?php if ($administrator['can_delete_all'] == 1 || $administrator['root'] == 1) { ?>
                                            <label for="delete_account">Delete account:</label>
                                            <input type="checkbox" name="delete_account"><br>
                                          <?php } ?>
                                          <input type="submit" name="submit" value="SUBMIT">

                                        </form>
                                        <?php
                                      } else {
                                        header("Location: how_dare_you.php");
                                        exit();
                                      }
