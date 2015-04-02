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

switch (isset($_GET["act"])?$_GET["act"]:""){
    case 'new': 
            include 'request.new.php';
            $output = $smarty->fetch('plugins/request/html/request.new.html');
            break;
}

$smarty->assign('output', $output);