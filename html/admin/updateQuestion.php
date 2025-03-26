  <?php
$currentPath = dirname(__DIR__); 
include "../includes/header3.php";

  if ($_SESSION['administrator']['admin'] == 1) {

  $page = $_GET['page'] ?? 1;
  $limit = 2;
  $error = "";



  $enter = 0;

  if (isset($_GET['updateQuestion']) && isset($_GET['id'])) {
      $_SESSION['updateQuestion'] = $_GET['updateQuestion'];
      $_SESSION['updateId'] = $_GET['id'];

  }


  if ($enter == 1 || $_SESSION['administrator']['root'] == 1 || $_SESSION['subjectsInfo']['live'] == 0) {

  $failureInsert = 0;
  $failureFound = 0;
  $failureUpdate = 0;
  $success = 0;
  $failure = 0;
  $failureLength = 0;
  $failureNumber = 0;
  $question = $_POST['question'] ?? 'empty';
  $correct = isset($_POST['correct']) ? 'answ' . $_POST['correct'] : 'answ';
  $numeralString[0] = 'empty';
  $numeralString[1] = 'ONE';
  $numeralString[2] = 'TWO';
  $numeralString[3] = 'THREE';
  $numeralString[4] = 'FOUR';
  $numeralString[5] = 'FIVE';
  $numeralString[6] = 'SIX';
  $numeralString[7] = 'SEVEN';
  $numeralString[8] = 'EIGHT';
  for ($i = 1 ; $i <= 8 ; $i++) {
  	$pa[$i] = 'empty';
  	$answ[$i] = 'empty';
  	$hint[$i] = 'empty';


  }
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
  for ($i = 1 ; $i <= 8 ; $i++) {
  if ($_POST['pa'.$i] != '') {
  	$pa[$i] = $_POST['pa'.$i];
  }

  	if ($_POST['answ'.$i] != '') {
  		$answ[$i] = $_POST['answ'.$i];
  	}

  if ($_POST['hint'.$i] != '') {
  		$hint[$i] = $_POST['hint'.$i];
  	}


  }
  }



  }
  ?>	<div id="main" class="main">

  		<div class="heightHeader">
  		</div>

  <div class="mainbody">
  <?php



  if ((isset($_SESSION['updateQuestion']) && isset($_SESSION['updateId']) && isset($_POST['question']))) {

      // $correct = 'answ' . $correct;
      $count = $cms->getQuestions()->updateQuestion($_SESSION['updateId'], $question, $pa[1], $pa[2], $pa[3], $pa[4], $pa[5], $pa[6], $pa[7], $pa[8],
          $answ[1], $answ[2], $answ[3], $answ[4], $answ[5], $answ[6], $answ[7], $answ[8], $correct, $_SESSION['qid'],
          $hint[1], $hint[2], $hint[3], $hint[4], $hint[5], $hint[6], $hint[7], $hint[8]);
      if ($count > 0) {
          $error .= "THE UPDATE WAS SUCCESSFULL!";


      } else {
          $error .= "THE UPDATE WAS NOT SUCCESSFULL!";
      }
      }
      if (isset($_SESSION['updateQuestion']) && isset($_SESSION['updateId'])) {

          $info = $cms->getQuestions()->selectQuestionViaQuestionId($_SESSION['updateId']);
          $row = $cms->getQuestions()->selectSubjectViaTableId($_SESSION['subject']);
          $_SESSION['subjectQuestions'] = 8;
      if (isset($_GET['id'])) {
          $_SESSION['qid'] = $info['question_id'];
          $correct = preg_replace('/answ/', '', $info['correct']);
          }


      ?>
              <?php
          if ($info != false) {
          echo $error;
      ?>
              <div class="margin80 centeredText">
              <div> <a href="questionsAndAnswers.php">Return to question and answers</a></div>
          <fieldset class="fieldset3">
              <h4>PLEASE ENTER ALL THE INFORMATION FOR THE INSTANCE OF THE QUESTION.</h4><br>
                  <form action="updateQuestion.php?updateQuestion=yes&id=<?= $_SESSION['updateId'] ?>" method="POST">
                  <label for="question">QUESTION:</label><br><br>
                  <textarea name='question' rows='20' cols='80'><?php if($info['question'] != 'empty') { echo $info['question']; } ?></textarea><br><br>
                  <label for="correct">PLEASE ENTER THE NUMBER FOR THE CORRECT ANSWER IN THE FORM OF A NUMERAL: </label><br><br>
                  <input type="text" name="correct" size="82" value="<?php if($info['correct'] != 'answ') { echo $correct; } ?>"><br><br>

      <?PHP
      for ($i = 1 ; $i <= 8 ; $i++) {
                  ?>
                  <label for="pa<?= $i ?>">SELECTION <?= $numeralString[$i] ?>:</label><br><br>
                  <input type="text" name="pa<?= $i ?>" value="<?php if($info['pa'.$i] != 'empty') { echo $info['pa'.$i]; } ?>" size="82"><br><br>
                  <label for="answ<?= $i ?>">ANSWER TO SELECTION <?= $numeralString[$i] ?>:</label><br><br>
                  <input type="text" name="answ<?= $i ?>" size="82" value="<?php if($info['answ'.$i] != 'empty') { echo $info['answ'.$i]; }?>"><br><br>
                  <label for="hint<?= $i ?>">HINT <?= $numeralString[$i] ?>:</label><br><br>
                  <input type="text" name="hint<?= $i ?>" size="82" value="<?php if($info['hint'.$i] != 'empty') { echo $info['hint'.$i]; }?>"><br><br>
      <?PHP
      }
      ?>
                  <input type="submit" name="fill" value="SUBMIT!">
                  </form>
      </fieldset>
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

  }
      }
  }
  ?>
  <div>
  <?php
  include '../includes/footer2.php';
  ?>
  </div>
  </body>
  </html>
