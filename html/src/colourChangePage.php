<?php
$currentPath = rtrim(__DIR__, DIRECTORY_SEPARATOR); include "../includes/header3.php";

if ($_SESSION['administrator']['root'] == 1) {
$eW = 0;
$error = "";
$error2 = '';
$changel = 0;
$changer = 0;
//errors
$eCWrong = 0;
$eDECheck = 0;
$eWG40MB = 0;
$eLRSWN60 = 0;
$eW30LS = 0;
$eDMBFM120 = 0;
$eNMH400NLH30 = 0;
$eWF = 0;
$eLRIPME100B60A80p = 0;
$eSIPMBB20A40p = 0;
$eQIPMBB59A100 = 0;
$eWMBB30A100 = 0;
$eRPB20A40p = 0;
$eSIPWMBB50A100 = 0;
$eQIPWMBB30A100 = 0;

// unset($_SESSION['siteSettings']);


if (isset($_SESSION['siteSettings']['pombw'])) {

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


$arry['siteSettings']['rSideColour'] = $_SESSION['siteSettings']['rSideColour'];
$arry['siteSettings']['mbc'] = $_SESSION['siteSettings']['mbc'];
$arry['siteSettings']['lBarc'] = $_SESSION['siteSettings']['lBarc'];
$arry['siteSettings']['tc'] = $_SESSION['siteSettings']['tc'];
} else {







    $_SESSION['siteSettings']['soqipip']                     =  80;  
$_SESSION['siteSettings']['soibip']                     =  80;    
$_SESSION['siteSettings']['solipip']                    =  70;    
$_SESSION['siteSettings']['soripip']                    =  30;    
$_SESSION['siteSettings']['pombw']                      =   86;
$_SESSION['siteSettings']['polsw']                      =  7;
$_SESSION['siteSettings']['porsw']                      =   7;
$_SESSION['siteSettings']['hobbip']                     =   50;
$_SESSION['siteSettings']['dfhb']                       = 0;
$_SESSION['siteSettings']['efhb']                       = 1;
$_SESSION['siteSettings']['emb']                        =  1;
$_SESSION['siteSettings']['dmb']                        =  0;
$_SESSION['siteSettings']['dls']                        =  0;
$_SESSION['siteSettings']['els']                        =  1;
$_SESSION['siteSettings']['ers']                        =  1;
$_SESSION['siteSettings']['drs']                        =  0;
$_SESSION['siteSettings']['ecb']                        =  1;
$_SESSION['siteSettings']['dcb']                        =  0;
$_SESSION['siteSettings']['embpb']                      = 0;
$_SESSION['siteSettings']['dmbpb']                      = 1;
$_SESSION['siteSettings']['emapb']                      = 0;
$_SESSION['siteSettings']['dmapb']                      = 1;
$_SESSION['siteSettings']['embpb']                      = 0;
$_SESSION['siteSettings']['dmbpb']                      = 1;
$_SESSION['siteSettings']['enableBackgroundPicture']    = 0;
$_SESSION['siteSettings']['disableBackgroundPicture']   = 1;
$_SESSION['siteSettings']['cotisp']                     = 'rgb(255,255,255)';
$_SESSION['siteSettings']['rSideColour']                = 'rgb(0,0,0)';
$_SESSION['siteSettings']['mbc']                        = 'rgb(16,13,217)';
$_SESSION['siteSettings']['lBarc']                      = 'rgb(0,0,0)';
$_SESSION['siteSettings']['tc']                         = 'rgb(16,13,217)';
$_SESSION['siteSettings']['coib']                       = 'rgb(255,255,255)';
$_SESSION['siteSettings']['cotiib']                     = 'rgb(0,0,0)';
$_SESSION['siteSettings']['cospb']                      = 'rgb(0,0,0)';
$_SESSION['siteSettings']['bc']                         = 'rgb(100,100,100)';
$_SESSION['siteSettings']['cotiqp']                     = 'rgb(0,0,0)';
$_SESSION['siteSettings']['coqaab']                     = 'rgb(255,255,255)';
$_SESSION['siteSettings']['cotiqaab']                   = 'rgb(0,0,0)';
$_SESSION['siteSettings']['coqb']                       = 'rgb(255,255,255)';
$_SESSION['siteSettings']['qbc']                        = 'rgb(0,0,0)';
$_SESSION['siteSettings']['siteH']                      = "Questionnaire!";

$_SESSION['siteSettings']['mabp'] = '';
$_SESSION['siteSettings']['cbp'] = '';
$_SESSION['siteSettings']['mbp'] = '';
$_SESSION['siteSettings']['bposa'] = '';
$_SESSION['siteSettings']['bpota'] = '';


    
     



}


if (isset($_SERVER['REQUEST_METHOD'])) {


    if (isset($_POST['saveChanges'])) {
        $_SESSION['siteSettings']['info'] = $_POST['info'];
        $cms->getMember()->saveChanges();


    }



    if (isset($_POST['submit'])) {
        $_SESSION['siteSettings']['siteH'] = $_POST['siteH'];

    }


    if (isset($_POST['submit0'])) {
        
        if (isset($_POST['dfhb']) && isset($_POST['efhb'])) {
            $eDECheck = 1;
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
            $eDECheck = 1;
        } elseif (isset($_POST['emb']) && !isset($_POST['dmb'])) {
            $_SESSION['siteSettings']['emb'] = 1;
            $_SESSION['siteSettings']['dmb'] = 0;
         
            
        } elseif (!isset($_POST['emb']) && isset($_POST['dmb'])) {
            $arry['siteSettings']['dmb'] = 1;
            $arry['siteSettings']['emb'] = 0;
            $_SESSION['siteSettings']['dmb'] = $arry['siteSettings']['dmb'];
            $_SESSION['siteSettings']['emb'] = $arry['siteSettings']['emb'];
            
        }
    
        if (isset($_POST['dls']) && isset($_POST['els'])) {
            $eDECheck = 1;
        } elseif (!isset($_POST['els']) && isset($_POST['dls']) && $_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['dls'] == 0) {
            $changel = 1;
            $_SESSION['siteSettings']['els'] = 0;
            $_SESSION['siteSettings']['dls'] = 1;
   
            $_SESSION['siteSettings']['leftSBTemp'] = $_SESSION['siteSettings']['polsw'];
            $_SESSION['siteSettings']['pombw'] = $_SESSION['siteSettings']['pombw'] + $_SESSION['siteSettings']['polsw'];
            $_SESSION['siteSettings']['polsw'] = 0;
        
        } elseif (isset($_POST['els']) && !isset($_POST['dls']) && $_SESSION['siteSettings']['dls'] == 1 && $_SESSION['siteSettings']['els'] == 0) {
            $_SESSION['siteSettings']['els'] = 1;
            $_SESSION['siteSettings']['dls'] = 0;
            $changel = 1;
            $_SESSION['siteSettings']['pombw'] = $_SESSION['siteSettings']['pombw'] - $_SESSION['siteSettings']['leftSBTemp']; 
           $_SESSION['siteSettings']['polsw'] = $_SESSION['siteSettings']['leftSBTemp'];
        
        }
        
        if (isset($_POST['ers']) && isset($_POST['drs'])) {
            
            $eDECheck = 1;
        
        } elseif (!isset($_POST['ers']) && isset($_POST['drs']) && $_SESSION['siteSettings']['ers'] == 1 && $_SESSION['siteSettings']['drs'] == 0 ) {
            $changer = 1;
            $_SESSION['siteSettings']['ers'] = 0;
            $_SESSION['siteSettings']['drs'] = 1;
      
           $_SESSION['siteSettings']['rightSBTemp'] = $_SESSION['siteSettings']['porsw'];
          
              $_SESSION['siteSettings']['pombw'] = $_SESSION['siteSettings']['pombw'] + $_SESSION['siteSettings']['porsw'];
             $_SESSION['siteSettings']['porsw'] = 0;

        } elseif (isset($_POST['ers']) && !isset($_POST['drs']) && $_SESSION['siteSettings']['drs'] == 1 && $_SESSION['siteSettings']['ers'] == 0) {
            
          
            
            $_SESSION['siteSettings']['ers'] = 1;
            $_SESSION['siteSettings']['drs'] = 0;
            $change = 1;

            
            $_SESSION['siteSettings']['pombw'] = $_SESSION['siteSettings']['pombw'] - $_SESSION['siteSettings']['rightSBTemp'];
            //check values
            $_SESSION['siteSettings']['porsw'] = $_SESSION['siteSettings']['rightSBTemp'];

        }
        
        if (isset($_POST['ecb']) && isset($_POST['dcb'])) {
            $eDECheck = 1;
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
            $eDECheck = 1;
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
        if (isset($_POST['enableBackgroundPicture']) && isset($_POST['disableBackgroundPicture'])) {
            $eDECheck = 1;
        } elseif (isset($_POST['enableBackgroundPicture']) && !isset($_POST['disableBackgroundPicture'])) {
            $arry['siteSettings']['enableBackgroundPicture'] = 1;
            $arry['siteSettings']['disableBackgroundPicture'] = 0;
            $_SESSION['siteSettings']['enableBackgroundPicture'] = $arry['siteSettings']['enableBackgroundPicture'];
            $_SESSION['siteSettings']['disableBackgroundPicture'] = $arry['siteSettings']['disableBackgroundPicture'];

        } elseif (!isset($_POST['enableBackgroundPicture']) && isset($_POST['disableBackgroundPicture'])) {
            $arry['siteSettings']['disableBackgroundPicture'] = 1;
            $arry['siteSettings']['enableBackgroundPicture'] = 0;
            $_SESSION['siteSettings']['enableBackgroundPicture'] = $arry['siteSettings']['enableBackgroundPicture'];
            $_SESSION['siteSettings']['disableBackgroundPicture'] = $arry['siteSettings']['disableBackgroundPicture'];
        }
    
    }
        if (isset($_POST['submit1'])) {

       if (($_POST['tcr'] != '' || $_POST['tcg'] != '' || $_POST['tcb'] != '') && ($_POST['tcr'] == '' || $_POST['tcg'] == '' || $_POST['tcb'] == '')  ) {
            $eCWrong = 1;
        }
 elseif ($_POST['tcr'] != '' && $_POST['tcg'] != '' && $_POST['tcb'] != '' ) {
        if (($_POST['tcr'] <= 255 && $_POST['tcr'] >= 0) && ($_POST['tcg'] <= 255 && $_POST['tcg'] >= 0) && ($_POST['tcb'] <= 255 && $_POST['tcb'] >= 0)) {
            
            $arry['siteSettings']['tc'] = 'rgb(' . $_POST['tcr'] . ',' . $_POST['tcg'] . ',' . $_POST['tcb'] . ')';
            $_SESSION['siteSettings']['tc'] = $arry['siteSettings']['tc'];
        }
        
    }

        if (($_POST['mbocr'] != '' && $_POST['mbocg'] != '' && $_POST['mbocb'] != '') ) {
       
        if (($_POST['mbocr'] <= 255 && $_POST['mbocr'] >= 0) && ($_POST['mbocg'] <= 255 && $_POST['mbocg'] >= 0) && ($_POST['mbocb'] <= 255 && $_POST['mbocb'] >= 0)) {
            
            $arry['siteSettings']['mboc'] = 'rgb(' . $_POST['mbocr'] . ',' . $_POST['mbocg'] . ',' . $_POST['mbocb'] . ')';
            $_SESSION['siteSettings']['mboc'] = $arry['siteSettings']['mboc'];
        }
        } elseif (($_POST['mbocr'] != '' || $_POST['mbocg'] != '' || $_POST['mbocb'] != '') && ($_POST['mbocr'] == '' || $_POST['mbocg'] == '' || $_POST['mbocb'] == '') ) {
            $eCWrong = 1;        }



        
            if ($_POST['writingr'] != '' && $_POST['writingg'] != '' && $_POST['writingb'] != '') {
   
        if ($_POST['writingr'] <= 255 && $_POST['writingr'] >= 0 && $_POST['writingg'] <= 255 && $_POST['writingg'] >= 0 && $_POST['writingb'] <= 255 && $_POST['writingb'] >= 0) {

            $_SESSION['siteSettings']['writing'] = 'rgb(' . $_POST['writingr'] . ',' .  $_POST['writingg'] . ',' . $_POST['writingb'] . ')';
        }   
        } elseif (($_POST['writingr'] != '' || $_POST['writingg'] != '' || $_POST['writingb'] != '') && ($_POST['writingr'] == '' || $_POST['writingg'] == '' || $_POST['writingb'] == '') ) {
            $eCWrong = 1;        }

   
            
            if ($_POST['tWritingr'] != '' && $_POST['tWritingg'] != '' && $_POST['tWritingb'] != '') {
   
        if ($_POST['tWritingr'] <= 255 && $_POST['tWritingr'] >= 0 && $_POST['tWritingg'] <= 255 && $_POST['tWritingg'] >= 0 && $_POST['tWritingb'] <= 255 && $_POST['tWritingb'] >= 0) {

            $_SESSION['siteSettings']['tWriting'] = 'rgb(' . $_POST['tWritingr'] . ',' .  $_POST['tWritingg'] . ',' . $_POST['tWritingb'] . ')';
        }
        }  elseif (($_POST['tWritingr'] != '' || $_POST['tWritingg'] != '' || $_POST['tWritingb'] != '') && ($_POST['tWritingr'] == '' || $_POST['tWritingg'] == '' || $_POST['tWritingb'] == '') ) {
          
            $eCWrong = 1;        }


 

            if ($_POST['lBarcR'] != '' && $_POST['lBarcG'] != '' && $_POST['lBarcB'] != '') {
   
                if (($_POST['lBarcR'] <= 255 && $_POST['lBarcR'] >= 0) && ($_POST['lBarcG'] <= 255 && $_POST['lBarcG'] >= 0) && ($_POST['lBarcB'] <= 255 && $_POST['lBarcB'] >= 0)) {
                    
                    $arry['siteSettings']['lBarc'] = "rgb(" . $_POST['lBarcR'] . ',' . $_POST['lBarcG'] . ',' . $_POST['lBarcB'] . ")";
                    $_SESSION['siteSettings']['lBarc'] = $arry['siteSettings']['lBarc'];
                
                }
                }  elseif (($_POST['lBarcR'] != '' || $_POST['lBarcG'] != '' || $_POST['lBarcB'] != '') && ($_POST['lBarcR'] == '' || $_POST['lBarcG'] == '' || $_POST['lBarcB'] == '') ) {
          
                    $eCWrong = 1;        }
        

     
                    if ($_POST['rscr'] != '' && $_POST['rscg'] != '' && $_POST['rscb'] != '') {
   
                if (($_POST['rscr'] <= 255 && $_POST['rscr'] >= 0) && ($_POST['rscg'] <= 255 && $_POST['rscg'] >= 0) && ($_POST['rscb'] <= 255 && $_POST['rscb'] >= 0)) {
                    
                    $arry['siteSettings']['rSideColour'] = "rgb(" . $_POST['rscr'] . ',' . $_POST['rscg'] . ',' . $_POST['rscb'] . ")";
                    $_SESSION['siteSettings']['rSideColour'] = $arry['siteSettings']['rSideColour'];
                }
                } elseif (($_POST['rscr'] != '' || $_POST['rscg'] != '' || $_POST['rscb'] != '') && ($_POST['rscr'] == '' || $_POST['rscg'] == '' || $_POST['rscb'] == '') ) {
          
                    $eCWrong = 1;        }
        
             
           
        
              
                    if ($_POST['mbcr'] != '' && $_POST['mbcg'] != '' && $_POST['mbcb'] != '') {
    
                    if (($_POST['mbcr'] <= 255 && $_POST['mbcr'] >= 0) && ($_POST['mbcg'] <= 255 && $_POST['mbcg'] >= 0) && ($_POST['mbcb'] <= 255 && $_POST['mbcb'] >= 0)) {
                        
                        $arry['siteSettings']['mbc'] = "rgb(" . $_POST['mbcr'] . ',' . $_POST['mbcg'] . ',' . $_POST['mbcb'] . ")";
                        $_SESSION['siteSettings']['mbc'] = $arry['siteSettings']['mbc'];
                    }
                    } elseif (($_POST['mbcr'] != '' || $_POST['mbcg'] != '' || $_POST['mbcb'] != '') && ($_POST['mbcr'] == '' || $_POST['mbcg'] == '' || $_POST['mbcb'] == '') ) {
                        $eCWrong = 1;        }
            
            
                


            

            if ($_POST['pombw'] != '') {
            if ($_POST['pombw'] <= 100 && $_POST['pombw'] >= 0) {
                if ((((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_POST['porsw'])) == 100) && $_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['ers'] == 1) 
               
                || (($_POST['porsw'] != '' && $_POST['pombw'] != '' && $_POST['polsw'] == '') && ((intval($_POST['pombw']) + intval($_POST['porsw']) + intval($_SESSION['siteSettings']['polsw'])) == 100 ) && $_SESSION['siteSettings']['dls'] == 1 && $_SESSION['siteSettings']['ers'] == 1) 
                || (($_POST['polsw'] != '' && $_POST['pombw'] != '' && $_POST['porsw'] == '') && ((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_SESSION['siteSettings']['porsw'])) == 100 ) && $_SESSION['siteSettings']['drs'] == 1 && $_SESSION['siteSettings']['els'] == 1) 
                || ($_POST['polsw'] != '' && $_POST['porsw'] == '' && $_POST['pombw'] != '' && $_SESSION['siteSettings']['ers'] == 1 && $_SESSION['siteSettings']['els'] == 1) 
                || ($_POST['porsw'] != '' && $_POST['polsw'] == '' && $_POST['pombw'] != '' && $_SESSION['siteSettings']['ers'] == 1 && $_SESSION['siteSettings']['els'] == 1)
                || ($_POST['pombw'] != '' && $_POST['polsw'] == '' && $_POST['porsw'] == ''))
                 {
                    $numeral = intval($_POST['pombw']);
                        if ($numeral === 100) {
                            $_SESSION['siteSettings']['porsw'] = 0;
                            $_SESSION['siteSettings']['polsw'] = 0;
                            $_SESSION['siteSettings']['pombw'] = 100;
                        } elseif (($_POST['polsw'] != '' && $_POST['porsw'] != '' && $_POST['pombw'] != '') 
                        || ($_POST['porsw'] != '' && $_POST['polsw'] == '' && $_POST['pombw'] != '') || ($_POST['polsw'] != '' && $_POST['porsw'] == '' && $_POST['pombw'] != '')) {
                         $_SESSION['siteSettings']['pombw'] = $_POST['pombw'];
                        } elseif ($_POST['pombw'] >= 40 && $_SESSION['siteSettings']['dls'] != 1 && $_SESSION['siteSettings']['drs'] != 1) {

                            $numeral = ((100 - ($_POST['pombw'] + intval($_SESSION['polsw']) + intval($_SESSION['porsw'])))/2);
                            $_SESSION['siteSettings']['porsw'] = $numeral;
                            $_SESSION['siteSettings']['polsw'] = $numeral;
                            $_SESSION['siteSettings']['pombw'] = $_POST['pombw'];
                        
                        } elseif ($_POST['pombw'] >= 40 && $_SESSION['siteSettings']['dls'] == 0 && $_SESSION['siteSettings']['drs'] == 1) {
                            $numeral = (100 - ($_POST['pombw']));
                            $_SESSION['siteSettings']['polsw'] = $numeral;
                            $_SESSION['siteSettings']['pombw'] = $_POST['pombw'];
                            
                        } elseif ($_POST['pombw'] >= 40 && $_SESSION['siteSettings']['dls'] == 1 && $_SESSION['siteSettings']['drs'] == 0) {
                            $numeral = (100 - ($_POST['pombw']));
                            $_SESSION['siteSettings']['porsw'] = $numeral;
                            $_SESSION['siteSettings']['pombw'] = $_POST['pombw'];
                            
                        } else {
                            $eWG40MB = 1;
                        }


                    } 

                } else {
                    $error .= "YOU CANNOT ENTER A WIDTH OF MORE THAN ONE HUNDRED PERCENT FOR YOUR MAIN BODY.<BR>";

                } 
            } 
        
            if ($_POST['porsw'] != '' && $_POST['polsw'] != '' && $_POST['pombw'] == '' && intval($_POST['porsw']) < 31 && intval($_POST['polsw']) < 31) {
                $_SESSION['siteSettings']['pombw'] = 98 - (intval($_POST['porsw']) + intval($_POST['polsw']));
            }
           

        if ($_POST['polsw'] !== '') {
            if ($_POST['polsw'] <= 30 && $_POST['polsw']  >= 0) {
                echo "<div class='centeredText'>here</div>";
                if ((((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_POST['porsw'])) == 100) && $_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['ers'] == 1)  
               
                || (($_POST['polsw'] != '' && $_POST['pombw'] != '') && ((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_SESSION['siteSettings']['porsw'])) == 100 ) && $_SESSION['siteSettings']['els'] == 1)
                || ($_POST['polsw'] != '' && $_POST['porsw'] == '' && $_POST['pombw'] == '' && $_SESSION['siteSettings']['dls'] != 1) || ($_POST['porsw'] != '' && $_POST['polsw'] == '' && $_POST['pombw'] == '' && $_SESSION['siteSettings']['ers'] == 1) ||
                ($_POST['porsw'] != '' && $_POST['polsw'] != '' && $_POST['pombw'] == '' && $_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['ers'] == 1) || ($_POST['polsw'] !== '' && $_POST['pombw'] != '' && $_SESSION['siteSettings']['els'] == 1)) {
                    
                    
                    if (($_POST['polsw'] != "" && $_POST['pombw'] == '' && $_POST['porsw'] != '')) {
                        echo "<div class='centeredText'>here</div>";
                        $numeral = intval($_SESSION['siteSettings']['porsw']) + intval($_POST['polsw']);
                    
                        if ($numeral <= 60) {
                        
                        $_SESSION['siteSettings']['pombw'] = (($_SESSION['siteSettings']['pombw'] + $_SESSION['siteSettings']['polsw'] + $_SESSION['siteSettings']['porsw']) - $_POST['polsw']);
                        $_SESSION['siteSettings']['polsw'] = $_POST['polsw'];
                
                        } else {
                
                        $eLRSWN60 =1;
                
                    } 
                
                
                        }  elseif ($_POST['porsw'] != "" && $_POST['pombw'] != '' && $_POST['polsw'] != '') {
                
                            $_SESSION['siteSettings']['polsw'] = $_POST['polsw'];
                
                        } else {
                            echo "<div class='centeredText'>here2</div>";
                    if (((intval($_POST['polsw']) + intval($_SESSION['siteSettings']['porsw']) + intval($_POST['pombw'])) == 100) && $_POST['polsw'] != '' && $_POST['porsw'] == '' && $_POST['pombw'] != '') {

                        $_SESSION['siteSettings']['polsw'] = $_POST['polsw'];
                        echo "<div class='centeredText'>here4</div>";

                    } else {
                        echo "<div class='centeredText'>here3</div>";
                        if (intval($_SESSION['siteSettings']['ers']) == 1 && intval($_SESSION['siteSettings']['porsw']) != 0 && ((intval($_POST['siteSettings']['polsw']) + intval($_SESSION['siteSettings']['pombw']))  != 100) && $_SESSION['siteSettings']['els'] == 1) {
                        $remainingNumeral =  (intval($_POST['polsw']) + intval($_SESSION['siteSettings']['pombw'])) + 100;
                        $numeral = 200 - $remainingNumeral;

                        if ($numeral > $_SESSION['siteSettings']['porsw'] && ((intval($numeral) + intval($_SESSION['siteSettings']['porsw'])) > 30) ) {
                            $_SESSION['siteSettings']['pombw'] = (($_SESSION['siteSettings']['pombw'] + $numeral) - $_SESSION['siteSettings']['porsw']);
                            echo "<div class='centeredText'>got 1</div>";
                     
                            $_SESSION['siteSettings']['polsw'] = $_POST['polsw'];
                        } else {
                            echo "<div class='centeredText'>got2</div>";

                            $_SESSION['siteSettings']['pombw'] = $_SESSION['siteSettings']['pombw'] + ($_SESSION['siteSettings']['polsw'] - $_POST['polsw']); 
                            $_SESSION['siteSettings']['polsw'] = $_POST['polsw'];
                        }
                    
                        } elseif ($_SESSION['siteSettings']['drs'] == 1) {
                            $_SESSION['siteSettings']['pombw'] = 100 - $_POST['polsw'];
                            $_SESSION['siteSettings']['polsw'] = $_POST['polsw'];
                            echo "<div class='centeredText'>here5</div>";

                        } else {
                            $_SESSION['siteSettings']['pombw'] = ($_SESSION['siteSettings']['pombw'] + $_SESSION['siteSettings']['porsw'] + $_SESSION['siteSettings']['polsw']) - $_POST['polsw'];

                          $_SESSION['siteSettings']['polsw'] = $_POST['polsw'];
                          echo "<div class='centeredText'>here6</div>";

                        }
                
                } 

            } 
        }
           
    } else {
                $eW30LS = 1;

            }
        }         
           
            if ($_POST['porsw'] !== '') {
            if ($_POST['porsw'] <= 30 && $_POST['porsw']  >= 0 ) {
                echo "<div class='centeredText'>here</div>";
                if ((((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_POST['porsw'])) == 100) && $_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['ers'] == 1) || 
               
                (($_POST['porsw'] != '' && $_POST['pombw'] != '') && ((intval($_POST['pombw']) + intval($_POST['porsw']) + intval($_SESSION['siteSettings']['polsw'])) == 100 ) && $_SESSION['siteSettings']['ers'] == 1)
                || ($_POST['porsw'] != '' && $_POST['polsw'] == '' && $_POST['pombw'] == '' && $_SESSION['siteSettings']['drs'] != 1) || ($_POST['porsw'] != '' && $_POST['polsw'] == '' && $_POST['pombw'] == '' && $_SESSION['siteSettings']['ers'] == 1) ||
                ($_POST['porsw'] != '' && $_POST['polsw'] != '' && $_POST['pombw'] == '' && $_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['ers'] == 1) || ($_POST['porsw'] !== '' && $_POST['pombw'] != '' && $_SESSION['siteSettings']['ers'] == 1)) {
                   
                    if (($_POST['porsw'] != "" && $_POST['pombw'] == '' && $_POST['polsw'] != '')) {
                   
                        echo "<div class='centeredText'>hereY</div>";
                        $numeral = intval($_SESSION['siteSettings']['polsw']) + intval($_POST['porsw']);
                   
                        if ($numeral <= 60) {
                   
                            $_SESSION['siteSettings']['pombw'] = ((intval($_SESSION['siteSettings']['pombw']) + intval($_SESSION['siteSettings']['porsw'])) - $_POST['porsw']);
                   
                            $_SESSION['siteSettings']['porsw'] = $_POST['porsw'];
                   
                            echo "<div class='centeredText'>here2</div>";

                        } else {
                   
                            $eLRSWN60 = 1;
                   
                        }
                   
                    }  elseif ($_POST['porsw'] != "" && $_POST['pombw'] != '' && $_POST['polsw'] != '') {
                   
                        $_SESSION['siteSettings']['porsw'] = $_POST['porsw'];
                        echo "<div class='centeredText'>here3</div>";

                    } else {
                        echo "<div class='centeredText'>here4</div>";
                        if (((intval($_POST['porsw']) + intval($_SESSION['siteSettings']['polsw']) + intval($_POST['pombw'])) == 100) && $_POST['polsw'] == '' && $_POST['porsw'] !== '' && $_POST['pombw'] != '') {
    
                            $_SESSION['siteSettings']['porsw'] = $_POST['porsw'];
                            echo "<div class='centeredText'>here6</div>";

                        } else {
                            if ($_SESSION['siteSettings']['els'] == 1 && intval($_SESSION['siteSettings']['polsw']) != 0 && ((intval($_POST['porsw']) + intval($_SESSION['siteSettings']['pombw']))  != 100) && $_SESSION['siteSettings']['ers'] == 1) {
                                $remainingNumeral =  (intval($_POST['porsw']) + intval($_SESSION['siteSettings']['pombw'])) + 100;
                                $numeral = 200 - $remainingNumeral;
        
                                if ($numeral > $_SESSION['siteSettings']['porsw'] && ((intval($numeral) + intval($_SESSION['siteSettings']['polsw'])) > 30) ) {
                                    $_SESSION['siteSettings']['pombw'] = (($_SESSION['siteSettings']['pombw'] + $numeral) - $_SESSION['siteSettings']['polsw']);
                                    echo "<div class='centeredText'>got 1</div>";
                             
                                    $_SESSION['siteSettings']['porsw'] = $_POST['porsw'];
                                } else {
                                    echo "<div class='centeredText'>got2</div>";
        
                                    $_SESSION['siteSettings']['pombw'] = $_SESSION['siteSettings']['pombw'] + ($_SESSION['siteSettings']['porsw'] - $_POST['porsw']); 
                                    $_SESSION['siteSettings']['porsw'] = $_POST['porsw'];
                                }
                        } elseif ($_POST['siteSettings']['dls'] == 1) {
                        
                            $_SESSION['siteSettings']['pombw'] = 100 - $_POST['porsw'];
                            $_SESSION['siteSettings']['porsw'] = $_POST['porsw'];

                        } else {
                            $_SESSION['siteSettings']['pombw'] = ($_SESSION['siteSettings']['pombw'] + $_SESSION['siteSettings']['porsw']) - $_POST['porsw'];
                            $_SESSION['siteSettings']['porsw'] = $_POST['porsw'];
                          }
                        }
                    
                    } 
                }
            } else {
                $eW30LS = 1;

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
                    $eDMBFM120 = 1;
                    
                }
            } else {
                $eNMH400NLH30 = 1;

            }
        }


// needs work on secondary errors
           
        if (file_exists($_FILES['mabp']['tmp_name']) || is_uploaded_file($_FILES['mabp']['tmp_name']))  {

                $moved = false;


                try {
                    $upload_path = '../uploads/';
                    $max_size = 2137552 * 3;
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif',];
                    $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', ];
                
                      $error2 = ($_FILES['mabp']['size'] <= $max_size) ? '' : 'Your file is too large. It must be under 2MB';
                      $type = mime_content_type($_FILES['mabp']['tmp_name']);
                      $error2 .= in_array($type, $allowed_types) ? '' : 'Your file is of the wrong type. It must be a jpg, jpeg, png, or gif.';
                      $ext = strtolower(pathinfo($_FILES['mabp']['name'], PATHINFO_EXTENSION));
                       $error2 .= in_array($ext, $allowed_exts) ? '' : 'It must have the right file extension.';
                
                       if ($error2 === '') {
                        $filename = create_filename($_FILES['mabp']['name'], $upload_path);
                        $destination = $upload_path . $filename;
                        $moved = move_uploaded_file($_FILES['mabp']['tmp_name'], $destination);
                        $destination = "../uploads/" . $filename;
                       
                        if ($_SESSION['siteSettings']['mabp'] != '') {
                         
                        if (unlink($_SESSION['siteSettings']['mabp'])) { } else { unlink($_SESSION['siteSettings']['mabp']); };

                        }
                        $_SESSION['siteSettings']['mabp'] = $destination;
                    }
                } catch (Error $e) {
                    $eWF= 1;
                }

            }





            if (file_exists($_FILES['cbp']['tmp_name']) || is_uploaded_file($_FILES['cbp']['tmp_name']))  {


    
                $moved = false;

                try {

                    $upload_path = '../uploads/';
                    $max_size = 2137552 * 3;
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif',];
                    $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', ];
                
                      $error2 = ($_FILES['cbp']['size'] <= $max_size) ? '' : 'Your file is too large. It must be under 2MB';
                      $type = mime_content_type($_FILES['cbp']['tmp_name']);
                      $error2 .= in_array($type, $allowed_types) ? '' : 'Your file is of the wrong type. It must be a jpg, jpeg, png, or gif.';
                      $ext = strtolower(pathinfo($_FILES['cbp']['name'], PATHINFO_EXTENSION));
                       $error2 .= in_array($ext, $allowed_exts) ? '' : 'It must have the right file extension.';
                       if ($error2 === '') {

                        $filename = create_filename($_FILES['cbp']['name'], $upload_path);
                        $destination = $upload_path . $filename;
                        $moved = move_uploaded_file($_FILES['cbp']['tmp_name'], $destination);
                        $destination = "../uploads/" . $filename;
                        if ($_SESSION['siteSettings']['cbp'] != '') {
                     
                        if (unlink($_SESSION['siteSettings']['cbp'])) {} else { unlink($_SESSION['siteSettings']['cbp']); };
                       }                       
                        $_SESSION['siteSettings']['cbp'] = $destination;

                    }  
                } catch (Error $e) {
                    $eWF= 1;
                    }




                
            }





           
            if (file_exists($_FILES['mbp']['tmp_name']) || is_uploaded_file($_FILES['mbp']['tmp_name']))  {





                $moved = false;


                try {
                    $upload_path = '../uploads/';
                    $max_size = 2137552 * 3;
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif',];
                    $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', ];
                
                      $error2 = ($_FILES['mbp']['size'] <= $max_size) ? '' : 'Your file is too large. It must be under 2MB';
                      $type = mime_content_type($_FILES['mbp']['tmp_name']);
                      $error2 .= in_array($type, $allowed_types) ? '' : 'Your file is of the wrong type. It must be a jpg, jpeg, png, or gif.';
                      $ext = strtolower(pathinfo($_FILES['mbp']['name'], PATHINFO_EXTENSION));
                       $error2 .= in_array($ext, $allowed_exts) ? '' : 'It must have the right file extension.';
                
                       if ($error2 === '') {
                        $filename = create_filename($_FILES['mbp']['name'], $upload_path);
                        $destination = $upload_path . $filename;
                        $moved = move_uploaded_file($_FILES['mbp']['tmp_name'], $destination);
                        $destination = "../uploads/" . $filename;
                        if ($_SESSION['siteSettings']['mbp'] != '') {
                     
                        if (unlink($_SESSION['siteSettings']['mbp'])) {} else { unlink($_SESSION['siteSettings']['mbp']); };
                       }                       
                        $_SESSION['siteSettings']['mbp'] = $destination;

                    }  
                } catch (Error $e) {
                    $eWF= 1;
                    }



                
            }

            if ($_POST['pombw'] !== '' && $_POST['polsw'] !== '' & $_POST['porsw'] !== '' ) {
            if ((intval($_POST['pombw']) + intval($_POST['polsw']) + intval($_POST['porsw'])) !== 100) {
                $eW = 1;

            } 
        }
    
    }



    if (isset($_POST['submit2'])) {

 

        if ($_POST['soibip'] != '' && $_POST['soibip'] <= 100 && $_POST['soibip'] >= 50) {

            $_SESSION['siteSettings']['soibip'] = $_POST['soibip'];

        } else {
            $eSIPWMBB50A100 = 1;
        }

      
        if ($_POST['solipip'] != '' ) {
            if ($_POST['solipip'] != '' && $_POST['soripip'] == '' && $_POST['solipip'] <= 80 && $_POST['solipip'] >= 60) {
            $_SESSION['siteSettings']['solipip'] = strval($_POST['solipip']);
            $_SESSION['siteSettings']['soripip'] = strval(100 - $_POST['solipip']);
            } elseif ((intval($_POST['soripip']) + intval($_POST['solipip'])) == 100 && $_POST['solipip'] <= 80) {
                $_SESSION['siteSettings']['solipip'] = strval($_POST['solipip']);
                
            } else {
                $eLRIPME100B60A80p = 1;
            }



        }

        if ($_POST['soripip'] != '' ) {
            if ($_POST['soripip'] != '' && $_POST['solipip'] == '' && $_POST['soripip'] >= 20 && $_POST['soripip'] <= 40) {
            
            $_SESSION['siteSettings']['soripip'] = strval($_POST['soripip']);
            $_SESSION['siteSettings']['solipip'] = strval(100 - $_POST['soripip']);
            } elseif ((intval($_POST['soripip']) + intval($_POST['solipip'])) == 100 && $_POST['soripip'] <= 40) {
                $_SESSION['siteSettings']['soripip'] = strval($_POST['soripip']);
                
            } else {
                $eRPB20A40p = 1;
            }
        }

        if ($_POST['coibr'] != '' && $_POST['coibg'] != '' && $_POST['coibb'] != '') {
   
        if ($_POST['coibr'] <= 255 && $_POST['coibr'] >= 0 && $_POST['coibg'] <= 255 && $_POST['coibg'] >= 0 && $_POST['coibb'] <= 255 && $_POST['coibb'] >= 0) {

            $_SESSION['siteSettings']['coib'] = "rgb(" . $_POST['coibr'] . "," . $_POST['coibg'] . "," . $_POST['coibb'] . ")";
        }
        } elseif (($_POST['coibr'] != '' || $_POST['coibg'] != '' || $_POST['coibb'] != '') && ($_POST['coibr'] == '' || $_POST['coibg'] == '' || $_POST['coibb'] == '') ) {
            $eCWrong = 1;        }


            if ($_POST['cotiibr'] != '' && $_POST['cotiibg'] != '' && $_POST['cotiibb'] != '') {
   

        if ($_POST['cotiibr'] <= 255 && $_POST['cotiibr'] >= 0 && $_POST['cotiibg'] <= 255 && $_POST['cotiibg'] >= 0 && $_POST['cotiibb'] <= 255 && $_POST['cotiibb'] >= 0) {

            $_SESSION['siteSettings']['cotiib'] = "rgb(" . $_POST['cotiibr'] . "," . $_POST['cotiibg'] . "," . $_POST['cotiibr'] . ")";
        }
        } elseif (($_POST['cotiibr'] != '' || $_POST['cotiibg'] != '' || $_POST['cotiibb'] != '') && ($_POST['cotiibr'] == '' || $_POST['cotiibg'] == '' || $_POST['cotiibb'] == '') ) {
            $eCWrong = 1;        }

   
            if ($_POST['cospbr'] != '' && $_POST['cospbg'] != '' && $_POST['cospbb'] != '') {
   

            if ($_POST['cospbr'] <= 255 && $_POST['cospbr'] >= 0 && $_POST['cospbg'] <= 255 && $_POST['cospbg'] >= 0 && $_POST['cospbb'] <= 255 && $_POST['cospbb'] >= 0) {

            $_SESSION['siteSettings']['cospb'] = 'rgb(' . $_POST['cospbr'] . ',' .  $_POST['cospbg'] . ',' . $_POST['cospbb'] . ')';
            }
        }  elseif (($_POST['cospbr'] != '' || $_POST['cospbg'] != '' || $_POST['cospbb'] != '') && ($_POST['cospbr'] == '' || $_POST['cospbg'] == '' || $_POST['cospbb'] == '') ) {
            $eCWrong = 1;        }

   
            if ($_POST['qbcr'] != '' && $_POST['qbcg'] != '' && $_POST['qbcb'] != '') {
   

            if ($_POST['qbcr'] <= 255 && $_POST['qbcr'] >= 0 && $_POST['qbcg'] <= 255 && $_POST['qbcg'] >= 0 && $_POST['qbcb'] <= 255 && $_POST['qbcb'] >= 0) {

            $_SESSION['siteSettings']['qbc'] = 'rgb(' . $_POST['qbcr'] . ',' .  $_POST['qbcg'] . ',' . $_POST['qbcb'] . ')';
            }
        }  elseif (($_POST['qbcr'] != '' || $_POST['qbcr'] != '' || $_POST['qbcb'] != '') && ($_POST['qbcr'] == '' || $_POST['qbcr'] == '' || $_POST['qbcb'] == '') ) {
            $eCWrong = 1;        }
        

            if ($_POST['bcr'] != '' && $_POST['bcg'] != '' && $_POST['bcb'] != '') {
   

        if ($_POST['bcr'] <= 255 && $_POST['bcr'] >= 0 && $_POST['bcg'] <= 255 && $_POST['bcg'] >= 0 && $_POST['bcb'] <= 255 && $_POST['bcb'] >= 0) {

            $_SESSION['siteSettings']['bc'] = 'rgb(' . $_POST['bcr'] . ',' .  $_POST['bcg'] . ',' . $_POST['bcb'] . ')';
        }
        }  elseif (($_POST['bcr'] != '' || $_POST['bcg'] != '' || $_POST['bcb'] != '') && ($_POST['bcr'] == '' || $_POST['bcg'] == '' || $_POST['bcb'] == '') ) {
            $eCWrong = 1;        }
        
   
            if ($_POST['cotispr'] != '' && $_POST['cotispg'] != '' && $_POST['cotispb'] != '') {
   

            if ($_POST['cotispr'] <= 255 && $_POST['cotispr'] >= 0 && $_POST['cotispg'] <= 255 && $_POST['cotispg'] >= 0 && $_POST['cotispb'] <= 255 && $_POST['cotispb'] >= 0) {

            $_SESSION['siteSettings']['cotisp'] = 'rgb(' . $_POST['cotispr'] . ',' .  $_POST['cotispg'] . ',' . $_POST['cotispb'] . ')';
            }   
        }   elseif (($_POST['cotispr'] != '' || $_POST['cotispg'] != '' || $_POST['cotispb'] != '') && ($_POST['cotispr'] == '' || $_POST['cotispg'] == '' || $_POST['cotispb'] == '') ) {
            $eCWrong = 1;        }


   
        if (file_exists($_FILES['bposa']['tmp_name']) || is_uploaded_file($_FILES['bposa']['tmp_name']))  {


    
            $moved = false;

            try {

                $upload_path = '../uploads/';
                $max_size = 2137552 * 3;
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif',];
                $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', ];
            
                  $error2 = ($_FILES['bposa']['size'] <= $max_size) ? '' : 'Your file is too large. It must be under 2MB';
                  $type = mime_content_type($_FILES['bposa']['tmp_name']);
                  $error2 .= in_array($type, $allowed_types) ? '' : 'Your file is of the wrong type. It must be a jpg, jpeg, png, or gif.';
                  $ext = strtolower(pathinfo($_FILES['bposa']['name'], PATHINFO_EXTENSION));
                   $error2 .= in_array($ext, $allowed_exts) ? '' : 'It must have the right file extension.';
                   echo "<div style='text-align: center'>". $error2 ."</div>";
                   if ($error2 === '') {

                    $filename = create_filename($_FILES['bposa']['name'], $upload_path);
                    $destination = $upload_path . $filename;
                    $moved = move_uploaded_file($_FILES['bposa']['tmp_name'], $destination);
                    $destination = "../uploads/" . $filename;
                    if ($_SESSION['siteSettings']['bposa'] != '') {
                 
                    if (unlink($_SESSION['siteSettings']['bposa'])) {} else { unlink($_SESSION['siteSettings']['bposa']); };
                   }                       
                    $_SESSION['siteSettings']['bposa'] = $destination;

                }  
            } catch (Error $e) {
                $eWF = 1;
            }




            
        }

    }

    if (isset($_POST['submit3'])) {
   
        if ($_POST['coqaabr'] != '' && $_POST['coqaabg'] != '' && $_POST['coqaabb'] != '') {
   
        if ($_POST['coqaabr'] <= 255 && $_POST['coqaabr'] >= 0 && $_POST['coqaabg'] <= 255 && $_POST['coqaabg'] >= 0 && $_POST['coqaabb'] <= 255 && $_POST['coqaabb'] >= 0) {

            $_SESSION['siteSettings']['coqaab'] = 'rgb(' . $_POST['coqaabr'] . ',' .  $_POST['coqaabg'] . ',' . $_POST['coqaabb'] . ')';
        }   
        }  elseif (($_POST['coqaabr'] != '' || $_POST['coqaabg'] != '' || $_POST['coqaabb'] != '') && ($_POST['coqaabr'] == '' || $_POST['coqaabg'] == '' || $_POST['coqaabb'] == '') ) {
            
            $errCWrong = 1;
        }
   
        if ($_POST['cotiqaabr'] != '' && $_POST['cotiqaabg'] != '' && $_POST['cotiqaabb'] != '') {
   
   
        if ($_POST['cotiqaabr'] <= 255 && $_POST['cotiqaabr'] >= 0 && $_POST['cotiqaabg'] <= 255 && $_POST['cotiqaabg'] >= 0 && $_POST['cotiqaabb'] <= 255 && $_POST['cotiqaabb'] >= 0) {

            $_SESSION['siteSettings']['cotiqaab'] = 'rgb(' . $_POST['cotiqaabr'] . ',' .  $_POST['cotiqaabg'] . ',' . $_POST['cotiqaabb'] . ')';
        }   
        }  elseif (($_POST['cotiqaabr'] != '' || $_POST['cotiqaabg'] != '' || $_POST['cotiqaabb'] != '') && ($_POST['cotiqaabr'] == '' || $_POST['cotiqaabg'] == '' || $_POST['cotiqaabb'] == '') ) {
            
            $errCWrong = 1;
        }
   
        if ($_POST['coqbr'] != '' && $_POST['coqbg'] != '' && $_POST['coqbb'] != '') {
   
   
        if ($_POST['coqbr'] <= 255 && $_POST['coqbr'] >= 0 && $_POST['coqbg'] <= 255 && $_POST['coqbg'] >= 0 && $_POST['coqbb'] <= 255 && $_POST['coqbb'] >= 0) {

            $_SESSION['siteSettings']['coqb'] = 'rgb(' . $_POST['coqbr'] . ',' .  $_POST['coqbg'] . ',' . $_POST['coqbb'] . ')';
        }   
        } elseif (($_POST['coqbr'] != '' || $_POST['coqbg'] != '' || $_POST['coqbb'] != '') && ($_POST['coqbr'] == '' || $_POST['coqbg'] == '' || $_POST['coqbb'] == '') ) {
            
            $errCWrong = 1;
        }
   
        if ($_POST['qbcr'] != '' && $_POST['qbcg'] != '' && $_POST['qbcb'] != '') {
   
   
        if ($_POST['qbcr'] <= 255 && $_POST['qbcr'] >= 0 && $_POST['qbcg'] <= 255 && $_POST['qbcg'] >= 0 && $_POST['qbcb'] <= 255 && $_POST['qbcb'] >= 0) {

            $_SESSION['siteSettings']['qbc'] = 'rgb(' . $_POST['qbcr'] . ',' .  $_POST['qbcg'] . ',' . $_POST['qbcb'] . ')';
        }        
        } elseif (($_POST['qbcr'] != '' || $_POST['qbcg'] != '' || $_POST['qbcb'] != '') && ($_POST['qbcr'] == '' || $_POST['qbcg'] == '' || $_POST['qbcb'] == '') ) {
            $eCWrong = 1;        }

   
            if ($_POST['cotiqpr'] != '' && $_POST['cotiqpg'] != '' && $_POST['cotiqpb'] != '') {
   
   
            if ($_POST['cotiqpr'] <= 255 && $_POST['cotiqpr'] >= 0 && $_POST['cotiqpg'] <= 255 && $_POST['cotiqpg'] >= 0 && $_POST['cotiqpb'] <= 255 && $_POST['cotiqpb'] >= 0) {

            $_SESSION['siteSettings']['cotiqp'] = 'rgb(' . $_POST['cotiqpr'] . ',' .  $_POST['cotiqpg'] . ',' . $_POST['cotiqpb'] . ')';
            
   }     }   elseif (($_POST['cotiqpr'] != '' || $_POST['cotiqpg'] != '' || $_POST['cotiqpb'] != '') && ($_POST['cotiqpr'] == '' || $_POST['cotiqpg'] == '' || $_POST['cotiqpb'] == '') ) {
    $eCWrong = 1;        }

     
        


        if ($_POST['soqipip'] != '') {
              if ($_POST['soqipip'] <= 100 && $_POST['soqipip'] >= 30) {
            $_SESSION['siteSettings']['soqipip'] = $_POST['soqipip'];
            } else {
                $eQIPWMBB30A100 = 1;
            }
        }
     


        if (file_exists($_FILES['bpota']['tmp_name']) || is_uploaded_file($_FILES['bpota']['tmp_name']))  {


    
            $moved = false;

            try {

                $upload_path = '../uploads/';
                $max_size = 2137552 * 3;
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif',];
                $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', ];
            
                  $error2 = ($_FILES['bpota']['size'] <= $max_size) ? '' : 'Your file is too large. It must be under 2MB';
                  $type = mime_content_type($_FILES['bpota']['tmp_name']);
                  $error2 .= in_array($type, $allowed_types) ? '' : 'Your file is of the wrong type. It must be a jpg, jpeg, png, or gif.';
                  $ext = strtolower(pathinfo($_FILES['bpota']['name'], PATHINFO_EXTENSION));
                   $error2 .= in_array($ext, $allowed_exts) ? '' : 'It must have the right file extension.';
                   echo "<div style='text-align: center'>". $error2 ."</div>";
                   if ($error2 === '') {

                    $filename = create_filename($_FILES['bpota']['name'], $upload_path);
                    $destination = $upload_path . $filename;
                    $moved = move_uploaded_file($_FILES['bpota']['tmp_name'], $destination);
                    $destination = "../uploads/" . $filename;
                    if ($_SESSION['siteSettings']['bpota'] != '') {
                 
                    if (unlink($_SESSION['siteSettings']['bpota'])) {} else { unlink($_SESSION['siteSettings']['bpota']); };
                   }                       
                    $_SESSION['siteSettings']['bpota'] = $destination;

                }  
            } catch (Error $e) {
                $eWF = 1;
            }




            
        }


    }
  
    if ($eCWrong == 1)           { $error .= "One of the colour fields was either missing or incorrect.<br>"; }
    if ($eDECheck == 1)          { $error .= "You cannot dissable and enable the same item at the same time.<br>"; }
    if ($eWG40MB == 1)           { $error .= "The width of your main body must be between 40 and 100 percent.<br>"; }
    if ($eLRSWN60 == 1)          { $error .= "Left and right sidebar must equate to no more than sixty percent.<br>"; }
    if ($eW30LS == 1)            { $error .= "Left sidebar cannot be more than 30 percent.<br>"; }
    if ($eDMBFM120 == 1)         { $error .= "Moving bars must be disabled to have a main banner bar of more than 120 percent.<br>"; }
    if ($eNMH400NLH30 == 1)      { $error .= "The main banner bar may not be over 400 pixels nor less than 30 pixels.<br>"; }
    if ($eWF == 1)               { $error .= "There was an error with an uploaded file.<br>"; }
    if ($eLRIPME100B60A80p == 1) { $error .= "The left information panel and right image sidebar must equate to 100 percent and the left information panel must be between 60 and 80 percent.<br>"; }
    if ($eRPB20A40p == 1)        { $error .= "The right picture bar must be set between 20 and 40 percent.<br>"; }
    if ($eSIPWMBB50A100 == 1)     { $error .= "The subject informaiton panel must be between 50 and 100 percent.<br>"; }
    if ($eQIPWMBB30A100 == 1)    { $error .= "The question informaiton panel must be between 50 and 100 percent.<br>"; }

    

if ($eW == 1) {
    $error .= "THE WIDTHS MUST EQUATE TO ONE HUNDRED PERCENT. YOU MUST STILL EQUATE YOUR WIDTHS TO ONE HUNDRED PERCENT WHEN THE LEFT AND RIGHT BARS ARE DISABLED OR ENTER ZERO.<br>";
}

if ($_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['ers'] == 0) {
    $numeral = $_SESSION['siteSettings']['polsw'];
} elseif ($_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['ers'] == 0) {
    $numeral = $_SESSION['siteSettings']['porsw'];
    
} elseif ($_SESSION['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['ers'] == 1) {
    $numeral = $_SESSION['siteSettings']['porsw'] + $_SESSION['siteSettings']['polsw'];
} {
    $numeral = 0;
}

$borders = $_SESSION['siteSettings']['porsw'] + $_SESSION['siteSettings']['polsw'];

$fPOSB = strval(ceil($numeral / 2));
$imgWidth = strval(floor((floatval((700 - ((700 * ($borders / 100)))) * (floatval($_SESSION['siteSettings']['soripip']) / floatval(100))))));

$numeral = floatval($_SESSION['siteSettings']['hobbip']) / 1.666666667;

$numeral = intval($numeral);
$arry['siteSettings']['hobbip2'] = floor($numeral);
$arry['remainingHeight'] = floor(400 - intval($numeral));
$arry['remainingHeight2'] = intval($arry['remainingHeight'] - (floatval($arry['remainingHeight']) * 0.6));

$lWidth = 700 * (($_SESSION['siteSettings']['polsw']) / 100);
$lWidth = ceil($lWidth);
$rWidth = 700 * (($_SESSION['siteSettings']['porsw']) / 100);
$rWidth = ceil($rWidth);
$mWidth = 700 * (($_SESSION['siteSettings']['pombw']) / 100);
$mWidth = ceil($rWidth);
$height = intval($_SESSION['siteSettings']['hobbip']);
$length = strlen($_SESSION['siteSettings']['siteH']);
if ($_SESSION['siteSettings']['hobbip'] > 60) {

    if ($length < 20 && $length >= 10 ) {
        $height2 = ceil((floatval($arry['siteSettings']['hobbip2']) -4) / 2);
        } elseif ($length < 50 && $length >= 20 ) {
$height2 = ceil((floatval($arry['siteSettings']['hobbip2']) -4) / 3);
} elseif ($length < 60 && $length >= 50) {
    $height2 = ceil((floatval($arry['siteSettings']['hobbip2']) -4) / 3.5);

} elseif ($length < 80 && $length >= 60) {
    $height2 = ceil((floatval($arry['siteSettings']['hobbip2']) -4) / 4.5);

} elseif ($length < 100 && $length >= 80) {
    $height2 = ceil((floatval($arry['siteSettings']['hobbip2']) -4) / 5.5);

} elseif ($length < 120 && $length >= 100) {
    $height2 = ceil((floatval($arry['siteSettings']['hobbip2']) -4) / 6.5);

} else {
    $height2 = ceil((floatval($arry['siteSettings']['hobbip2']) -4) / 1.5);
}
} elseif ($_SESSION['siteSettings']['hobbip'] <= 60 && $length < 15 && ($_SESSION['siteSettings']['porsw'] + $_SESSION['siteSettings']['polsw']) >= 40) {
    $height2 = (intval($arry['siteSettings']['hobbip2']) -4);
} elseif ($_SESSION['siteSettings']['hobbip'] <= 60 && $length >= 30  && ($_SESSION['siteSettings']['porsw'] + $_SESSION['siteSettings']['polsw']) >= 20) {
    $height2 = (intval($arry['siteSettings']['hobbip2']) -4) / 2;
} elseif ($_SESSION['siteSettings']['hobbip'] <= 60 && $length >= 45  && ($_SESSION['siteSettings']['porsw'] + $_SESSION['siteSettings']['polsw']) >= 0) {
    $height2 = (intval($arry['siteSettings']['hobbip2']) -4) / 4;
} else {
    $height2 = (intval($arry['siteSettings']['hobbip2']) -4);
}
$_SESSION['siteSettings']['siteH2'] = '<span style="font-size: ' . $height2 . 'px; font-weith: bold;">' . $_SESSION['siteSettings']['siteH'] . '</span>';


            ?><div style="margin: 0 auto; width: 80%">      
<?php
echo $_SESSION['siteSettings']['porsw'] . ' ' . $_SESSION['siteSettings']['pombw'] . ' ' . $_SESSION['siteSettings']['porsw'];
?>
</div>
<?php
if (isset($_SESSION['siteSettings'])) {
 

    
    
$arry['siteSettings']['dfhb'] = $_SESSION['siteSettings']['dfhb'];
$arry['siteSettings']['efhb'] = $_SESSION['siteSettings']['efhb'];
$arry['siteSettings']['rSideColour'] = $_SESSION['siteSettings']['rSideColour'];

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
$arry['siteSettings']['drs'] =   $_SESSION['siteSettings']['drs'];
$arry['siteSettings']['ers'] =   $_SESSION['siteSettings']['ers'];
$arry['siteSettings']['dmb'] =   $_SESSION['siteSettings']['dmb'];
$arry['siteSettings']['emb'] =   $_SESSION['siteSettings']['emb'];




}
}


?>

<div id="main">

<div style="width: 80%; margin: 0 auto;" class="centeredText">
    <p>
<?= $error ?? '' ?>
</p>


<div class="centeredText">
    <h4>
Please name the profile and submit to save changes.
</h4>
</div>
<form action="colourChangePage.php" method="POST">
<div class="margin40">
<input style="width: 100%" type="text" name="info">
</div>
<div style="width: 8%; margin: 0 auto; padding-top: 10px;">
    <input style="width: 100%;" type="submit" name="saveChanges" value="submit">
</div>

</form>
<br>


<form action="colourChangePage.php" method="POST">
    
<div class="centeredText">    
<h4>Please enter the website heading name, which will be displayed in the banner.</h4>
</div>
  
<div style=" padding-bottom: 10px;" class="margin40">
    <input  style="width: 100%;"  type="text" value="<?= $_SESSION['siteSettings']['siteH'] ?? '' ?>" name="siteH">

    
</div><div style="width: 8%;" class="submit-middle">
<input style="width: 100%;" type="submit" value="submit!" name="submit">


</div>
</form>

</div>
<?php


?>


<div >
<div style="height: 1200; width: 1100px; margin: 0 auto;">

        

<div style="display: inline-flex; flex-flow: column wrap; justify-content: flex-start; flex-wrap: wrap; width: 700px; height: 1250px;">

<div style="width: 700px; height: 400px;"> 
<div style="border: 10px solid black; width: 700px; height: 400px;">

<div style="display: block; width: 700px; height 400px; ">

         
         
   
               <div style=" color: white; height: <?= $arry['siteSettings']['hobbip2'] ?>px;    ">
            <div style=" <?php if (isset($_SESSION['siteSettings']['ecb']) && $_SESSION['siteSettings']['ecb'] == 1) { ?>background-image: url('<?= $_SESSION["siteSettings"]["cbp"] ?? ""?>');   background-size: contain; background-repeat: no-repeat; <?php } ?>  float: left; display: inline-block; border-bottom: 3px solid <?= $_SESSION['siteSettings']['lBarc'] ?? 'black' ?>; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; width: <?= $arry['siteSettings']['polsw'] ?>%;  background-color: <?php if ($arry['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['efhb'] == 1) { echo  $arry['siteSettings']['lBarc'] . '; border-bottom: 3px solid ' . $arry['siteSettings']['lBarc'] ; } else { echo $arry['siteSettings']['tc']; } ?>;">
                </div>
            
               
            <div style="<?php if ($_SESSION['siteSettings']['dmbpb'] == 0) { ?>background-image: url('<?= $_SESSION["siteSettings"]['mbp'] ?? '' ?>'); background-size: contain; background-repeat: no-repeat; <?php } ?>  float: left; display: inline-block; width: <?= $_SESSION['siteSettings']['pombw'] ?>%; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; text-align: center; background-color: <?= $_SESSION['siteSettings']['tc'] ?>; border-bottom: 3px solid <?= $_SESSION['siteSettings']['mboc'] ?? 'black' ?>; color: <?= $_SESSION['siteSettings']['tWriting'] ?? '' ?> !important;"><?= $_SESSION['siteSettings']['siteH2'] ?? ''  ?>

            </div>
            <div style="float: left; display: inline-block; position: relative; border-bottom: 3px solid <?= 'black' ?>;  z-index: 2; width: <?= $arry['siteSettings']['porsw'] ?>%; background-color: <?php if ($arry['siteSettings']['ers'] == 1 && $_SESSION['siteSettings']['efhb'] == 1) { echo $arry['siteSettings']['rSideColour'] . '; border-bottom: 3px solid ' . $_SESSION['siteSettings']['rSideColour'] ; } else { echo  $_SESSION['siteSettings']['tc']; } ?>; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; ">
            </div>
            
            
 
        </div>
        <div style="float: left; width: <?= $arry['siteSettings']['polsw'] ?>%; height: <?= $arry['remainingHeight']  ?>px; background-color: <?= $arry['siteSettings']['lBarc'] ?>;">
        </div>
        <div style=" display: inline-block; float: left; width: <?= $arry['siteSettings']['pombw'] ?>%; height: <?= $arry['remainingHeight']  ?>px; background-color: <?=  $arry['siteSettings']['mbc'] ?>;">
        <div style="color: <?= $_SESSION['siteSettings']['writing'] ?? '' ?> !important; <?php if ($_SESSION['siteSettings']['enableBackgroundPicture'] == 1) { ?>background-image: url('<?= $_SESSION["siteSettings"]["mabp"] ?? "" ?>'); background-size: contain; background-repeat: no-repeat; <?php } ?> display: block; height: <?= $arry['remainingHeight'] ?? '' ?>px; width: 100%; height: <?= $arry['remainingHeight'] -36 ?>px; margin: 0 auto; ">    
        <div style="text-align: center; height: <?= $arry['remainingHeight'] -36 ?>px;">
<p>
    <a style="position: relative; color: <?= $_SESSION['siteSettings']['writing'] ?? '' ?> !important;" href="colourChange.php">Link colour</a><p><br>
    <div style="text-align: justified !important; height: <?= $arry['remainingHeight'] -36 ?>px;"><p>Text.</p>
</div></div>
<div style="color: <?= $_SESSION['siteSettings']['writing'] ?? '' ?> !imporatant; position: relative;  width:100% height: 30px; text-align: center; background-color: <?=  $arry['siteSettings']['mbc'] ?>;">-1-2-3-</div>
</div>
</div>


       
    <div style="float: left; width: <?= $arry['siteSettings']['porsw'] ?>%; height: <?= $arry['remainingHeight'] ?>px; background-color: <?= $arry['siteSettings']['rSideColour']  ?>;">
    </div>
                </div>
                </div>
<div style="display: block;"> 
    <div style=" width: 400px; height: 275px;">
                </div>  
     <form action="colourChangePage.php" method="POST">
<div style="padding-left: 70px;">
<div style="width: 20%;" class="flex" ><div ><label for="emb">Enable moving bars:           </label>      </div>            <div style="padding-left: 35px;"><input type="checkbox" name="emb" /> </div></div>   
<div style="width: 20%;" class="flex" ><div ><label for="dmb">Disable moving bars:          </label>      </div>            <div style="padding-left: 35px;"><input type="checkbox" name="dmb" /> </div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="efhb">Enable full height bars:     </label></div>            <div style="padding-left: 35px;"><input type="checkbox" name="efhb"/></div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="dfhb">Disable full height bars:    </label></div>            <div style="padding-left: 35px;"><input type="checkbox" name="dfhb"/></div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="els">Enable left sidebar:          </label>     </div>            <div style="padding-left: 35px;"><input type="checkbox" name="els" /> </div></div> 
<div style="width: 20%;" class="flex" ><div ><label for="dls">Disable left sidebar:         </label>     </div>            <div style="padding-left: 35px;"><input type="checkbox" name="dls" /> </div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="ers">Enable right sidebar:         </label>     </div>            <div style="padding-left: 35px;"><input type="checkbox" name="ers" /> </div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="drs">Disable right sidebar:        </label>     </div>            <div style="padding-left: 35px;"><input type="checkbox" name="drs" /> </div></div>  
<div style="width: 20%;" class="flex" ><div ><label for="ecb">Enable corner banner:</label> </div>                <div style="padding-left: 35px;"><input type="checkbox" name="ecb" />  </div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="dcb">Disable corner banner:</label></div>                <div style="padding-left: 35px;"><input type="checkbox" name="dcb" />  </div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="ecb">Enable banner&nbsp;  text: <br></label> </div>                <div style="padding-left: 35px;"><input type="checkbox" name="ebt" />  </div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="dcb">Disable banner text:<br></label></div>                <div style="padding-left: 35px;"><input type="checkbox" name="dbt" />  </div> </div> 
<div style="width: 20%;" class="flex" ><div ><label for="embpb">Enable main body position banner:</label>  </div> <div style="padding-left: 35px;"><input type="checkbox" name="embpb" /> </div> </div>
<div style="width: 20%;" class="flex" ><div ><label for="dmbpb">Disable main body position banner:</label> </div> <div style="padding-left: 35px;"><input type="checkbox" name="dmbpb" /> </div> </div>
<div style="width: 20%;" class="flex" ><div ><label for="enableBackgroundPicture">Enable area body position background:</label>  </div> <div style="padding-left: 35px;"><input type="checkbox" name="enableBackgroundPicture" /> </div> </div>
<div style="width: 20%;" class="flex" ><div ><label for="disableBackgroundPicture">Disable area body position background:</label> </div> <div style="padding-left: 35px;"><input type="checkbox" name="disableBackgroundPicture" /> </div> </div>

<div style=" width: 400px; height: 50px;">

</div>  
<div style="padding-left: 210px;"><input type="submit" name="submit0" value="SUBMIT!">
                </form>
</div>                
</div>          
</div>
</div>


<div style="display: inline-flex; flex-flow: column wrap; justify-content: flex-start; flex-wrap: wrap; width: 400px; height: 1250px;">
    <form action="colourChangePage.php" method="POST" enctype="multipart/form-data">
    <div style="width: 100%; padding-left: 40px;">
<div style="display: block; padding-top: 18px;"><div><label  for="tWriting">Title text colour RGB:</label>           </div> <div style="height: 48px;"><div class="width50" > <div class="number"><input class="width100" type="number"  name="tWritingr" /></div><div class="number"> &nbsp; <input class="width100" type="number" name="tWritingg" /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="tWritingb" />   </div>  </div> </div> </div>
<div style="display: block; padding-top: 18px;"><div><label  for="writing">Main text colour RGB:</label>           </div> <div style="height: 48px;"><div class="width50" > <div class="number"><input class="width100" type="number"  name="writingr" /></div><div class="number"> &nbsp; <input class="width100" type="number" name="writingg" /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="writingb" />   </div>  </div> </div> </div>
<div style="display: block; padding-top: 18px;"><div><label  for="tc">Main top banner colour RGB:</label>           </div> <div style="height: 48px;"><div class="width50" > <div class="number"><input class="width100" type="number"  name="tcr" /></div><div class="number"> &nbsp; <input class="width100" type="number" name="tcg" /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="tcb" />   </div>  </div> </div> </div>
<div style="display: block; padding-top: 18px;"><div><label  for="mboc">Main border colour RGB:</label>           </div> <div style="height: 48px;"><div class="width50" > <div class="number"><input class="width100" type="number"  name="mbocr" /></div><div class="number"> &nbsp; <input class="width100" type="number" name="mbocg" /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="mbocb" />   </div>  </div> </div> </div>

<div style="display: block; padding-top: 18px;"><div><label  for="lBarc">Left sidebar colour RGB:</label>           </div> <div style="height: 48px;"><div  class="width50"> <div class="number"><input class="width100"  type="number" name="lBarcR"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="lBarcG" /></div><div class="number">  &nbsp; <input class="width100"  type="number"  name="lBarcB" />   </div></div></div> </div>
<div style="display: block; padding-top: 18px;"><div><label  for="mbc">Main body colour RGB:</label>                </div> <div style="height: 48px;"><div  class="width50"> <div class="number"><input class="width100"  type="number" name="mbcr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="mbcg" /></div><div class="number">  &nbsp; <input class="width100"  type="number"  name="mbcb" />   </div> </div> </div> </div>
<div style="display: block; padding-top: 18px;"><div><label  for="rSideColour">Right sidebar colour RGB:</label>    </div> <div style="height: 48px;"><div  class="width50"> <div class="number"><input class="width100" type="number" name="rscr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="rscg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="rscb" />   </div> </div> </div> </div>
<div style="display: block; padding-top: 18px;"><div style="line-height: 20px; padding-bottom: 15px;"><label  for="pombw">Percent of main body width:</label>        </div> <div style="height: 48px;"><input class="width50" type="number" size="3" name="pombw" />  </div> </div> 
<div style="display: block; "  ><div style="line-height: 20px; padding-bottom: 15px;"><label  for="polsw">Precent of left sidebar width:</label>     </div> <div style="height: 48px;"><input class="width50" type="number" size="3" name="polsw" />  </div> </div> 
<div style="display: block; "  ><div style="line-height: 20px; padding-bottom: 15px;"><label  for="porsw">Percent of right sidebar width:</label>    </div> <div style="height: 48px;"><input class="width50" type="number" size="3" name="porsw" />  </div> </div> 
<div style="display: block; "  ><div style="line-height: 20px; padding-bottom: 15px;"><label  for="hobbip">Hight of banner bar in pixels:</label>    </div> <div style="height: 48px;"><input class="width50" type="number" size="3" name="hobbip" /> </div> </div> 
<div style="display: block; "  ><div style="line-height: 20px; padding-bottom: 15px;"><label  for="mabp">Main area background picture:</label>       </div> <div style="padding-left: 15px; height: 48px;"><input type="file" name="mabp" />      </div></div>   
<div style="display: block; "  ><div style="line-height: 20px; padding-bottom: 15px;"><label  for="bc">Corner banner picture:</label>                </div> <div style="padding-left: 15px; height: 48px;"><input type="file" name="cbp" />        </div> </div>
<div style="display: block; "  ><div style="line-height: 20px; padding-bottom: 15px;"><label  for="mb">Main banner picture:</label>                  </div> <div style="padding-left: 15px; height: 48px;"><input type="file" name="mbp" >        </div></div> 
</div>

<div style="padding-left: 100px;"><input type="submit" name="submit1" value="SUBMIT!">
</div>

</form>
</div>
</div>
             





<div style="display: block; width: 1100px; height: 750px;">

        
   



<div style="display: inline-flex; flex-flow: column wrap; justify-content: flex-start; flex-wrap: wrap; width: 1100px; height: 750px">
        <div style="width: 700px; height 400px; border: 10px solid black;">

         
        <div style=" color: white; height: <?= $arry['siteSettings']['hobbip2'] ?>px;    ">
            <div style=" <?php if (isset($_SESSION['siteSettings']['ecb']) && $_SESSION['siteSettings']['ecb'] == 1) { ?>background-image: url('<?= $_SESSION["siteSettings"]["cbp"] ?? ""?>');   background-size: contain; background-repeat: no-repeat; <?php } ?>  float: left; display: inline-block; border-bottom: 3px solid <?= $_SESSION['siteSettings']['mbc'] ?? 'black' ?>; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; width: <?= $arry['siteSettings']['polsw'] ?>%;  background-color: <?php if ($arry['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['efhb'] == 1) { echo  $arry['siteSettings']['lBarc'] . '; border-bottom: 3px solid ' . $arry['siteSettings']['lBarc'] ; } else { echo $arry['siteSettings']['tc']; } ?>;">
                </div>
            
               
            <div style="<?php if ($_SESSION['siteSettings']['dmbpb'] != 1) { ?>background-image: url('<?= $_SESSION["siteSettings"]['mbp'] ?? '' ?>'); background-size: contain; background-repeat: no-repeat; <?php } ?>  float: left; display: inline-block; width: <?= $_SESSION['siteSettings']['pombw'] ?>%; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; text-align: center; background-color: <?= $_SESSION['siteSettings']['tc'] ?>; border-bottom: 3px solid <?= $_SESSION['siteSettings']['mboc'] ?? 'black' ?>; color: <?= $_SESSION['siteSettings']['tWriting'] ?? '' ?> !important;"><?= $_SESSION['siteSettings']['siteH2'] ?? '' ?>

            </div>
            <div style="float: left; display: inline-block; position: relative; border-bottom: 3px solid <?= 'black' ?>;  z-index: 2; width: <?= $arry['siteSettings']['porsw'] ?>%; background-color: <?php if ($arry['siteSettings']['ers'] == 1 && $_SESSION['siteSettings']['efhb'] == 1) { echo $arry['siteSettings']['rSideColour'] . '; border-bottom: 3px solid ' . $_SESSION['siteSettings']['rSideColour'] ; } else { echo  $_SESSION['siteSettings']['tc']; } ?>; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; ">
            </div>
            
            
</div>
<div style="float: left; width: <?= $arry['siteSettings']['polsw'] ?>%; height: <?= $arry['remainingHeight']  ?>px; background-color: <?= $arry['siteSettings']['lBarc'] ?>;">
</div>
<div style=" display: inline-block; float: left; width: <?= $arry['siteSettings']['pombw'] ?>%; height: <?= $arry['remainingHeight']  ?>px; background-color: <?=  $arry['siteSettings']['mbc'] ?>;">
<div style="<?php if ($_SESSION['siteSettings']['enableBackgroundPicture'] == 1) { ?>background-image: url('<?= $_SESSION["siteSettings"]["bposa"] ?? "" ?>'); background-size: contain; background-repeat: no-repeat; <?php } ?> display: block; height: <?= $arry['remainingHeight']?>px; width: 100%; margin: 0 auto; background-color: <?= $_SESSION['siteSettings']['cospb'] ?? '' ?>;">    








    <div style="width: 100%; height: <?= $arry['remainingHeight']  ?>px; color: <?= $_SESSION['siteSettings']['cotisp'] ?? '' ?> !important;">
                <div style="position: relative; height: 85%; width: 100%; margin: 0 auto;">    
                    <div style="text-align: center; height: 50%; ">
                        <div style="margin: 0 auto; width: 80%;">
<img style="width: auto; height: <?= 100 ?>%;" src="../images/plants dancing.jpg" />

                        </div> 

                    </div>
                    <div style="position: absolute; width: 100%; height: 50%;">
                        <div style="display: inline-flex; flex-flow: column wrap; justify-content: flex-start; flex-wrap: no-wrap; width:  <?= strval(intval($_SESSION['siteSettings']['solipip']) - 1) ?? '70' ?>%; height: <?= $arry['remainingHeight2'] - 2 ?>px;">
                          
                                <div style="color: <?= $_SESSION['siteSettings']['cotiib'] ?? '' ?> !important;  width:  <?= strval(intval($_SESSION['siteSettings']['soibip'])) ?? '70' ?>%; margin: 0 auto; border: 2px solid <?= $_SESSION['siteSettings']['bc'] ?? '' ?>; border-radius: 10px; background-color: <?= $_SESSION['siteSettings']['coib'] ?? '' ?>;">
                                <p>Info!</p>
                                </div>

                         
                      </div>

                        <div style="display: inline-flex; flex-flow: column wrap; justify-content: flex-start; flex-wrap: no-wrap; width: <?=  strval(intval($_SESSION['siteSettings']['soripip']) -1) ?? '30' ?>%; height: <?= $arry['remainingHeight2'] - 2 ?>px;">
                            <div style="width: 100%; padding-top: 10px;">
        <img style="max-height: <?=  $arry['remainingHeight2'] - 2 ?>; max-width:  <?= $imgWidth - 4 ?? '20' ?>px; border: 2px solid;" src="../images/plants dancing.jpg" /> <figcaption>info</figcaption>

                      
                    </div>
                </div>
            </div>
        </div>   
        </div>










</div>
</div>



<div style="float: left; width: <?= $arry['siteSettings']['porsw'] ?>%; height: <?= $arry['remainingHeight'] ?>px; background-color: <?= $arry['siteSettings']['rSideColour']  ?>;">
</div>
</div>





















<div style="display: inline-flex; flex-flow: column wrap; justify-content: flex-start; flex-wrap: wrap; width: 400px; height: 750px;">


<form action="colourChangePage.php" method="POST" enctype="multipart/form-data">
<div style="width: 400px; height: 700px; padding-left: 20px;">
<div  ><div style="padding-top: 18px;"><label for="coib">Colour of information box:</label>                          </div><div ><div  style="padding-bottom; 15px;" class="width50"> <div class="number"><input class="width100" type="number" name="coibr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="coibg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="coibb" />   </div>  </div> </div> </div>
<div  ><div style="padding-top: 18px;"><label for="cotisp">Colour of page text:</label>                </div><div><div style="padding-bottom; 15px;" class="width50"> <div class="number"><input class="width100" type="number" name="cotispr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="cotispg"/></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="cotispb" />   </div>  </div> </div> </div>
<div  ><div style="padding-top: 18px;"><label for="cotiib">Colour of text in inforamtion box:</label>                </div><div><div style="padding-bottom; 15px;" class="width50"> <div class="number"><input class="width100" type="number" name="cotiibr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="cotiibg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="cotiibb" />   </div>  </div> </div> </div>
<div  ><div style="padding-top: 18px;"><label for="cospb">Colour of subject page background:</label>                </div><div><div style="padding-bottom; 15px;" class="width50"> <div class="number"><input class="width100" type="number" name="cospbr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="cospbg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="cospbb" />   </div>  </div> </div> </div>
<div  ><div style="padding-top: 18px;" ><label for="bc">Qustionnaire border colour:</label>    </div> <div  ><div style=" padding-bottom: 15px;" class="width50"> <div style="width50" class="number"><input class="width100" type="number" name="bcr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="bcg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="bcb" />   </div>  </div> </div> </div>
<div  ><div style="height: 35px;"     ><label for="soibip">Size of informaiton box in percent:</label>               </div><div><input class="width50" type="number" name="soibip" /> </div> </div>  
<div  ><div style="height: 35px; padding-top: 18px;"><label for="solipip">Width of lefthand information panel in percent:</label>   </div>  <div  style="height: 40px;" class="width50"><input class="width100" type="number" name="solipip" /> </div> </div>  
<div  ><div style="height: 35px;"     ><label for="soripip">Width of righthand information panel in percent:</label>  </div><div style="height: 40px;" class="width50" ><input class="width100" type="number" name="soripip" /> </div> </div>  
<div ><div style="height: 35px;"      ><label for="bposa">Backgroud Picture of subject area:</label>                 </div><div style="padding-left: 15px;" class="width50"><input type="file" name="bposa" /></div>        </div>
<div><br></div>
<div style="width: 100%; padding-left: 70px;"><input type="submit" name="submit2" value="SUBMIT!">
</div>
 </div>

</div>
</div>

</div>






<div style="display: block; width: 1600px; height: 700px;">


<div style="display: inline-flex; flex-flow: column wrap; justify-content: flex-start; flex-wrap: wrap; width: 700px; height: 700px">
        <div style="width: 700px; height 400px; border: 10px solid black;">

         
        <div style=" color: white; height: <?= $arry['siteSettings']['hobbip2'] ?>px;    ">
            <div style=" <?php if (isset($_SESSION['siteSettings']['ecb']) && $_SESSION['siteSettings']['ecb'] == 1) { ?>background-image: url('<?= $_SESSION["siteSettings"]["cbp"] ?? ""?>');   background-size: contain; background-repeat: no-repeat; <?php } ?>  float: left; display: inline-block; border-bottom: 3px solid <?= 'black' ?>; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; width: <?= $arry['siteSettings']['polsw'] ?>%;  background-color: <?php if ($arry['siteSettings']['els'] == 1 && $_SESSION['siteSettings']['efhb'] == 1) { echo  $arry['siteSettings']['lBarc'] . '; border-bottom: 3px solid ' . $arry['siteSettings']['lBarc'] ; } else { echo $arry['siteSettings']['tc']; } ?>;">
                </div>
            
               
            <div style="<?php if ($_SESSION['siteSettings']['dmbpb'] != 1) { ?>background-image: url('<?= $_SESSION["siteSettings"]['mbp'] ?? '' ?>'); background-size: contain; background-repeat: no-repeat; <?php } ?>  float: left; display: inline-block; width: <?= $_SESSION['siteSettings']['pombw'] ?>%; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; text-align: center; background-color: <?= $_SESSION['siteSettings']['tc'] ?>; border-bottom: 3px solid <?= $_SESSION['siteSettings']['mboc'] ?? 'black' ?>; color: <?= $_SESSION['siteSettings']['tWriting'] ?? '' ?> !important;"><?= $_SESSION['siteSettings']['siteH2'] ?? '' ?>

            </div>
            <div style="float: left; display: inline-block; position: relative; border-bottom: 3px solid <?= 'black' ?>;  z-index: 2; width: <?= $arry['siteSettings']['porsw'] ?>%; background-color: <?php if ($arry['siteSettings']['ers'] == 1 && $_SESSION['siteSettings']['efhb'] == 1) { echo $arry['siteSettings']['rSideColour'] . '; border-bottom: 3px solid ' . $_SESSION['siteSettings']['rSideColour'] ; } else { echo  $_SESSION['siteSettings']['tc']; } ?>; height:  <?= $arry['siteSettings']['hobbip2'] -2 ?>px; ">
            </div>
            
            

</div>
<div style=" float: left; width: <?= $arry['siteSettings']['polsw'] ?>%; height: <?= $arry['remainingHeight']  ?>px; background-color: <?= $arry['siteSettings']['lBarc'] ?>;">
</div>
<div style="<?php if ($_SESSION['siteSettings']['enableBackgroundPicture'] == 1) { ?>  <?php } ?> color: <?= $_SESSION['siteSettings']['cotiqp'] ?? 'black' ?> !important; display: inline-block; float: left; width: <?= $arry['siteSettings']['pombw'] ?>%; height: <?= $arry['remainingHeight']  ?>px; background-color: <?=  $arry['siteSettings']['mbc'] ?>;">
<div style="display: block; height: <?= $arry['remainingHeight'] ?>px; width: 100%; margin: 0 auto; background-color: <?= $_SESSION['siteSettings']['coqb'] ?? '' ?>; background-image: url('<?= $_SESSION["siteSettings"]["bpota"] ?? "" ?>'); background-size: contain; background-repeat: no-repeat;">    







<br>
<div style="color: <?= $_SESSION['siteSettings']['cotiqaab'] ?? '' ?> !important;  padding: 15px; width: <?= $_SESSION['siteSettings']['soqipip'] - 6 ?? '80' ?>%; border: 2px solid <?= $_SESSION['siteSettings']['qbc'] ?? '' ?>; border-radius: 9px; background-color: white; margin: 0 auto;  background-color: <?= $_SESSION['siteSettings']['coqaab'] ?? '' ?>;">
            Would you like to change the colour of this website?
            <input type="checkbox">
            <br>
            <br>
            <br>
            <br>

            </div>
            <br>
         
            <div style="width: 10%; margin: 0 auto;">
            <input type="submit" value="Submit!" />
            </div>






</div>
</div>



<div style="float: left; width: <?= $arry['siteSettings']['porsw'] ?>%; height: <?= $arry['remainingHeight'] ?>px; background-color: <?= $arry['siteSettings']['rSideColour']  ?>;">
</div>
</div>



<div style="display: inline-flex; flex-flow: column wrap; justify-content: flex-start; flex-wrap: wrap; width: 400px; height: 700px;">
<fieldset style="padding-left: 20px;" class="fieldset100">
<form  action="colourChangePage.php" method="POST" enctype="multipart/form-data">

<div><div><div style="padding-top: 18px;"><label for="cotiqp">Colour of page text:</label>                </div><div><div style="padding-bottom; 15px;" class="width50"> <div class="number"><input class="width100" type="number" name="cotiqpr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="cotiqpg"/></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="cotiqpb" />   </div>  </div> </div> </div>
<div><div style="padding-top: 18px;" ><label for="coqaab">Colour of question and answer boxes:</label>              </div> <div ><div  class="width50"> <div  style="width50" class="number"><input class="width100" type="number" name="coqaabr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="coqaabg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="coqaabb" />   </div>  </div> </div> </div>
<div><div style="padding-top: 18px;" ><label for="cotiqaab">Colour of text in question and answer boxes:</label>    </div> <div  ><div  class="width50"> <div style="width50" class="number"><input class="width100" type="number" name="cotiqaabr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="cotiqaabg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="cotiqaabb" />   </div>  </div> </div> </div>
<div><div style="padding-top: 18px;" ><label for="coqb">Colour of questionnaire background:</label>    </div> <div  ><div style=" padding-bottom: 15px;" class="width50"> <div style="width50" class="number"><input class="width100" type="number" name="coqbr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="coqbg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="coqbb" />   </div>  </div> </div> </div>
<div><div style="padding-top: 18px;" ><label for="qbc">Border colour:</label>    </div> <div  ><div style=" padding-bottom: 15px;" class="width50"> <div style="width50" class="number"><input class="width100" type="number" name="qbcr"  /></div><div class="number"> &nbsp; <input class="width100" type="number"  name="qbcg" /></div><div class="number">  &nbsp; <input  class="width100" type="number"  name="qbcb" />   </div>  </div> </div> </div>
<div><div style="height: 35px; padding-top: 18px;"     ><label for="soqipip">Size of question information panel in percent:</label>   </div>  <div  style="height: 40px;" class="width50"><input class="width100" type="number" name="soqipip" /> </div> </div>  
<div><div style="height: 35px;"><label for="bpota">Background picture of test area:</label>                   </div>  <div style="padding-left: 15px;" class="width50"><input type="file" name="bpota" />        </div></div> 
<br>
<div style="padding-left: 65px;"><input type="submit" name="submit3" value="SUBMIT!">
</div>
</fieldset>     
</div>
</div>

</div>

<div style="display: block;">
<div class="centeredText">
    <h1>
Please name the profile and submit to save changes.
</h1>
</div>
<form action="colourChangePage.php" method="POST">
<div class="margin40">
<input type="text" style="width: 100%" name="info">
</div>
<div style="width: 8%; margin: 0 auto;">
    <input style="width: 100%;" type="submit" name="saveChanges" value="submit">
</div>

</form>
<br>
<br>
<br>
<br>

</div>
</div>
</div>
</div>
</body>
</html>
<?php

} else {
    header("Location: ../classes.php");
    exit;
    }