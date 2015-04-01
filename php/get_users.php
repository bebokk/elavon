<?php

include_once('../admin/config/mysql.php');
include_once('../admin/functions.php');

$query = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$managers_tab[$row['userid']]=$row['name'];
}

$outp='';
foreach ($managers_tab as $key => $value) {
	$outp.="<option value='".$key."'>".$value."</option>";
}
echo($outp);

?> 