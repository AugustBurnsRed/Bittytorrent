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


if(isset($_POST['submitaddrequest'])) {
  if (!empty($_POST['name'])){    
      $startUp->addRequest(1,$_POST['name']);
  }
}

class Request extends Bittytorrent {
  public function addRequest($userid,$title) {
      global $db,$conf;
      $query = "INSERT INTO request (userid,title) 
            VALUES (
            '".$db->escape($userid)."',
            '".$db->escape($title)."')";
          $db->query($query);
          return $db->insert_id;
         

          // $paste = $db->get_row("SELECT uniqueid FROM ".$this->prefix_db."torrents WHERE id='$id'");
          // $this->redirect($conf['baseurl'].'/'.$paste->uniqueid);
  }
}
