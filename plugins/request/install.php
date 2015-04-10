<?php
require('../../libs/database/ez_sql_core.php');
require('../../libs/database/ez_sql_mysql.php');
require('../../libs/db.php');
$db = new ezSQL_mysql($dbuser,$dbpass,$dbname,$dbhost); 

$sql = "CREATE TABLE request( ".
       "id INT NOT NULL AUTO_INCREMENT, ".
       "userid int(50) NOT NULL, ".
       "title varchar(100) NOT NULL, ".
       "PRIMARY KEY ( id )); ";

$db->query($sql);
if(! $db )
{
  die('Could not create table: ' . mysql_error());
}
echo "Table created successfully. You can now remove the plugins/request/install.php file.";
$db->disconnect();
?>