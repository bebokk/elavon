<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

session_start();
include_once('../admin/config/mysql.php');
include_once('../admin/functions.php');

$info_list0_tab[1]='Personal results for <br>'.$_SESSION['user_results']['name'];
$info_list0_tab[2]='Team results for <br>'.$_SESSION['user_results']['name'];

$info_list1_tab[1][1]='How many Top 100 people typed your name?';
$info_list1_tab[1][2]='How many people in the Top 100 think you look least aligned of the SLT?';
$info_list1_tab[1][3]='Colleagues perception of your ability to check business and functional responsibilities at the door?';
$info_list1_tab[1][4]='Tailoring your messaging/communications to your audience';
$info_list1_tab[1][5]='Responsiveness to the concerns of the top 100';
$info_list1_tab[1][6]='Inspiring and engaging communication';
$info_list1_tab[1][7]='Communication as a leadership priority';
$info_list1_tab[1][8]='How many of the Top 100 consider you least capable of being engaging?';
//$info_list1_tab[1][9]='Which members of the SLT are least capable of the above';
$info_list1_tab[1][10]='You received this feedback from your SLT colleagues:';
$info_list1_tab[1][11]='Accepted Leadership';
$info_list1_tab[1][12]='Colleagues expressing concerns about your leadership acceptance';
$info_list1_tab[1][13]='Servant Leadership';
$info_list1_tab[1][14]='Progress toward giving and receiving feedback readily';
$info_list1_tab[1][15]='Face to Face interations wherever possible';
$info_list1_tab[1][16]='Self awareness';
$info_list1_tab[1][17]='Self Reliance';
$info_list1_tab[1][18]='Self Confidence';
$info_list1_tab[1][19]='Self Actualization';
$info_list1_tab[1][20]='Straightforwardness';
$info_list1_tab[1][21]='Relationship skills';
$info_list1_tab[1][22]='Empathy';
$info_list1_tab[1][23]='Self Control';
$info_list1_tab[1][24]='Adaptability';
$info_list1_tab[1][25]='Optimism';
$info_list1_tab[2][26]='Common Purpose - colleagues';
$info_list1_tab[2][27]='Common Purpose - self';
$info_list1_tab[2][28]='Clear Roles - as part of the team';
//$info_list1_tab[2][29]='BLANK - this question is not asked - delete row';
//$info_list1_tab[2][30]='Why do people think there is value in having an SLT at the top of our company?';
$info_list1_tab[2][31]='Solid Relationships - a cohesive unit';
$info_list1_tab[2][32]='SLT perception of ability to check business and functional responsibilities at the door';
$info_list1_tab[2][33]='SLT belief in Leadership acceptance';
$info_list1_tab[2][34]='SLT belief in Servant Leadership';
$info_list1_tab[2][35]='SLT perception of team decision-making capability';
$info_list1_tab[2][36]='Effective Processes - adopting new practices';
$info_list1_tab[2][37]='Solid Relationships - honoring commitments';
$info_list1_tab[2][38]='Commitment to improving team relationships';
$info_list1_tab[2][39]='Commitment to improving relationships with our people';
$info_list1_tab[2][40]='Commitment to improving relationships with customers';
$info_list1_tab[2][41]='Effective Communication - perception of team';
$info_list1_tab[2][42]='Effective communication - self perception';
$info_list1_tab[2][43]='Solid Relationships - Joined up and connected';
//$info_list1_tab[2][44]='Do the SLT put our team Purpose at the forefront of our minds every day?';
$info_list1_tab[2][45]='Are the SLT recognised for putting customers at the centre?';
$info_list1_tab[2][46]='Are the SLT recognised for developing our staff';
$info_list1_tab[2][47]='Are the SLT recognised for being visible to our team';
$info_list1_tab[2][48]='Are the SLT recognised for being decisive?';
$info_list1_tab[2][49]='Are the SLT recognised for focusing on execution?';
$info_list1_tab[2][50]='Are the SLT recognised for always having a plan B?';
$info_list1_tab[2][51]='Are the SLT recognised for hitting dates we commit to?';
$info_list1_tab[2][52]='Are the SLT recognised for being passionate about our business?';
$info_list1_tab[2][53]='Are the SLT recognised for communicating, communicating, communicating?';
//$info_list1_tab[2][54]='Are the SLT recognised for their overall leadership?';
$info_list1_tab[2][55]='Do the SLT role model excellent leadership and team behaviours?';
$info_list1_tab[2][56]='Is the SLT effective at prioritisation?';
$info_list1_tab[2][57]='Is the SLT effective at decision making?';
$info_list1_tab[2][58]='Progress towards role modelling punctuality?';
$info_list1_tab[2][59]='Progress to running effective meetings?';
$info_list1_tab[2][60]='Does the SLT leverage diversity?';

//question to slt
$question2slt_tab[1]=0;
$question2slt_tab[2]=0;
$question2slt_tab[3]=81;
$question2slt_tab[4]=82;
$question2slt_tab[5]=83;
$question2slt_tab[6]=84;
$question2slt_tab[7]=85;
$question2slt_tab[8]=0;
$question2slt_tab[9]=88;
$question2slt_tab[10]=88;
$question2slt_tab[11]=89;
$question2slt_tab[12]=91;
$question2slt_tab[13]=93;
$question2slt_tab[14]=116;
$question2slt_tab[15]=117;
$question2slt_tab[16]=123;
$question2slt_tab[17]=124;
$question2slt_tab[18]=125;
$question2slt_tab[19]=126;
$question2slt_tab[20]=127;
$question2slt_tab[21]=128;
$question2slt_tab[22]=129;
$question2slt_tab[23]=130;
$question2slt_tab[24]=131;
$question2slt_tab[25]=132;
$question2slt_tab[26]=78;
$question2slt_tab[27]=79;
$question2slt_tab[28]=86;
$question2slt_tab[29]=0;
$question2slt_tab[30]=0;
$question2slt_tab[31]=0;
$question2slt_tab[32]=80;
$question2slt_tab[33]=90;
$question2slt_tab[34]=92;
$question2slt_tab[35]=94;
$question2slt_tab[36]=95;
$question2slt_tab[37]=97;
$question2slt_tab[38]=98;
$question2slt_tab[39]=99;
$question2slt_tab[40]=100;
$question2slt_tab[41]=101;
$question2slt_tab[42]=102;
$question2slt_tab[43]=103;
$question2slt_tab[44]=102;
$question2slt_tab[45]=106;
$question2slt_tab[46]=107;
$question2slt_tab[47]=108;
$question2slt_tab[48]=109;
$question2slt_tab[49]=110;
$question2slt_tab[50]=111;
$question2slt_tab[51]=112;
$question2slt_tab[52]=113;
$question2slt_tab[53]=114;
$question2slt_tab[54]=0;
$question2slt_tab[55]=115;
$question2slt_tab[56]=118;
$question2slt_tab[57]=119;
$question2slt_tab[58]=120;
$question2slt_tab[59]=121;
$question2slt_tab[60]=122;

$question2top100_tab[1]=135;
$question2top100_tab[2]=139;
$question2top100_tab[3]=0;
$question2top100_tab[4]=140;
$question2top100_tab[5]=141;
$question2top100_tab[6]=142;
$question2top100_tab[7]=143;
$question2top100_tab[8]=174;
$question2top100_tab[9]=0;
$question2top100_tab[10]=0;
$question2top100_tab[11]=0;
$question2top100_tab[12]=0;
$question2top100_tab[13]=0;
$question2top100_tab[14]=156;
$question2top100_tab[15]=157;
$question2top100_tab[16]=163;
$question2top100_tab[17]=164;
$question2top100_tab[18]=165;
$question2top100_tab[19]=166;
$question2top100_tab[20]=167;
$question2top100_tab[21]=168;
$question2top100_tab[22]=169;
$question2top100_tab[23]=170;
$question2top100_tab[24]=171;
$question2top100_tab[25]=172;
$question2top100_tab[26]=0;
$question2top100_tab[27]=0;
$question2top100_tab[28]=0;
$question2top100_tab[29]=136;
$question2top100_tab[30]='?';
$question2top100_tab[31]=138;
$question2top100_tab[32]=0;
$question2top100_tab[33]=0;
$question2top100_tab[34]=0;
$question2top100_tab[35]=0;
$question2top100_tab[36]=0;
$question2top100_tab[37]=0;
$question2top100_tab[38]=0;
$question2top100_tab[39]=0;
$question2top100_tab[40]=0;
$question2top100_tab[41]=0;
$question2top100_tab[42]=0;
$question2top100_tab[43]=0;
$question2top100_tab[44]=0;
$question2top100_tab[45]=145;
$question2top100_tab[46]=146;
$question2top100_tab[47]=147;
$question2top100_tab[48]=148;
$question2top100_tab[49]=149;
$question2top100_tab[50]=150;
$question2top100_tab[51]=151;
$question2top100_tab[52]=152;
$question2top100_tab[53]=153;
$question2top100_tab[54]=157;
$question2top100_tab[55]=155;
$question2top100_tab[56]=158;
$question2top100_tab[57]=159;
$question2top100_tab[58]=160;
$question2top100_tab[59]=161;
$question2top100_tab[60]=162;

$display_types_tab[8]='Bar graph4';
$display_types_tab[9]='Bar graph5';  

//display types 
$display_types_tab[1]='Circle graph1'; 
$display_types_tab[2]='Circle graph2'; 
$display_types_tab[3]='Bar graph1'; 
$display_types_tab[4]='Text1'; 
$display_types_tab[5]='Bar graph2'; 
$display_types_tab[6]='Circle graph3';
$display_types_tab[7]='Bar graph3';

//type to quesions
$type2question_tab[1]=1;
$type2question_tab[2]=1;
$type2question_tab[3]=2;
$type2question_tab[4]=3;
$type2question_tab[5]=3;
$type2question_tab[6]=3;
$type2question_tab[7]=3;
$type2question_tab[8]=1;
$type2question_tab[9]=4;
$type2question_tab[10]=5;
$type2question_tab[12]=2;
$type2question_tab[13]=2;
$type2question_tab[14]=6;
$type2question_tab[15]=6;
$type2question_tab[16]=7;
$type2question_tab[17]=7;
$type2question_tab[18]=7;
$type2question_tab[19]=7;
$type2question_tab[20]=7;
$type2question_tab[21]=7;
$type2question_tab[22]=7;
$type2question_tab[23]=7;
$type2question_tab[24]=7;
$type2question_tab[25]=7;
$type2question_tab[26]=8;
$type2question_tab[27]=8;
$type2question_tab[28]=8;
$type2question_tab[29]=7;
$type2question_tab[30]=4;
$type2question_tab[31]=10;
$type2question_tab[32]=8;
$type2question_tab[33]=8;
$type2question_tab[34]=8;
$type2question_tab[35]=8;
$type2question_tab[36]=8;
$type2question_tab[37]=8;
$type2question_tab[38]=8;
$type2question_tab[39]=8;
$type2question_tab[40]=8;
$type2question_tab[41]=8;
$type2question_tab[42]=8;
$type2question_tab[43]=8;
$type2question_tab[44]=8;
$type2question_tab[45]=9;
$type2question_tab[46]=9;
$type2question_tab[47]=9;
$type2question_tab[48]=9;
$type2question_tab[49]=9;
$type2question_tab[50]=9;
$type2question_tab[51]=9;
$type2question_tab[52]=9;
$type2question_tab[53]=9;
$type2question_tab[54]=1;
$type2question_tab[55]=9;
$type2question_tab[56]=9;
$type2question_tab[57]=9;
$type2question_tab[58]=6;
$type2question_tab[59]=6;
$type2question_tab[60]=9;

//types settings, type , settingid 
$types_settings_tab[1][1]=1;
$types_settings_tab[1][2]=3;
$types_settings_tab[1][3]=5;
$types_settings_tab[2][1]=1;
$types_settings_tab[2][2]=50;
$types_settings_tab[2][3]=100;
$types_settings_tab[6][1]=-1;
$types_settings_tab[6][2]=0;
$types_settings_tab[6][3]=1;
$types_settings_tab[10][1]=-1;
$types_settings_tab[10][2]=0;
$types_settings_tab[10][3]=1;
$types_settings_tab[11][1]=-1;
$types_settings_tab[11][2]=0;
$types_settings_tab[11][3]=1;


$query = "SELECT * FROM questionnaries,questionnaries_answers WHERE questionnaries.questionnarieid=questionnaries_answers.questionnarieid 
AND questionnaries.questionnarieid>=266 AND questionnaries_answers.questionid!=135 ORDER BY questionnaries.questionnarieid DESC";
$result = @mysql_query ($query);
//echo "query -- $query -- $result <br>";

$questionnaries_answers_tab='';
$questionnaries_answers1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	foreach ($row as $key => $value) {
		$questionnaries_answers_tab[$row['questionnaries_answerid']][$key]=$value;
	}

	//get comments
	$answerid1_tab=explode(',',$row['answerid1']);

	//echo "answerid1 -- ".$row['answerid1']."<br>";
	foreach ($answerid1_tab as $key => $value) {

		//echo "value -- ".$value."<br>";
		$answerid2_tab=explode(':',$value);	 
		//echo "answerid2_tab -- ".$answerid2_tab[1]." -- ".$row['questionid']." -- ".$row['questionnaries_answerid']."<br>";
		$questionnaries_answers1_tab[$row['questionid']][$row['questionnaries_answerid']][$answerid2_tab[0]]=$answerid2_tab[1];
	}	
	//$questionnaries_answers_tab[$row['answerid']][$key]=$value;
}


foreach ($info_list1_tab as $key => $value) {
	foreach ($info_list1_tab[$key] as $key1 => $value1) {

		//display test
		$display_test=0;
		if ($questionnaries_answers1_tab[$question2top100_tab[$key1]] != '') foreach ($questionnaries_answers1_tab[$question2top100_tab[$key1]] as $key2 => $value2) {
			foreach ($questionnaries_answers1_tab[$question2top100_tab[$key1]][$key2] as $key3 => $value3) {
				$value3=trim($value3);
				if ($value3 != '' AND $value3 != '0' AND $value3 != '-1' AND $value3 != '1' AND $value3 != ';') {
					$display_test=1;
				}
			}
		}

		if ($display_test == 1) {

			echo "<br><br><b>".$value1."</b><br><br>";
			foreach ($questionnaries_answers1_tab[$question2top100_tab[$key1]] as $key2 => $value2) {
				foreach ($questionnaries_answers1_tab[$question2top100_tab[$key1]][$key2] as $key3 => $value3) {

					$value3=trim($value3);
					if ($value3 != '' AND $value3 != '0' AND $value3 != '-1' AND $value3 != '1' AND $value3 != ';') {
						echo " - ".$value3."<br>";
					}
				}
			}
		}
	}
}

/*
echo "questionnaries_answers1_tab -- <pre>";
print_r($questionnaries_answers1_tab);
echo "</pre>";
*/

/*
//get info about selected user
$user_tab['']='No one is selected';
$query = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$user_tab[$row['userid']]=$row['name'];
}

//get all questions
$query = "SELECT * FROM questions WHERE questionid>0 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$questions_tab[$row['questionid']]=$row['name'];
}

$query = "SELECT * FROM questionnaries,questionnaries_answers WHERE questionnaries.questionnarieid=questionnaries_answers.questionnarieid 
AND questionnaries.questionnarieid>=266 AND questionnaries_answers.questionid!=135 ORDER BY questionnaries.questionnarieid DESC";
$result = @mysql_query ($query);

echo "query -- $query -- $result <br>";

$questionnaries_answers_tab='';
$questionnaries_answers1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	foreach ($row as $key => $value) {
		$questionnaries_answers_tab[$row['questionnaries_answerid']][$key]=$value;
	}

	//get comments
	$answerid1_tab=explode(',',$row['answerid1']);
	foreach ($answerid1_tab as $key => $value) {

		$answerid2_tab=explode(':',$value);
		foreach ($answerid2_tab as $key1 => $value1) {
	 
			$questionnaries_answers1_tab[$row['questionid']][$row['questionnaries_answerid']]=$value1;
		}			
	}	
	//$questionnaries_answers_tab[$row['answerid']][$key]=$value;
}
*/
/*
echo "questionnaries_answers1_tab -- <pre>";
print_r($questionnaries_answers1_tab);
echo "</pre>";
*/

/*
foreach ($questions_tab as $key => $value) {

	if ($questionnaries_answers1_tab[$key] != '') { 

		//display test
		$display_test=0;
		foreach ($questionnaries_answers1_tab[$key] as $key1 => $value1) {

			$value1=trim($value1);
			if ($value1 != '' AND $value1 != '0' AND $value1 != '-1' AND $value1 != '1' AND $value1 != ';') {
				$display_test=1;
			}
		}

		if ($display_test == 1) {

			echo "<br><br><b>".$value."</b><br><br>";
			foreach ($questionnaries_answers1_tab[$key] as $key1 => $value1) {
				$value1=trim($value1);
			if ($value1 != '' AND $value1 != '0' AND $value1 != '-1' AND $value1 != '1' AND $value1 != ';') {
					echo " - ".$questionnaries_answers_tab[$key1]['user']." - ".$value1."<br>";
				}
			}
		}
	}
}
*/


























?>