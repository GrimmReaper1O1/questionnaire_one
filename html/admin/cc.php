<?php

if ($_SESSION['administrator']['root'] == 1) {
$eW = 0;
// check boxes

if (isset($_SESSION['sS'])) {

$arry['siteSettings']['dfhb'] =  $_SESSION['sS']['dfhb'];
$arry['siteSettings']['efhb'] =  $_SESSION['sS']['efhb'];
$arry['siteSettings']['emb'] =  $_SESSION['sS']['emb'];
$arry['siteSettings']['dmb'] =  $_SESSION['sS']['dmb'];
$arry['siteSettings']['dls'] =  $_SESSION['sS']['dls'];
$arry['siteSettings']['els'] =  $_SESSION['sS']['els'];
$arry['siteSettings']['ers'] =  $_SESSION['sS']['ers'];
$arry['siteSettings']['drs'] =  $_SESSION['sS']['drs'];
$arry['siteSettings']['ecb'] =  $_SESSION['sS']['ecb'];
$arry['siteSettings']['dcb'] =  $_SESSION['sS']['dcb'];
$arry['siteSettings']['embpb'] =  $_SESSION['sS']['embpb'];
$arry['siteSettings']['dmbpb'] =  $_SESSION['sS']['dmbpb'];

$arry['siteSettings']['pombw'] =  $_SESSION['sS']['pombw'];
$arry['siteSettings']['polsw'] =  $_SESSION['sS']['polsw'];
$arry['siteSettings']['porsw'] =  $_SESSION['sS']['porsw'];
$arry['siteSettings']['hobbip'] =  $_SESSION['sS']['hobbip'];


$arry['siteSettings']['rsc'] = $_SESSION['sS']['rsc'];
$arry['siteSettings']['mbc'] = $_SESSION['sS']['mbc'];
$arry['siteSettings']['lBarc'] = $_SESSION['sS']['lBarc'];
$arry['siteSettings']['tc'] = $_SESSION['sS']['tc'];
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
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['submit1'])) {








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

// // colour profiles
// $arry['siteSettings']['tcr'] =  $_POST['tcr'] ?? $arry['siteSettings']['tcr'];
// $arry['siteSettings']['tcg'] =  $_POST['tcg'] ?? $arry['siteSettings']['tcg'];
// $arry['siteSettings']['tcb'] =  $_POST['tcb'] ?? $arry['siteSettings']['tcb'] ;
// $arry['siteSettings']['lBarcR'] =  $_POST['lBarcR'] ?? $arry['siteSettings']['lBarcR'];
// $arry['siteSettings']['lBarcG'] =  $_POST['lBarcG'] ?? $arry['siteSettings']['lBarcG'];
// $arry['siteSettings']['lBarcB'] =  $_POST['lBarcB'] ?? $arry['siteSettings']['lBarcB'] ;
// $arry['siteSettings']['rscr'] =  $_POST['rscr'] ?? $arry['siteSettings']['rscr'];
// $arry['siteSettings']['rscg'] =  $_POST['rscg'] ?? $arry['siteSettings']['rscg'];
// $arry['siteSettings']['rscb'] =  $_POST['rscb'] ?? $arry['siteSettings']['rscb'];
// $arry['siteSettings']['pbcr'] =  $_POST['pbcr'] ?? $arry['siteSettings']['pbcr'];
// $arry['siteSettings']['pbcg'] =  $_POST['pbcg'] ?? $arry['siteSettings']['pbcg'];
// $arry['siteSettings']['pbcb'] =  $_POST['pbcb'] ?? $arry['siteSettings']['pbcb'];

// // widths
// $arry['siteSettings']['pombw'] =  $_POST['pombw'] ?? $arry['siteSettings']['pombw'];
// $arry['siteSettings']['polsw'] =  $_POST['polsw'] ?? $arry['siteSettings']['polsw'];
// $arry['siteSettings']['porsw'] =  $_POST['porsw'] ?? $arry['siteSettings']['porsw'];
// $arry['siteSettings']['hobbip'] =  $_POST['hobbip'] ?? $arry['siteSettings']['hobbip'] ;



}





}



$error = '';

?>
<div style="text-align: center"> <?php

?>
</div>
<?php

if (isset($_SERVER['REQUEST_METHOD'])) {

    if (isset($_POST['submit1'])) {
        
        if (isset($_POST['dfhb']) && isset($_POST['efhb'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE FULL HEIGHT BARS AT THE SAME TIME.<br>";
        } elseif (isset($_POST['dfhb']) && !isset($_POST['efhb'])) {
            $arry['siteSettings']['dfhb'] = 1;
            $arry['siteSettings']['efhb'] = 0;
        } elseif (!isset($_POST['dfhb']) && isset($_POST['efhb'])) {
            $arry['siteSettings']['efhb'] = 1;
            $arry['siteSettings']['dfhb'] = 0;
        }


        if (isset($_POST['emb']) && isset($_POST['dmb'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE BOTH MOVING BARS AT THE SAME TIME.<br>";
        } elseif (isset($_POST['emb']) && !isset($_POST['dmb'])) {
            $arry['siteSettings']['emb'] = 1;
            $arry['siteSettings']['dmb'] = 0;
        } elseif (!isset($_POST['emb']) && isset($_POST['dmb'])) {
            $arry['siteSettings']['dmb'] = 1;
            $arry['siteSettings']['emb'] = 0;
        }
    
        if (isset($_POST['dls']) && isset($_POST['els'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE THE LEFT SIDEBARS AT THE SAME TIME.<br>";
        } elseif (isset($_POST['dls']) && !isset($_POST['els'])) {
            $arry['siteSettings']['dls'] = 1;
            $arry['siteSettings']['els'] = 0;
        } elseif (!isset($_POST['dls']) && isset($_POST['els'])) {
            $arry['siteSettings']['els'] = 1;
            $arry['siteSettings']['dls'] = 0;
        }
        
        if (isset($_POST['ers']) && isset($_POST['drs'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE THE RIGHT BARS AT THE SAME TIME.<br>";
        } elseif (isset($_POST['ers']) && !isset($_POST['drs'])) {
            $arry['siteSettings']['ers'] = 1;
            $arry['siteSettings']['drs'] = 0;
        } elseif (!isset($_POST['ers']) && isset($_POST['drs'])) {
            $arry['siteSettings']['drs'] = 1;
            $arry['siteSettings']['ers'] = 0;
        }
        
        if (isset($_POST['ecb']) && isset($_POST['dcb'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE THE CORNER BANNER AT THE SAME TIME.<br>";
        } elseif (isset($_POST['ecb']) && !isset($_POST['dcb'])) {
            $arry['siteSettings']['ecb'] = 1;
            $arry['siteSettings']['dcb'] = 0;
        } elseif (!isset($_POST['ecb']) && isset($_POST['dcb'])) {
            $arry['siteSettings']['dcb'] = 1;
            $arry['siteSettings']['ecb'] = 0;
        }
        
        if (isset($_POST['embpb']) && isset($_POST['dmbpb'])) {
            $error .= "YOU MAY NOT ENABLE AND DISABLE THE MAIN BODY POSITION BANNER AT THE SAME TIME.<br>";
        } elseif (isset($_POST['embpb']) && !isset($_POST['dmbpb'])) {
            $arry['siteSettings']['embpb'] = 1;
            $arry['siteSettings']['dmbpb'] = 0;
        } elseif (!isset($_POST['embpb']) && isset($_POST['dmbpb'])) {
            $arry['siteSettings']['dmbpb'] = 1;
            $arry['siteSettings']['embpb'] = 0;
        }
    



        if ($_POST['tcr'] !== '' || $_POST['tcg'] !== '' || $_POST['tcb'] !== '') {


        if ($_POST['tcr'] !== '' && $_POST['tcg'] !== '' && $_POST['tcb'] !== '') {


        if (($_POST['tcr'] <= 255 && $_POST['tcr'] >= 0) && ($_POST['tcg'] <= 255 && $_POST['tcg'] >= 0) && ($_POST['tcb'] <= 255 && $_POST['tcb'] >= 0)) {
            
            $arry['siteSettings']['tc'] = 'rgb(' . $_POST['tcr'] . ',' . $_POST['tcg'] . ',' . $_POST['tcb'] . ')';
            $_SESSION['sS']['tc'] = $arry['siteSettings']['tc'];
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
                    $_SESSION['sS']['lBarc'] = $arry['siteSettings']['lBarc'];
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
                    $_SESSION['sS']['rsc'] = $arry['siteSettings']['rsc'];

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
                        $_SESSION['sS']['mbc'] = $arry['siteSettings']['mbc'];

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
                    
                    
                    $_SESSION['sS']['pombw'] = $_POST['pombw'];
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
                   
                    $_SESSION['sS']['polsw'] = $_POST['polsw'];
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
                    $_SESSION['sS']['porsw'] = $_POST['porsw'];
                } 

            } else {
                $error .= "YOU CANNOT ENTER A WIDTH OF MORE THAN THIRTY PERCENT FOR YOUR RIGHT SIDBAR.<BR>";

            }
        }

            if ($_POST['hobbip'] !== '') {
            if ($_POST['hobbip'] <= 400 && $_POST['hobbip']  >= 30 ) {
                if ($_SESSION['sS']['emb'] === 1 && $_POST['hobbip'] <= 120) {
                   
                    $_SESSION['sS']['hobbip'] = $_POST['hobbip'];


                } elseif ($_SESSION['sS']['dmb'] == 1) {
                
                    
                    $arry['siteSettings']['hobbip'] = $_POST['hobbip'];

                    
                    $_SESSION['sS']['hobbip'] = $_POST['hobbip'];
                    
                    
                  
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
$arry['siteSettings']['hobbip'] = ceil($number);
                    $arry['remainingHeight'] = 400 - intval($number);

                  

PRINT_R($_POST);


$arry['siteSettings']['rsc'] = $_SESSION['sS']['rsc'];

$arry['siteSettings']['mbc'] = $_SESSION['sS']['mbc'];
$arry['siteSettings']['lBarc'] = $_SESSION['sS']['lBarc'];
$arry['siteSettings']['tc'] = $_SESSION['sS']['tc'];
$arry['siteSettings']['pombw'] = $_SESSION['pombw'];
$arry['siteSettings']['porsw'] = $_SESSION['porsw'];
$arry['siteSettings']['hobbip'] = $_SESSION['hobbip'];
$arry['siteSettings']['polsw'] = $_SESSION['polsw'];
                    $_SESSION['sS'] = $arry['siteSettings'];

}

} else {
    header("Location: ../classes.php");
    exit;
    }