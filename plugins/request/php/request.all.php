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

$request = new Request;
$smarty->assign('results',$request->getRequest());


class Request extends Bittytorrent{
function getRequest(){ 
    global $db,$smarty;
    $query_select = "";

    if (!empty($cat) && $cat != 'NULL') {
        $cat_sql = "SELECT * FROM categories WHERE url_strip='$cat'";
        $cat_sql = $db->get_row($cat_sql); 
    }  

    $sql = "SELECT SQL_CALC_FOUND_ROWS                   t.id,t.userid,t.title,users.name FROM ".$this->prefix_db."request AS t ";
    $sql .= "INNER JOIN users ON t.userid=users.id ";           
    /*$sql .= "INNER JOIN categories ON t.categorie=categories.id ";*/
    if (!empty($cat) && $cat != 'NULL') {
    $sql .= "WHERE categories.url_strip='$cat' OR categories.position RLIKE '^".$cat_sql->id.">[0-9]+>$'"; 
    }
      if (isset($_GET["search"])) {
       $testocercato = trim($_GET["search"]);
       $testocercato = explode(" ",$testocercato);
       if ($_GET["search"]!="")
          $search = "search=" . implode("+",$testocercato);
        for ($k=0; $k < count($testocercato); $k++) {
        // $query_select .= " t.title LIKE '%" . mysql_real_escape_string($testocercato[$k]) . "%'";
        $query_select .= sprintf(" t.title LIKE '%%%s%%'", "%" . $db->escape($testocercato[$k]) . "%");
         
        
        if ($k<count($testocercato)-1)
           $query_select .= " AND ";
        }
        $sql .= " WHERE " . $query_select;
    }    
    /*if (!empty($orderBy))        
        $sql .= " ORDER BY t.".$db->escape($orderBy)." ";
      else
        $sql .= " ORDER BY t.date ";*/
        
    /*if (!empty($orderBy))        
        $sql .= "".strtoupper($db->escape($axis))." ";  
      else
        $sql .= " DESC ";  */ 

    $sql .= " LIMIT %d,%d";

    $_query = sprintf($sql, SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit()); 
    $items = $db->get_results($_query); 

    $_row = $db->get_row("SELECT FOUND_ROWS() as total");        
    SmartyPaginate::setTotal($_row->total);

    if ($items) { 
    foreach ($items as $obj) {
            $array[$obj->id]['id'] = $obj->id;
            $array[$obj->id]['name'] = $this->Fuckxss($obj->name);
            $array[$obj->id]['userid'] = $obj->userid;
            $array[$obj->id]['title'] = $obj->title;
        }
        // $smarty->assign('getTorrents',$array);   
        return $array;
    } else
        return false;           
}
}