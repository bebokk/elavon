<?php

@include_once('sec.php');

DEFINE ("DB_USER", "cl44-elavon");
DEFINE ("DB_PASSWORD", "2!sNgzHnW");
DEFINE ("DB_HOST", "localhost");
DEFINE ("DB_NAME", "cl44-elavon");

$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR 
die ("Can`t connect with sql: ".mysql_error());

mysql_select_db (DB_NAME) OR die ("Can`t connect with database: ".mysql_error());

$data=NULL;

?>