<?php
if (!defined("IN_TORRENT"))
      die("Access denied!");

/*
Plugin Name: Request torrent page
Plugin URI: http://bittytorrent.com/
Description: Create a request page
Version: 1.0
Author: AugustBurnsRedQC
Author URI: http://bittytorrent.com/
*/


//set plugin id as file name of plugin
$plugin_id = basename(__FILE__);

//some plugin data
$data['name'] = "Request torrent page";
$data['author'] = "AugustBurnsRedQC";
$data['url'] = "http://bittytorrent.com/";

//register plugin data
register_plugin($plugin_id, $data);

function requestPage() {
        global $hook,$conf;     
      $hook->add_page('request','');    
}
function requestLink() {
        global $hook,$conf;         
      $hook->addMenu('requestpageLink','Request','request',6);    
} 

 
add_hook('new_page','requestPage'); 
add_hook('action','requestLink');
 

