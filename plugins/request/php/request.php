<?php
/*
        __                        ________        
_____ _/  |_  _____   ____   ____ \_____  \______ 
\__  \    __\/     \ /  _ \ /    \  _(__  <_  __ \
 / __ \|  | |  Y Y  (  <_> )   |  \/       \  | \/
(____  /__| |__|_|  /\____/|___|  /______  /__|   
     \/           \/            \/       \/    
Contact:  contact.atmoner@gmail.com     
          
*/

$output = "";
$smarty->assign('output', $output);
require('plugins/request/lang/lang_'.$_SESSION['strLangue'].'.php');
$smarty->assign("requestLang",$requestLang);
//require('../lang_'.$_SESSION['strLangue'].'.php');

switch (isset($_GET["act"])?$_GET["act"]:""){
    case 'new': 
            include 'request.new.php';
            $output = $smarty->fetch('plugins/request/html/request.new.html');
            break;
    case 'all': 
            include 'request.all.php';
            $output = $smarty->fetch('plugins/request/html/request.all.html');
            break;
    case 'install': 
            header('Location: /plugins/request/install.php');
            break;
    case '':
           header('Location: request/all/');
}

$smarty->assign('output', $output);