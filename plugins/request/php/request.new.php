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

addRequest(1,'test2');


function addRequest($userid,$title) {
        global $db,$conf;
        $query = "INSERT INTO request (id,userid,titre) 
              VALUES (
              'NULL',
              '".$db->escape($userid)."',
              '".$db->escape($title)."',)";
            $db->query($query);
            // $db->debug();
           
 
            // $paste = $db->get_row("SELECT uniqueid FROM ".$this->prefix_db."torrents WHERE id='$id'");
            // $this->redirect($conf['baseurl'].'/'.$paste->uniqueid);
    }