




<?php
$currentPath = dirname(__DIR__); 
include "includes/header3.php";

if (isset($_GET['subject'])) {
  $_SESSION['subject'] = $_GET['subject'];
  unset($_SESSION['ident']);
  unset($_SESSION['cId']);
}
if (isset($_GET['sName'])) {
  $_SESSION['sName'] = $_GET['sName'];
}
$page = $_GET['page'] ?? 1;
$limit = 20;
if (isset($_GET['id'])) {
  $_SESSION['ident'] = $_GET['id'];
}


if (isset($_SESSION['subject']) ) {
  $patterns[0] = '/"/';
  $result = $cms->getQuestions()->selectResultsString();
  $firstResult = $cms->getQuestions()->selectFirstResult();
  $replacements[0] = '';
  $results = $cms->getQuestions()->selectAllResultsPagination($page, $limit, $_SESSION['id']);
  $maxTime = $cms->getQuestions()->selectMaxResult($_SESSION['id']);

  if ($page == 1) {

    $_SESSION['startResTime'] = $results['select'][0]['timestamp'];
  }

  ?>
  <div id="main" class="main">

    <div class="heightHeader">
    </div>

    <div class="mainbody">
      <div class="centeredText">


        <h1>Class: <?= $_SESSION['cName'] ?></h1>
        <h2>Subject: <?= $_SESSION['sName'] ?></h2>
      </div>
      <div class="margin25">
        <canvas id="lineChart" style="width: 100%; height: auto;"></canvas>
      </div>
      <script src="../../src/canvas.js"></script>
      <script>

      window.onload = function () {
        var myLineChart = new LineChart({
          canvasId: "lineChart",
          minX: <?= 0 ?>,
          minY: 0,
          maxX: <?php if ($firstResult == false) {echo 3; } else { echo (((($maxTime['realtime'] - $firstResult['timestamp']) / 60) / 180)); } ?>,
          maxY: 100,
          unitsPerTickX: 8,
          unitsPerTickY: 10
        });

        var data = [<?=   $result['string'] ?? ''  ?>];

        myLineChart.drawLine(data, "#07fa07", 3);
      };
      </script>
      <div class="centeredText">
        <?php
        foreach ($results['select'] as $result) {
          ?>

          <p><a href="bioThree.php?scoreid=<?= $result['id'] ?>">CHECK QUESTION RESULTS! </a>    SCORE:<?= $result['score'] ?>%    TIMESTAMP: <?php echo gmdate("Y-m-d H:i:s", $result['realtime']) ?><br>
            TIME TAKEN: <?= $result['time_taken'] ?> REACHED LAST PAGE: <?php if ($result['finished'] == 1) { echo 'YES!'; } else { echo 'NO!'; } ?><br><p>

              <?php
            }
            ?>
            <div style="height: 50px;">
            </div>

          </div>
          <div id="pagination">
            <span>
              <?php
              for ($i = 1; $i <= $results['totalPages']; $i++) {
                ?>
                <a href="bioThree.php?page=<?= $i ?>&ident=y">-<?= $i ?>-</a><?php
              }
              ?></span></div>

              <?php
            }

            if (isset($_GET['scoreid'])) {
              ?>

              <div class="margin25">

                <canvas id="myCanvas" style="width: 100%"></canvas>
              </div>
              <script src="../../src/canvas.js"></script>
              <?php
              $score = $cms->getQuestions()->selectIndividualResult($_GET['scoreid']);
              $percent = $score['score'];
              $obj = json_decode($score['string']);
              $arry = ((array)$obj);


              $counter = 1;?>
              <div>
                <br><br><br>
              </div>
              <div style="padding-left: 10%;" class="margin50">
                <?php       foreach ($arry as $pg) {


                  ?>
                  <div class="settings10">
                    <h2>PAGE: <?= $counter ?></h2><br>
                    <?php

                    for ($i = 0 ; $i < count((array)$pg->length) ; $i++ ) {
                      $property = 'a'.$i;
                      ?>
                      Question: <?= $i ?> <br>
                      Right selections: <?= $pg->$property->right ?><br>
                      Wrong selections: <?= $pg->$property->wrong ?><br>
                      <?php

                    }
                    ?>
                  </div>

                  <?php
                  $counter++;
                }

                $wrong = 100 - $percent;
                $right = $percent
                ?>
              </div>
              <div>
                <br><br><br><br>
              </div>
              <script>

              var myCanvas = document.getElementById("myCanvas");
              myCanvas.width = 500;
              myCanvas.height = 500;

              var ctx = myCanvas.getContext("2d");
              ctx.lineWidth = 2;

              ctx.imageSmoothingEnabled = true;
              var myScore = { rigth: <?= $right ?>,
                wrong: <?= $wrong ?> }

                var myDoughnutchart = new PieChart({
                  canvas: myCanvas,

                  seriesName: "Question Score",
                  padding: 2,
                  data: myScore,
                  colors:["#07fa07","#fa0707"],
                  doughnutHoleSize:0.5,
                  doughnutHoleColor:"#100dd9"
                });

                myDoughnutchart.draw();

                </script>
              </div>
              <div style="height: 400px;">
              </div>
            </div>
          </div>

          <?php
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
      <div>
        <?php
        include "includes/footer2.php";
        ?>
      </body>
      </html>
