<?php
$currentPath = rtrim(__DIR__, DIRECTORY_SEPARATOR); include "../includes/header3.php";

if ($_SESSION['administrator']['root'] == 1) {
$eW = 0;
$error = "";
// check boxes
// unset($_SESSION['siteSettings']);
if (isset($_SESSION['siteSettings'])) {

$arry['siteSettings']['dfhb'] =  $_SESSION['siteSettings']['dfhb'];
$arry['siteSettings']['efhb'] =  $_SESSION['siteSettings']['efhb'];
$arry['siteSettings']['emb'] =  $_SESSION['siteSettings']['emb'];
$arry['siteSettings']['dmb'] =  $_SESSION['siteSettings']['dmb'];
$arry['siteSettings']['dls'] =  $_SESSION['siteSettings']['dls'];
$arry['siteSettings']['els'] =  $_SESSION['siteSettings']['els'];
$arry['siteSettings']['ers'] =  $_SESSION['siteSettings']['ers'];
$arry['siteSettings']['drs'] =  $_SESSION['siteSettings']['drs'];
$arry['siteSettings']['ecb'] =  $_SESSION['siteSettings']['ecb'];
$arry['siteSettings']['dcb'] =  $_SESSION['siteSettings']['dcb'];
$arry['siteSettings']['embpb'] =  $_SESSION['siteSettings']['embpb'];
$arry['siteSettings']['dmbpb'] =  $_SESSION['siteSettings']['dmbpb'];

$arry['siteSettings']['pombw'] =  $_SESSION['siteSettings']['pombw'];
$arry['siteSettings']['polsw'] =  $_SESSION['siteSettings']['polsw'];
$arry['siteSettings']['porsw'] =  $_SESSION['siteSettings']['porsw'];
$arry['siteSettings']['hobbip'] =  $_SESSION['siteSettings']['hobbip'];


$arry['siteSettings']['rsc'] = $_SESSION['siteSettings']['rsc'];
$arry['siteSettings']['mbc'] = $_SESSION['siteSettings']['mbc'];
$arry['siteSettings']['lBarc'] = $_SESSION['siteSettings']['lBarc'];
$arry['siteSettings']['tc'] = $_SESSION['siteSettings']['tc'];
} else {





$arry['siteSettings']['pombw'] =   86;
$arry['siteSettings']['polsw'] =  7;
$arry['siteSettings']['porsw'] =   7;
$arry['siteSettings']['hobbip'] =   50;
$arry['siteSettings']['dfhb'] = 0;
$arry['siteSettings']['efhb'] = 1;
$arry['siteSettings']['emb'] =  1;
$arry['siteSettings']['dmb'] =  0;
$arry['siteSettings']['dls'] =  0;
$arry['siteSettings']['els'] =  1;
$arry['siteSettings']['ers'] =  1;
$arry['siteSettings']['drs'] =  0;
$arry['siteSettings']['ecb'] =  1;
$arry['siteSettings']['dcb'] =  0;
$arry['siteSettings']['embpb'] = 0;
$arry['siteSettings']['dmbpb'] = 1;
$arry['siteSettings']['rsc'] = 'rgb(0,0,0)';
$arry['siteSettings']['mbc'] = 'rgb(16,13,217)';
$arry['siteSettings']['lBarc'] = 'rgb(0,0,0)';
$arry['siteSettings']['tc'] = 'rgb(16,13,217)';



$_SESSION['siteSettings']['pombw'] =   86;
$_SESSION['siteSettings']['polsw'] =  7;
$_SESSION['siteSettings']['porsw'] =   7;
$_SESSION['siteSettings']['hobbip'] =   50;
$_SESSION['siteSettings']['dfhb'] = 0;
$_SESSION['siteSettings']['efhb'] = 1;
$_SESSION['siteSettings']['emb'] =  1;
$_SESSION['siteSettings']['dmb'] =  0;
$_SESSION['siteSettings']['dls'] =  0;
$_SESSION['siteSettings']['els'] =  1;
$_SESSION['siteSettings']['ers'] =  1;
$_SESSION['siteSettings']['drs'] =  0;
$_SESSION['siteSettings']['ecb'] =  1;
$_SESSION['siteSettings']['dcb'] =  0;
$_SESSION['siteSettings']['embpb'] = 0;
$_SESSION['siteSettings']['dmbpb'] = 1;
$_SESSION['siteSettings']['rsc'] = 'rgb(0,0,0)';
$_SESSION['siteSettings']['mbc'] = 'rgb(16,13,217)';
$_SESSION['siteSettings']['lBarc'] = 'rgb(0,0,0)';
$_SESSION['siteSettings']['tc'] = 'rgb(16,13,217)';


}


if (isset($_SERVER['REQUEST_METHOD'])) {

    if (isset($_POST['submit1'])) {
        
        if (isset($_POST['dfhb']) && isset($_POST['efhb'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE FULL HEIGHT BARS AT THE SAME TIME.<br>";
        } elseif (isset($_POST['dfhb']) && !isset($_POST['efhb'])) {
            $arry['siteSettings']['dfhb'] = 1;
            $arry['siteSettings']['efhb'] = 0;
        $_SESSION['siteSettings']['dfhb'] = $arry['siteSettings']['dfhb'];
        $_SESSION['siteSettings']['efhb'] = $arry['siteSettings']['efhb'];
                } elseif (!isset($_POST['dfhb']) && isset($_POST['efhb'])) {
            $arry['siteSettings']['efhb'] = 1;
            $arry['siteSettings']['dfhb'] = 0;
            $_SESSION['siteSettings']['dfhb'] = $arry['siteSettings']['dfhb'];
            $_SESSION['siteSettings']['efhb'] = $arry['siteSettings']['efhb'];
            
        }


        if (isset($_POST['emb']) && isset($_POST['dmb'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE BOTH MOVING BARS AT THE SAME TIME.<br>";
        } elseif (isset($_POST['emb']) && !isset($_POST['dmb'])) {
            $arry['siteSettings']['emb'] = 1;
            $arry['siteSettings']['dmb'] = 0;
            $_SESSION['siteSettings']['emb'] = $arry['siteSettings']['emb'];
            $_SESSION['siteSettings']['dmb'] = $arry['siteSettings']['dmb'];
            
        } elseif (!isset($_POST['emb']) && isset($_POST['dmb'])) {
            $arry['siteSettings']['dmb'] = 1;
            $arry['siteSettings']['emb'] = 0;
            $_SESSION['siteSettings']['dmb'] = $arry['siteSettings']['dmb'];
            $_SESSION['siteSettings']['emb'] = $arry['siteSettings']['emb'];
            
        }
    
        if (isset($_POST['dls']) && isset($_POST['els'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE THE LEFT SIDEBARS AT THE SAME TIME.<br>";
        } elseif (isset($_POST['dls']) && !isset($_POST['els'])) {
            $arry['siteSettings']['dls'] = 1;
            $arry['siteSettings']['els'] = 0;
            $_SESSION['siteSettings']['dls'] = $arry['siteSettings']['dls'];
            $_SESSION['siteSettings']['els'] = $arry['siteSettings']['els'];
         
            
        } elseif (!isset($_POST['dls']) && isset($_POST['els'])) {
            $arry['siteSettings']['els'] = 1;
            $arry['siteSettings']['dls'] = 0;
            $_SESSION['siteSettings']['els'] = $arry['siteSettings']['els'];
            $_SESSION['siteSettings']['dls'] = $arry['siteSettings']['dls'];
        }
        
        if (isset($_POST['ers']) && isset($_POST['drs'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE THE RIGHT BARS AT THE SAME TIME.<br>";
        } elseif (isset($_POST['ers']) && !isset($_POST['drs'])) {
            $arry['siteSettings']['ers'] = 1;
            $arry['siteSettings']['drs'] = 0;
            $_SESSION['siteSettings']['els'] = $arry['siteSettings']['els'];
            $_SESSION['siteSettings']['dls'] = $arry['siteSettings']['dls'];
          
        } elseif (!isset($_POST['ers']) && isset($_POST['drs'])) {
            $arry['siteSettings']['drs'] = 1;
            $arry['siteSettings']['ers'] = 0;
            $_SESSION['siteSettings']['els'] = $arry['siteSettings']['els'];
            $_SESSION['siteSettings']['dls'] = $arry['siteSettings']['dls'];
        }
        
        if (isset($_POST['ecb']) && isset($_POST['dcb'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE THE CORNER BANNER AT THE SAME TIME.<br>";
        } elseif (isset($_POST['ecb']) && !isset($_POST['dcb'])) {
            $arry['siteSettings']['ecb'] = 1;
            $arry['siteSettings']['dcb'] = 0;
            $_SESSION['siteSettings']['ecb'] = $arry['siteSettings']['ecb'];
            $_SESSION['siteSettings']['dcb'] = $arry['siteSettings']['dcb'];
     
        } elseif (!isset($_POST['ecb']) && isset($_POST['dcb'])) {
            $arry['siteSettings']['dcb'] = 1;
            $arry['siteSettings']['ecb'] = 0;
            $_SESSION['siteSettings']['dcb'] = $arry['siteSettings']['dcb'];
            $_SESSION['siteSettings']['ecb'] = $arry['siteSettings']['ecb'];
        }
        
        if (isset($_POST['embpb']) && isset($_POST['dmbpb'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE THE MAIN BODY POSITION BANNER AT THE SAME TIME.<br>";
        } elseif (isset($_POST['embpb']) && !isset($_POST['dmbpb'])) {
            $arry['siteSettings']['embpb'] = 1;
            $arry['siteSettings']['dmbpb'] = 0;
            $_SESSION['siteSettings']['embpb'] = $arry['siteSettings']['embpb'];
            $_SESSION['siteSettings']['dmbpb'] = $arry['siteSettings']['dmbpb'];

        } elseif (!isset($_POST['embpb']) && isset($_POST['dmbpb'])) {
            $arry['siteSettings']['dmbpb'] = 1;
            $arry['siteSettings']['embpb'] = 0;
            $_SESSION['siteSettings']['embpb'] = $arry['siteSettings']['embpb'];
            $_SESSION['siteSettings']['dmbpb'] = $arry['siteSettings']['dmbpb'];
        }
    



        if ($_POST['tcr'] !== '' || $_POST['tcg'] !== '' || $_POST['tcb'] !== '') {


        if ($_POST['tcr'] !== '' && $_POST['tcg'] !== '' && $_POST['tcb'] !== '') {


        if (($_POST['tcr'] <= 255 && $_POST['tcr'] >= 0) && ($_POST['tcg'] <= 255 && $_POST['tcg'] >= 0) && ($_POST['tcb'] <= 255 && $_POST['tcb'] >= 0)) {
            
            $arry['siteSettings']['tc'] = 'rgb(' . $_POST['tcr'] . ',' . $_POST['tcg'] . ',' . $_POST['tcb'] . ')';
            $_SESSION['siteSettings']['tc'] = $arry['siteSettings']['tc'];
        } else {
            $error .= "ONE OF THE COLOUR VALUES WAS NOT BETWEEN 0 AND 255 IN THE MAIN TOP BANNER. <br>";
        }

        } else {
      
        $error .= "YOU DID NOT INPUT ALL THE VARIABLES IN THE MAIN TOP BANNER COLOUR. PLEASE TRY AGAIN.<br>";

        }
        }



        if ($_POST['lBarcR'] !== '' || $_POST['lBarcG'] !== '' || $_POST['lBarcB'] !== '') {


            if ($_POST['lBarcR'] !== '' && $_POST['lBarcG'] !== '' && $_POST['lBarcB'] !== '') {


                if (($_POST['lBarcR'] <= 255 && $_POST['lBarcR'] >= 0) && ($_POST['lBarcG'] <= 255 && $_POST['lBarcG'] >= 0) && ($_POST['lBarcB'] <= 255 && $_POST['lBarcB'] >= 0)) {
                    
                    $arry['siteSettings']['lBarc'] = "rgb(" . $_POST['lBarcR'] . ',' . $_POST['lBarcG'] . ',' . $_POST['lBarcB'] . ")";
                    $_SESSION['siteSettings']['lBarc'] = $arry['siteSettings']['lBarc'];
                } else {
                    $error .= "ONE OF THE COLOUR VALUES WAS NOT BETWEEN 0 AND 255 IN THE LEFT SIDEBAR VALUES. <br>";
                }
        
                } else {
            $error .= "YOU DID NOT INPUT ALL THE VARIABLES IN THE LEFT SIDEBAR COLOUR. PLEASE TRY AGAIN.<br>";

            }
            }


        if ($_POST['rscr'] !== '' || $_POST['rscg'] !== '' || $_POST['rscb'] !== '') {


            if ($_POST['rscr'] !== '' && $_POST['rscg'] !== '' && $_POST['rscb'] !== '') {


                if (($_POST['rscr'] <= 255 && $_POST['rscr'] >= 0) && ($_POST['rscg'] <= 255 && $_POST['rscg'] >= 0) && ($_POST['rscb'] <= 255 && $_POST['rscb'] >= 0)) {
                    
                    $arry['siteSettings']['rsc'] = "rgb(" . $_POST['rscr'] . ',' . $_POST['rscg'] . ',' . $_POST['rscb'] . ")";
                    $_SESSION['siteSettings']['rsc'] = $arry['siteSettings']['rsc'];

                } else {
                    $error .= "ONE OF THE COLOUR VALUES WAS NOT BETWEEN 0 AND 255 IN THE RIGHT SIDEBAR VALUES. <br>";
                }
        
                } else {
            $error .= "YOU DID NOT INPUT ALL THE VARIABLES IN THE RIGHT SIDEBAR BANNER COLOUR. PLEASE TRY AGAIN.<br>";

            }
            }
           
           
            if ($_POST['mbcr'] !== '' || $_POST['mbcg'] !== '' || $_POST['mbcb'] !== '') {


                if ($_POST['mbcr'] !== '' && $_POST['mbcg'] !== '' && $_POST['mbcb'] !== '') {
    
    
                    if (($_POST['mbcr'] <= 255 && $_POST['mbcr'] >= 0) && ($_POST['mbcg'] <= 255 && $_POST['mbcg'] >= 0) && ($_POST['mbcb'] <= 255 && $_POST['mbcb'] >= 0)) {
                        
                        $arry['siteSettings']['mbc'] = "rgb(" . $_POST['mbcr'] . ',' . $_POST['mbcg'] . ',' . $_POST['mbcb'] . ")";
                        $_SESSION['siteSettings']['mbc'] = $arry['siteSettings']['mbc'];

                    } else {
                        $error .= "ONE OF THE COLOUR VALUES WAS NOT BETWEEN 0 AND 255 IN THE RIGHT SIDEBAR VALUES. <br>";
                    }
            
                    } else {
                $error .= "YOU DID NOT INPUT ALL THE VARIABLES IN THE RIGHT SIDEBAR BANNER COLOUR. PLEASE TRY AGAIN.<br>";
    
                }
                }


            

            if ($_POST['pombw'] !== '') {
            if ($_POST['pombw'] <= 100 && $_POST['pombw'] >= 0) {
                if ((((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_POST['porsw'])) === 100) && $arry['siteSettings']['els'] == 1 && $arry['siteSettings']['ers'] == 1) || 
                (intval($_POST['pombw']) == 100 &&  ($arry['siteSettings']['dls'] == 1 && $arry['siteSettings']['drs'] == 1))) {
                    $arry['siteSettings']['pombw'] = $_POST['pombw'];
                    
                    
                    $_SESSION['siteSettings']['pombw'] = $_POST['pombw'];
                } else {
                    $error .= "YOU MUST HAVE THE MAIN BAR AND THE SIDE BARS EQUATE TO 100 PERCENT. OTHERWISE, IF YOU HAVE DISABLED ANY SIDEBAR THE REMAINING MUST EQUATE TO 100 PERCENT.<BR>";

                }


            } else {
                $error .= "YOU CANNOT ENTER A WIDTH OF MORE THAN ONE HUNDRED PERCENT FOR YOUR MAIN BODY.<BR>";

            }
            }
            
           
           

        if ($_POST['polsw'] !== '') {
            if ($_POST['polsw'] <= 30 && $_POST['polsw']  >= 0) {
                if ((((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_POST['porsw'])) === 100) && $arry['siteSettings']['els'] == 1 && $arry['siteSettings']['ers'] == 1) || 
                (intval($_POST['pombw']) == 100 &&  ($arry['siteSettings']['dls'] == 1 && $arry['siteSettings']['drs'] == 1))) {
                    $arry['siteSettings']['polsw'] = $_POST['polsw'];
                   
                    $_SESSION['siteSettings']['polsw'] = $_POST['polsw'];
                } 

            } else {
                $error .= "YOU CANNOT ENTER A WIDTH OF MORE THAN THIRTY PERCENT FOR YOUR LEFT SIDBAR.<BR>";

            }
        }
           
           
           
           
            if ($_POST['porsw'] !== '') {
            if ($_POST['porsw'] <= 30 && $_POST['porsw']  >= 0 ) {

                if ((((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_POST['porsw'])) === 100) && $arry['siteSettings']['els'] == 1 && $arry['siteSettings']['ers'] == 1) || 
                (intval($_POST['pombw']) == 100 &&  ($arry['siteSettings']['dls'] == 1 && $arry['siteSettings']['drs'] == 1))) {
                    $arry['siteSettings']['porsw'] = $_POST['porsw'];
                    $_SESSION['siteSettings']['porsw'] = $_POST['porsw'];
                } 

            } else {
                $error .= "YOU CANNOT ENTER A WIDTH OF MORE THAN THIRTY PERCENT FOR YOUR RIGHT SIDBAR.<BR>";

            }
        }

            if ($_POST['hobbip'] !== '') {
            if ($_POST['hobbip'] <= 400 && $_POST['hobbip']  >= 30 ) {
                if ($_SESSION['siteSettings']['emb'] === 1 && $_POST['hobbip'] <= 120) {
                    $arry['siteSettings']['hobbip'] = $_POST['hobbip'];
                    $_SESSION['siteSettings']['hobbip'] = $_POST['hobbip'];


                } elseif ($_SESSION['siteSettings']['dmb'] == 1) {
                
                    
                    $arry['siteSettings']['hobbip'] = $_POST['hobbip'];

                    
                    $_SESSION['siteSettings']['hobbip'] = $_POST['hobbip'];
                    
                    
                  
                } else {
                    $error .= "YOU MUST DISABLE MOVING BARS TO HAVE A BANNER THIS MORE THAN ONE HUNDRED AND TWENTY PIXELS.<BR>";
                    
                }
            } else {
                $error .= "YOU CANNOT ENTER MORE THAN FOUR HUNDRED PIXELS FOR YOUR BANNER BAR LOR LESS THAN THIRTY.<BR>";

            }
        }



            if (isset($_POST['mabp'])) {







            }





            if (isset($_POST['cbp'])) {






                
            }





            if (isset($_POST['mbp'])) {






                
            }

            if ($_POST['pombw'] !== '' && $_POST['polsw'] !== '' & $_POST['porsw'] !== '' ) {
            if ((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_POST['porsw'])) !== 100) {
                $eW = 1;

            } 
        }
    
    }



    if (isset($_POST['submit2'])) {

    }

    if (isset($_POST['submit3'])) {





    }
if ($eW == 1) {
    $error .= "THE WIDTHS MUST EQUATE TO ONE HUNDRED PERCENT. YOU MUST STILL EQUATE YOUR WIDTHS TO ONE HUNDRED PERCENT WHEN THE LEFT AND RIGHT BARS ARE DISABLED OR ENTER ZERO.<br>";
}



                    
$number = floatval($arry['siteSettings']['hobbip']) / 1.666666667;
print_r($number);
$number = intval($number);
$arry['siteSettings']['hobbip2'] = ceil($number);
                    $arry['remainingHeight'] = 400 - intval($number);

            ?><div style="margin: 0 auto; width: 80%">      
<?php
print_r($_POST);print_r($arry);
?>
</div>
<?php
if (isset($_SESSION['siteSettings'])) {
 

    
    
$arry['siteSettings']['dfhb'] = $_SESSION['siteSettings']['dfhb'];
$arry['siteSettings']['efhb'] = $_SESSION['siteSettings']['efhb'];
$arry['siteSettings']['rsc'] = $_SESSION['siteSettings']['rsc'];

$arry['siteSettings']['mbc'] = $_SESSION['siteSettings']['mbc'];
$arry['siteSettings']['lBarc'] = $_SESSION['siteSettings']['lBarc'];
$arry['siteSettings']['tc'] = $_SESSION['siteSettings']['tc'];
$arry['siteSettings']['pombw'] = $_SESSION['siteSettings']['pombw'];
$arry['siteSettings']['porsw'] = $_SESSION['siteSettings']['porsw'];
$arry['siteSettings']['hobbip'] = $_SESSION['siteSettings']['hobbip'];
$arry['siteSettings']['polsw'] = $_SESSION['siteSettings']['polsw'];

$arry['siteSettings']['embpb'] = $_SESSION['siteSettings']['embpb'];
$arry['siteSettings']['dmbpb'] = $_SESSION['siteSettings']['dmbpb'];
$arry['siteSettings']['ecb'] =   $_SESSION['siteSettings']['ecb'];
$arry['siteSettings']['dcb'] =   $_SESSION['siteSettings']['dcb'];
$arry['siteSettings']['els'] =   $_SESSION['siteSettings']['els'];
$arry['siteSettings']['dls'] =   $_SESSION['siteSettings']['dls'];
$arry['siteSettings']['dls'] =   $_SESSION['siteSettings']['dls'];
$arry['siteSettings']['els'] =   $_SESSION['siteSettings']['els'];
$arry['siteSettings']['dmb'] =   $_SESSION['siteSettings']['dmb'];
$arry['siteSettings']['emb'] =   $_SESSION['siteSettings']['emb'];




}
}


?>

<div id="main">

<div class="centeredText">
    <p>
<?= $error . $arry['siteSettings']['polsw'] ?>
<?= $error . $arry['siteSettings']['pombw'] ?>
<?= $error . $arry['siteSettings']['porsw'] ?>
</p>

</div>
<div class="margin80">


<div class="marginAuto"><fieldset class="fieldset100">
<form action="colourChangePage.php" method="POST">
    <div class="centeredText">    
<label for="websiteHeading">Please enter the website heading name, which will be displayed in the banner.</label>
</div>
<div class="margin40">
    <div class="marginAuto">
<div class="width85inline">
    <input  style="width: 85%"  type="text" value="<?= '' ?? '' ?>" name="websiteHeading">
</div>
    <div style="padding-left: 5px;" class="width15inline">
    print_r($arry);
<input  type="submit" value="submit">
</div>
</div>
</div>
</form>
</fieldset>
</div>
<?php


// $arry['siteSettings']['dfhb'] =  $_POST['dfhb'] ??  $arry['siteSettings']['dfhb'];
// $arry['siteSettings']['efhb'] =  $_POST['efhb'] ?? $arry['siteSettings']['efhb'];
// $arry['siteSettings']['emb'] =  $_POST['emb'] ?? $arry['siteSettings']['emb'];
// $arry['siteSettings']['dmb'] =  $_POST['dmb'] ?? $arry['siteSettings']['dmb'];
// $arry['siteSettings']['dls'] =  $_POST['dls'] ?? $arry['siteSettings']['dls'];
// $arry['siteSettings']['els'] =  $_POST['els'] ?? $arry['siteSettings']['els'];
// $arry['siteSettings']['ers'] =  $_POST['ers'] ?? $arry['siteSettings']['ers'];
// $arry['siteSettings']['drs'] =  $_POST['drs'] ?? $arry['siteSettings']['drs'];
// $arry['siteSettings']['ecb'] =  $_POST['ecb'] ?? $arry['siteSettings']['ecb'];
// $arry['siteSettings']['dcb'] =  $_POST['dcb'] ?? $arry['siteSettings']['dcb'];
// $arry['siteSettings']['embpb'] =  $_POST['embpb'] ?? $arry['siteSettings']['embpb'];
// $arry['siteSettings']['dmbpb'] =  $_POST['dmbpb'] ?? $arry['siteSettings']['dmbpb'];

// $arry['siteSettings']['dfhb'] disable full height bars;
// $arry['siteSettings']['emb'] enable main banner
// $arry['siteSettings']['els'] enable seft side bar 
// $arry['siteSettings']['ers'] enable right side bar 
// $arry['siteSettings']['ecb'] enable corner banner 
// $arry['siteSettings']['embpb'] enable main banner
?>

<?php if ($arry['siteSettings'][''] = 1) { } ?>
<?= $arry['siteSettings']['pombw'] ?>
<?= $arry['siteSettings']['polsw'] ?>
<?= $arry['siteSettings']['porsw'] ?>
<?= $arry['siteSettings']['hobbip'] ?>
<?=  $arry['siteSettings']['tc'] ?>
<?= $arry['siteSettings']['lBarc'] ?>
<?= $arry['siteSettings']['rsc']  ?>
<?= $arry['siteSettings']['mbc'] ?>
<?= $arry['siteSettings'][''] ?>
<?= $arry['siteSettings'][''] ?>
<?= $arry['siteSettings'][''] ?>
<?= $arry['siteSettings'][''] ?>
<?= $arry['siteSettings'][''] ?>
<?= $arry['siteSettings'][''] ?>
<?= $arry['siteSettings'][''] ?>

<?= $arry['remainingHeight'] ?>











        
<div style="width: 700px; height: 400px">
        <div style="width: 100%;">

            <div style=" color: white; width: 100%; height: <?= $arry['siteSettings']['hobbip'] ?>px; background-color: <?=  $arry['siteSettings']['tc'] ?>;  border-bottom: 2px solid black; ">
                <div style="float: left; display: inline-block; height: 100%; width: <?= $arry['siteSettings']['polsw'] ?>%; background-color: blue; border-bottom: 2px solid black;">

                </div>
            <div style="float: left; display: inline-block; width: <?= $arry['siteSettings']['pombw'] ?>%; height: 100%; text-align: center; background-color: <?= $arry['siteSettings']['tc'] ?>;">Quesitonnaire!

            </div>
            <div style="float: left; display: inline-block; width: <?= $arry['siteSettings']['porsw'] ?>%; background-color: <?= $arry['siteSettings']['mbc'] ?>; height: auto; border-bottom: 2px solid black;">
            </div>
        </div>
        <div style="float: left; width: <?= $arry['siteSettings']['polsw'] ?>%; height: <?= $arry['remainingHeight'] ?>px; background-color: <?= $arry['siteSettings']['lBarc'] ?>;">
        </div>
        <div style=" display: inline-block; float: left; width: <?= $arry['siteSettings']['pombw'] ?>%; height: <?= $arry['remainingHeight'] ?>px; background-color: <?=  $arry['siteSettings']['mbc'] ?>;">
           




        <div style="width: 100%; height: auto">
                <div style="position: relative; height: 85%; width: 100%; margin: 0 auto;">    
                    <div style="text-align: center; height: auto;">
                        <div style="margin: 0 auto; width: 80%;">
<img style="width: auto; height: 20%;" src="../images/plants dancing.jpg" />
<figcaption>info</figcaption>
                        </div> 
<h7> Here is your video or audio.</h7><br>
                    </div>
                    <div style="width: 86%; height: auto;">
                        <div style="display: inline-flex; flex-flow: column wrap; justify-content: space-between; flex-wrap: wrap; width: 60%; height: 40%;">
                            <div style="width: 100%;  height: auto; ">
                                <div style="color: black !important;  width: 80%; height: 20% margin: 0 auto; border: 2px solid; border-radius: 10px; background-color: white;">
                                <p>How would you like your website to look today?</p>
                                </div>
                            </div>
        
                        <div style="display: inline-flex; flex-flow: column wrap; justify-content: space-between; flex-wrap: wrap; width: 25%; height: 40%;">
                            <div style="margin: 0 auto;">
        <img style="width: 75%; height: 80%;" src="../images/plants dancing.jpg" /> <figcaption>info</figcaption>

                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>   



</div>

        </div>






        <div style=" width: 80%; margin: auto;">
<div style="width: 100%%;">

<div style=" color: white; width: 100%; height: 30px; margin: 0 auto; height: 30px; background-color: blue;  border-bottom: 1px solid black; ">
<div style="float: left; display: inline-block; height: 100%; width: 7%; background-color: blue; border-bottom: 2px solid black;"></div><div style="float: left; display: inline-block; width: 86%; text-align: center;">Quesitonnaire!</div><div style="float: left; display: inline-block; width: 7%; background-color: blue; height: 100%; border-bottom: 2px solid black;"></div>
</div>
<div style="float: left; width: 7%; height: 400px; background-color: black;">
</div>
<div style=" display: inline-block; float: left; width: 86%; height: 400px; background-color: blue;">
<div style="display: block; height: 370px; width: 100%; margin: 0 auto; ">    
<div style="text-align: center;">
<br><br><br>
<h7> THIS IS YOUR TEXT COLOUR.</h7><br><p>
    <a style="position: relative; color: white;" href="colourChange.php">Link colour</a><p><br></div>
    <div style="text-align: justified !important;"><p>This is some writing and it shows where the text is, so it needs to be here. Please don't complain about the content.</p>
</div>
</div>

<div style="position: relative; color: white; width:100% height: 30px; text-align: center;">-1-2-3-</div>
</div>
<div style="position: relative; float: left; width: 7%; height: 400px; background-color: black;">
</div>
</div>
</div>
</div>
</div>
</div>
</div>






<div style=" width: 80%; margin: auto;">
<div style="width: 100%%;">

<div style=" color: white; width: 100%; height: 30px; margin: 0 auto; height: 30px; background-color: blue;  border-bottom: 1px solid black; ">
<div style="float: left; display: inline-block; height: 100%; width: 7%; background-color: blue; border-bottom: 2px solid black;"></div><div style="float: left; display: inline-block; width: 86%; text-align: center;">Quesitonnaire!</div><div style="float: left; display: inline-block; width: 7%; background-color: blue; height: 100%; border-bottom: 2px solid black;"></div>
</div>
<div style="float: left; width: 7%; height: 400px; background-color: black;">
</div>
<div style=" display: inline-block; float: left; width: 86%; height: 400px; background-color: blue;">
<div style="display: block; height: 370px; width: 100%; margin: 0 auto; ">    
<div style="text-align: center;">
<br><br><br>
<h7> THIS IS YOUR TEXT COLOUR.</h7><br><p>
    <a style="position: relative; color: white;" href="colourChange.php">Link colour</a><p><br></div>
    <div style="text-align: justified !important;"><p>This is some writing and it shows where the text is, so it needs to be here. Please don't complain about the content.</p>
</div>
</div>

<div style="position: relative; color: white; width:100% height: 30px; text-align: center;">-1-2-3-</div>
</div>
<div style="position: relative; float: left; width: 7%; height: 400px; background-color: black;">
</div>
</div>
</div>
</div>
</div>
</div>
</div>




</div>
<div style="float: left; width: 20%">


</div>
</div>
<div style="margin: 0 auto; width: 80%">
<fieldset class="fieldset100">
    <form action="cPageOne.php" method="POST">
    <div style="width: 100%;">
<div  ><div class="width30inline"><label for="emb">Enable moving bars:</label>                  </div>  <div class="width70inline"><input type="checkbox" name="emb" /> </div></div>   
<div  ><div class="width30inline"><label for="dmb">Disable moving bars:</label>                 </div>  <div class="width70inline"><input type="checkbox" name="dmb" /> </div>  </div> 
<div ><div style="padding-top: 18px;" class="width30inline"><label div for="tc">Main top banner colour:</label>             </div> <div class="width70inline"><div style="line-height: 15px;" class="width50"> <div class="number"><input class="width100" type="number"  name="tcr" /></div><div class="number"> &nbsp; <input class="width100" type="number" name="tcg" /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="tcb" />   </div> <div class="width50">&nbsp; </div> </div> </div> </div>
<div ><div style="padding-top: 18px;" class="width30inline"><label for="lBarc">Left sidebar colour RGB:</label>                 </div> <div class="width70inline"><div class="width50"> <div class="number"><input class="width100"  type="number" name="lBarcR"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="lBarcG" /></div><div class="number">  &nbsp; <input class="width100"  type="number"  name="lBarcB" />   </div><div class="width50">&nbsp;</div>  </div> </div> </div>
<div ><div style="padding-top: 18px;" class="width30inline"><label for="mbc">Main body colour:</label>                 </div> <div class="width70inline"><div class="width50"> <div class="number"><input class="width100"  type="number" name="mbcr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="mbcg" /></div><div class="number">  &nbsp; <input class="width100"  type="number"  name="mbcb" />   </div><div class="width50">&nbsp;</div>  </div> </div> </div>
<div ><div style="padding-top: 18px;" class="width30inline"><label for="rsc">Right sidebar colour RGB:</label>                </div> <div class="width70inline"><div class="width50"> <div class="number"><input class="width100" type="number" name="rscr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="rscg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="rscb" />   </div> <div class="width50">&nbsp; </div> </div> </div> </div>
<div ><div class="width30inline"><label for="efhb">Enable full height bars:</label>            </div>  <div class="width70inline"><input type="checkbox" name="efhb" />    </div>  </div> 
<div ><div class="width30inline"><label for="dfhb">Disable full height bars:</label>            </div>  <div class="width70inline"><input type="checkbox" name="dfhb" />    </div>  </div> 
<div ><div class="width30inline"><label for="dls">Disable left sidebar:</label>                </div>  <div class="width70inline"><input type="checkbox" name="dls" /> </div>  </div> 
<div ><div class="width30inline"><label for="drs">Disable right sidebar:</label>               </div>  <div class="width70inline"><input type="checkbox" name="drs" /> </div> </div>  
<div ><div class="width30inline"><label for="els">Enable left sidebar:</label>                 </div>  <div class="width70inline"><input type="checkbox" name="els" /> </div>  </div> 
<div ><div class="width30inline"><label for="ers">Enable right sidebar:</label>                </div>  <div class="width70inline"><input type="checkbox" name="ers" /> </div>  </div> 
<div ><div class="width30inline"><label for="pombw">Percent of main body width:</label>        </div>  <div class="width70inline"><input class="width30" type="number" size="3" name="pombw" />  </div> </div> 
<div ><div class="width30inline"><label for="polsw">Precent of left sidebar width:</label>     </div>  <div class="width70inline"><input class="width30" type="number" size="3" name="polsw" />  </div> </div> 
<div ><div class="width30inline"><label for="porsw">Percent of right sidebar width:</label>    </div>  <div class="width70inline"><input class="width30" type="number" size="3" name="porsw" />  </div> </div> 
<div  ><div class="width30inline"><label for="hobbip">Hight of banner bar in pixels:</label>    </div>  <div class="width70inline"><input class="width30" type="number" size="3" name="hobbip" /> </div> </div> 
<div ><div class="width30inline"><label for="ecb">Enable corner banner:</label>                </div>  <div class="width70inline"><input type="checkbox" name="ecb" />  </div> </div> 
<div ><div class="width30inline"><label for="dcb">Disable corner banner:</label>               </div>  <div class="width70inline"><input type="checkbox" name="dcb" />  </div> </div> 
<div  ><div class="width30inline"><label for="embpb">Enable main body position banner:</label>  </div>  <div class="width70inline"><input type="checkbox" name="embpb" /> </div> </div>
<div ><div class="width30inline"><label for="dmbpb">Disable main body position banner:</label> </div>  <div class="width70inline"><input type="checkbox" name="dmbpb" /> </div> </div>
<div style="padding-bottom: 15px"><div class="width30inline"><label for="mabp">Main area background picture:</label>       </div>  <div class="width70inline"><input type="file" name="mabp" />      </div></div>   
<div style="padding-bottom: 15pxpx;"><div class="width30inline"><label for="bc">Corner banner picture:</label>                </div>  <div class="width70inline"><input type="file" name="bc" />        </div> </div>
<div style="padding-bottom: 15pxpx;" ><div class="width30inline"><label for="mb">Main banner picture:</label>                  </div>  <div class="width70inline"><input type="file" name="mb" />        </div></div> 
</div>
<div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
<div style="padding-left: 200px;"><input type="submit" name="submit1" value="SUBMIT!">
</div>

</form>
</fieldset>
</div>
</body>
</htlm>
<?php
} 


