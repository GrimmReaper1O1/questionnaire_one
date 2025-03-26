<?php
$currentPath = dirname(__DIR__); 
include "../../includes/header3.php";
if ($_SESSION['administrator']['admin'] == 1 || $_SESSION['administrator']['viewer'] == 1) {
  $page = $_GET['page'] ?? 1;
  $limit = 20;
  if (isset($_GET['subject'])) {
    $_SESSION['sub'] = $_GET['subject'];
  }
  if (isset($_GET['sName'])) {
    $_SESSION['sName'] = $_GET['sName'];
  }

  if (isset($_SESSION['ident'])) {
    $patterns[0] = '/"/';
    $result = $cms->getQuestions()->selectResultsString();
    $firstResult = $cms->getQuestions()->selectFirstResult();
    $replacements[0] = '';
    $results = $cms->getQuestions()->selectAllResultsPagination($page, $limit, $_SESSION['ident']);
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
        <div class="margin50">
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
      <div class="margin40"><p >
        <?php
        foreach ($results['select'] as $result) {
          ?>

          <a href="check_users_score_history.php?scoreid=<?= $result['id'] ?>">CHECK QUESTION RESULTS! </a>    SCORE:<?= $result['score'] ?>%    TIMESTAMP: <?php echo gmdate("Y-m-d H:i:s", $result['realtime']) ?><br>
          TIME TAKEN: <?= $result['time_taken'] ?> REACHED LAST PAGE: <?php if ($result['finished'] == 1) { echo 'YES!'; } else { echo 'NO!'; } ?><br><br>
          <?php
        }
        ?></p></div><br><br><br><br>
        <div id="pagination">
          <p>-
            <?php
            for ($i = 1; $i <= $results['totalPages']; $i++) {
              ?>
              <a href="check_users_score_history.php?page=<?= $i ?>&ident=y">-<?= $i ?>-</a>
              <?php
            }
            ?>
            -</p></div>
            <?php
          }

          if (isset($_GET['scoreid'])) {
            ?>
            <div class="margin50">
              <canvas id="myCanvas" style="width: 39%; margin-right: 30%; margin-left: 30%;  height: auto;"></canvas>
            </div>

            <script src="../../src/canvas.js"></script>
            <div >
              <?php
              $score = $cms->getQuestions()->selectIndividualResult($_GET['scoreid']);
              $percent = $score['score'];
              $obj = json_decode($score['string']);
              $arry = ((array)$obj);

              ?>
              <div class="margin50">
                <?php
                $counter = 1;
                foreach ($arry as $pg) {


                  ?>
                  <div class="settings10">
                    <h2>PAGE: <?= $counter ?></h2><br>
                    <?php

                    for ($i = 0 ; $i < count((array)$pg->length) ; $i++ ) {
                      $property = 'a'.$i
                      ?>
                      <div>
                        Question: <?= $i ?> <br>
                        Right selections: <?= $pg->$property->right ?><br>
                        Wrong selections: <?= $pg->$property->wrong ?><br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br></div>            <?php

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

          <div class="copyright">

          </div>


          <?php
        }
      } else {
        header("Location: ../../classes.php");
        exit;
      }?>
      <div>
        <?php
        include "../../includes/footer2.php";
        ?>
      </div>
    </body>
    </html>
