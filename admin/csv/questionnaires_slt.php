<?php

session_start();
include_once('../config/mysql.php');

//get all of the answers for this questionnaries
$query = "SELECT * FROM questionnaries WHERE questionnarieid>=266 AMD user != '27'";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {			
	foreach ($row as $key => $value) {
		$questionnaries_tab[$row['user']][$key]=$value;
	}
}

$query = "SELECT * FROM questionnaries_answers,questionnaries WHERE
questionnaries_answers.questionnarieid=questionnaries.questionnarieid AND
questionnaries_answers.questionnarieid>=266";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {			
	foreach ($row as $key => $value) {
		$questionnaries_answers_tab[$row['user']][$row['questionid']][$key]=$value;
	}
}

$query = "SELECT 
questionid,
name,
charter,
extent_header,
usersgroupid,
questions_groupid,
pre_page,
answers_groupid
FROM 
questions WHERE questionid>0";
$query .= " AND usersgroupid=10";   
$query .= " ORDER BY position ASC";   
$result = @mysql_query ($query);
$questions_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	
	foreach ($row as $key => $value) {		
		$questions_tab[$row['questionid']][$key]=$value;
	}
}

$query = "SELECT * FROM usersgroups WHERE usersgroupid!=8";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {			
	foreach ($row as $key => $value) {
		$usersgroups_tab[$row['usersgroupid']]=$row['name'];
	}
}

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$users_tab[$row['userid']]=$row['name'];
}

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=questionnaire_slt.csv");
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies


foreach ($questions_tab as $key => $value) {
	
	echo ';'.$questions_tab[$key]['name'];
}
echo ' 
';

foreach ($questionnaries_answers_tab as $key => $value) {
	
	echo $users_tab[$key]; 	
	foreach ($questions_tab as $key1 => $value1) {		
		echo ';"'.$questionnaries_answers_tab[$key][$key1]['answer'].'"';
	}
	echo '
';

}

/*
echo 'Name,'.$users_tab[$questionnaries_tab['user']].'
'; 
echo 'Type,'.$usersgroups_tab[$questionnaries_tab['type']].'

';
echo 'Questions
';

foreach ($questionnaries_answers_tab as $key => $value) {

	echo '"'.$questionnaries_answers_tab[$key]['question'].'","'.$questionnaries_answers_tab[$key]['answer'].'"
';
}
*/





















?>