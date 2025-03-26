<?php
$currentPath = rtrim(__DIR__, DIRECTORY_SEPARATOR); include "../../includes/header3.php";
if ($_SESSION['administrator']['root'] == 1 || $_SESSION['administrator']['viewer'] == 1) {
  if (isset($_GET['resetpassword'])) {
    $array[0] = "a";
    $array[1] = "A";
    $array[2] = "b";
    $array[3] = "B";
    $array[4] = "c";
    $array[5] = "C";
    $array[6] = "d";
    $array[7] = "D";
    $array[8] = "e";
    $array[9] = "E";
    $array[10] = "f";
    $array[11] = "F";
    $array[12] = "g";
    $array[13] = "G";
    $array[14] = "h";
    $array[15] = "H";
    $array[16] = "i";
    $array[17] = "I";
    $array[18] = "j";
    $array[19] = "J";
    $array[20] = "k";
    $array[21] = "K";
    $array[22] = "l";
    $array[23] = "L";
    $array[24] = "m";
    $array[25] = "M";
    $array[26] = "n";
    $array[27] = "N";
    $array[28] = "o";
    $array[29] = "O";
    $array[30] = "p";
    $array[31] = "P";
    $array[32] = "q";
    $array[33] = "Q";
    $array[34] = "r";
    $array[35] = "R";
    $array[36] = "s";
    $array[37] = "S";
    $array[38] = "t";
    $array[39] = "T";
    $array[40] = "u";
    $array[41] = "U";
    $array[42] = "v";
    $array[43] = "V";
    $array[44] = "x";
    $array[45] = "X";
    $array[46] = "y";
    $array[47] = "Y";
    $array[48] = "z";
    $array[49] = "Z";
    $array[50] = "`";
    $array[51] = "~";
    $array[52] = "1";
    $array[53] = "!";
    $array[54] = "2";
    $array[55] = "@";
    $array[56] = "3";
    $array[57] = "#";
    $array[58] = "4";
    $array[59] = "$";
    $array[60] = "5";
    $array[61] = "%";
    $array[62] = "6";
    $array[63] = "^";
    $array[64] = "7";
    $array[65] = "&";
    $array[66] = "8";
    $array[67] = "*";
    $array[68] = "9";
    $array[69] = "(";
    $array[70] = "0";
    $array[71] = ")";
    $array[72] = "t";
    $array[73] = "t";
    $array[74] = "=";
    $array[75] = "+";
    $array[76] = "[";
    $array[77] = "{";
      $array[78] = "]";
      $array[79] = "}";
      $array[80] = ";";
      $array[81] = ":";
      $array[82] = "'";

      $array[83] = '"';
      $array[84] = ",";
      $array[85] = "<";
      $array[86] = ".";
      $array[87] = ">";
      $array[88] = "/";
      $array[89] = "?";
      $array[90] = "s";
      $array[91] = "H";
      $array[92] = "^";
      $array[93] = "#";
      $array[94] = "8";
      $array[95] = "F";
      $array[96] = "D";
      $array[97] = "a";
      $array[98] = "x";
      $array[99] = "n";
      $array[100] = "4";
      $array[101] = "M";
      $array[102] = "p";
      $array[103] = "s";
      $array[104] = "$";
      $array[105] = "l";
      $array[106] = "'";
      $array[107] = "r";
      $array[108] = "R";
      $array[109] = "!";

      $num1 = 8;
      $password = '';
      for ($i = 0; $i < 8; $i++) {
        $random = strval(rand(0, 109));
        $password = $password . $array[$random];


      }







      $row = $cms->getMember()->getViaId($_GET['id']);
      if ($row != false) {
        if ($_SESSION['administrator']['root'] == 1 && $row['admin'] == 1) {
          $pass = password_hash(trim($password), PASSWORD_DEFAULT);

          $result = $cms->getMember()->updatePassword($row['user_id'], trim($pass));


        } elseif ($_SESSION['administrator']['viewer'] == 1 && $row['admin'] == 0) {

          $pass = password_hash(trim($password), PASSWORD_DEFAULT);

          $result = $cms->getMember()->updatePassword($row['id'], trim($pass));

        } else {
          $error = "You don't have access to change the password of this user.<br>";
          $error .= "Please ask a super user to make this change.";
        }
      }


    }
    ?>
    <div class="heightHeader">
    </div>
    <div class="main mainBody centeredText width80">
      <br><br><br><br>
      <?php if (!isset($error)) { ?>
        <h4>USERNAME: <?= $row['email'] ?? '' ?><br></h4>
        <h4>PASSWORD: <?= $password ?? '' ?>
        <?php } else { echo $error; }
        ?>
        <div class="addHeight">
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
<?php include '../../includes/footer2.php'; ?>

</body>
</html>
<?php

} else {
  header('Location: ../../classes.php');
}
