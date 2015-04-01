<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

session_start();
include_once('admin/config/mysql.php');
include_once('admin/functions.php');

$selected_userid=$_SESSION['user_results']['userid'];

//get info about selected user
$user_tab['']='No one is selected';
$query = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$user_tab[$row['userid']]=$row['name'];
}

$query = "SELECT * FROM questionnaries,questionnaries_answers WHERE questionnaries.questionnarieid=questionnaries_answers.questionnarieid 
AND questionnaries.questionnarieid>=266 AND questionnaries_answers.questionid=134 ORDER BY questionnaries.questionnarieid DESC";
$result = @mysql_query ($query);
$questionnaries_answers_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$questionnaries_answers_tab[$row['answerid']]++;
}

/*
echo "questionnaries_answers_tab -- <pre>";
print_r($questionnaries_answers_tab);
echo "</pre>";
*/
$total=0;
foreach ($user_tab as $key => $value) {
	
	if ($questionnaries_answers_tab[$key] == '') $questionnaries_answers_tab[$key]=0;
	echo $user_tab[$key].",".$questionnaries_answers_tab[$key]."<br>";
	$total+=$questionnaries_answers_tab[$key];
}
echo "Total,".$total;



?>