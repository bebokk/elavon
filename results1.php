<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

session_start();
include_once('admin/config/mysql.php');
include_once('admin/functions.php');

include_once("results1_login.php");

$selected_userid=$_SESSION['user_results']['userid'];

//get info about selected user
$query = "SELECT * FROM users WHERE userid='".$selected_userid."' ORDER BY name ASC";
$result = @mysql_query ($query);
$user_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	foreach ($row as $key => $value) {
		$user_tab[$key]=$value;
	}
}

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

//get question names
$query = "SELECT * FROM questions WHERE questionid>0 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$questions99_tab[$row['questionid']]=$row['name'];
}
/*
echo "questions99_tab -- <pre>";
print_r($questions99_tab);
echo "</pre>";
*/

//get slt questions to calculations  
$query = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	
	foreach ($row as $key => $value) {
		$managers_tab[$row['userid']][$key]=$value;
	}	
	//get faces
	$query1 = "SELECT * FROM structure_basic_pictures WHERE tableid='".$row['userid']."' AND table_name='users'
	ORDER BY position ASC, createtime DESC LIMIT 0,1";
	$result1 = @mysql_query ($query1);
	$pic1='';
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
		$managers_tab[$row['userid']]['face']=adres_miniatury('admin/images/basic/',$row1['structure_basic_pictureid'].'.'.$row1['extension'],80,80);
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
$num_rows = mysql_num_rows($result);

$questions_tab='';
$questions1_tab='';
$answers_tab='';
$i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$i++;
	foreach ($row as $key => $value) {
		$questions_tab[$row['questionid']][$key]=$value;
	}
	$questions_tab[$row['questionid']]['i']=$i;

	//get all of the maching answers 
	$query1 = "SELECT * FROM answers WHERE answers_groupid='".$row["answers_groupid"]."' ORDER BY position ASC";    
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
		$answers_tab[$row['questionid']][$row1['answerid']]=$row1['name'];
	} 
}

/*
echo "answers_tab -- <pre>";
print_r($answers_tab);
echo "</pre>";
*/

//count questionnaries
$query = "SELECT * FROM questionnaries WHERE questionnarieid>0 AND questionnarieid>=266";
$result = @mysql_query ($query);
$num_rows = mysql_num_rows($result);
$questionnaries_i_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	
	$questionnaries_i_tab[$row['type']]++;
}

/*
echo "questionnaries_i_tab -- <pre>";
print_r($questionnaries_i_tab);
echo "</pre>";
*/

//get answers for slt
$query = "SELECT * FROM questionnaries,questionnaries_answers WHERE questionnaries.questionnarieid=questionnaries_answers.questionnarieid AND questionnaries.questionnarieid>=266 
ORDER BY questionnaries.questionnarieid DESC";
$result = @mysql_query ($query);
$questionnaries_answers_tab='';
$questionnaries_answers0_tab='';
$questionnaries_answers_own_tab='';
$questionnaries_answers1_tab='';
$questionnaries_answers2_tab='';
$questionnaries_answers3_tab='';
$questionnaries_answers4_tab='';
$questionnaries_answers4_1_tab='';
$questionnaries_answers4_2_tab='';
$max_val3_tab='';
$who_you_are=0;
$least_aligned='';
$least_aligned_tab='';
$dont_check_your_business=0;
$test1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	if ($test1_tab[$row['user']] == '') {
		$test1_tab[$row['user']]=$row['questionnarieid'];
	}
	
	if ($row['user'] == 27 OR $test1_tab[$row['user']] == $row['questionnarieid']) {

		//check how many people know who you are, question 1
		if ($row['type'] == 9 AND $row['questionid'] == 135) {

			$answerid1_tab=explode(',',$row['answerid1']);
			foreach ($answerid1_tab as $key => $value) {

				$answerid2_tab=explode(':',$value);

				if ($answerid2_tab[0] == $selected_userid) {

					$answerid3_tab=explode(' ',strtolower($user_tab['name']));
					$answerid2_tab[1]=strtolower($answerid2_tab[1]);

					//echo $answerid3_tab[0]." == ".$answerid2_tab[1]." OR ".$answerid3_tab[1]." == ".$answerid2_tab[1]."<br>";
					$answerid2_tab[1]=trim($answerid2_tab[1]);
					if ($answerid3_tab[0] == $answerid2_tab[1] OR $answerid3_tab[1] == $answerid2_tab[1] OR $user_tab['name'] == $answerid2_tab[1] OR 
					strstr($answerid2_tab[1], $answerid3_tab[1])) {
						$who_you_are++;
					}
				}			 
			}
		} elseif ($row['answers_groupid'] == 3) {

			//ECHO "TEST ".$row['questionid']."<BR>";
			$answerid1_tab=explode(',',$row['answerid1']);
			foreach ($answerid1_tab as $key => $value) {

				$answerid2_tab=explode(':',$value);

				if ($answerid2_tab[0] == $selected_userid) {

					$least_aligned[$row['questionid']]++;
					$least_aligned_tab[$row['questionid']][$row['questionnaries_answerid']]=$answerid2_tab[1];
				}
			}
		} elseif ($row['type'] == 10 AND $row['questionid'] == 81) {

			$answerid1_tab=explode(',',$row['answerid1']);
			foreach ($answerid1_tab as $key => $value) {

				$answerid2_tab=explode(':',$value);

				if ($answerid2_tab[0] == $selected_userid) {

					$dont_check_your_business++;
					$dont_check_your_business_tab[$row['questionnaries_answerid']]=$answerid2_tab[1];
				}
			}
		}

		if ($row['answers_groupid'] == 1) {

			$questionnaries_answers_tab[$row['questionid']]+=$row['answerid'];
			$questionnaries_answers1_tab[$row['questionid']]=$row['type'];

			//echo "user -- ".$row['user']."<br>";
			if ($row['user'] == $selected_userid) {
				$questionnaries_answers_own_tab[$row['questionid']]=$row['answerid'];					
			}
		}

		if ($row['answers_groupid'] == 5) {

			if ($row['answerid'] != -1) {
				$questionnaries_answers_tab[$row['questionid']]+=$row['answerid'];
				$questionnaries_answers0_tab[$row['questionid']]++;
				$questionnaries_answers1_tab[$row['questionid']]=$row['type'];

				//echo "user -- ".$row['user']."<br>";
				if ($row['user'] == $selected_userid) {
					$questionnaries_answers_own_tab[$row['questionid']]=$row['answerid'];					
				}
			}
		}
	  
		//for type 3 
		if ($row['answers_groupid'] == 3) {
		  
			$answerid_tab=explode(',',$row['answerid']);  
			foreach ($answerid_tab as $key => $value) {		
				if ($value != '') {
					$questionnaries_answers2_tab[$row['questionid']][$value]++;
					if ($max_val3_tab[$row['questionid']] < $questionnaries_answers2_tab[$row['questionid']][$value]) $max_val3_tab[$row['questionid']]=$questionnaries_answers2_tab[$row['questionid']][$value];
				}
			}
		}

		//for type 4
		if ($row['answers_groupid'] == 4) {	

			if (strstr($row['answerid'], ','.$selected_userid.',')) {
			  
				//echo "answerid -- ".$row['answerid']."<br>";
				//echo "selected_userid -- ".$selected_userid."<br>";
				//echo "selected_userid -- ".$selected_userid."<br>";
				
				$answerid_tab=explode(',',$row['answerid']);  
				$answerid1_tab=explode(';',$row['answerid1']);  
				$i=0;
				$selected_i=0;
				$selected_val=0;
				foreach ($answerid_tab as $key => $value) {
					if ($value == $selected_userid) $selected_i=$i;	
					$i++;
				}

				$answerid2_tab=explode(',',$answerid1_tab[$selected_i]);		
				foreach ($answerid2_tab as $key => $value) {		
					if ($value != '') {
						$questionnaries_answers3_tab[$row['questionid']][$value]++;
						if ($max_val4_tab[$row['questionid']] < $questionnaries_answers3_tab[$row['questionid']][$value]) $max_val4_tab[$row['questionid']]=$questionnaries_answers3_tab[$row['questionid']][$value];
					}
				}
			}
		}

		if ($row['answers_groupid'] == 11 OR $row['answers_groupid'] == 10) {
			  
			$answerid_tab=explode(',',$row['answerid1']);  
			foreach ($answerid_tab as $key => $value) {		

				$answerid1_tab=explode(':',$value);
				if ($answerid1_tab[0] == $selected_userid) {

			    	$questionnaries_answers4_tab[$row['questionid']]++;    	
			    	$questionnaries_answers4_1_tab[$row['questionid']]+=$answerid1_tab[1];
			    	$questionnaries_answers4_3_tab[$row['questionid']]+=($answerid1_tab[1]+1);
			    	$questionnaries_answers4_2_tab[$row['questionid']][$answerid1_tab[1]]++; 
			    }
				$questionnaries_answers5_tab[$row['questionid']]++;    	
				$questionnaries_answers5_1_tab[$row['questionid']]+=$answerid1_tab[1];
				$questionnaries_answers5_3_tab[$row['questionid']]+=($answerid1_tab[1]+1);
				$questionnaries_answers5_2_tab[$row['questionid']][$answerid1_tab[1]]++; 
			}
		}
	}
}

/*
echo "least_aligned_tab -- <pre>";
print_r($least_aligned_tab);
echo "</pre>"; 
echo "questionnaries_answers4_tab -- <pre>";
print_r($questionnaries_answers4_tab);
echo "</pre>"; 

echo "questionnaries_answers5_tab -- <pre>";
print_r($questionnaries_answers5_tab);
echo "</pre>"; 
*/

/*
echo "questionnaries_answers3_tab -- <pre>";
print_r($questionnaries_answers3_tab);
echo "</pre>"; 
*/

/*
echo "questionnaries_answers4_tab -- <pre>";
print_r($questionnaries_answers4_tab);
echo "</pre>"; 

echo "questionnaries_answers4_1_tab -- <pre>";
print_r($questionnaries_answers4_1_tab);
echo "</pre>"; 
*/

/*
echo "questionnaries_answers_own_tab -- <pre>";
print_r($questionnaries_answers_own_tab);
echo "</pre>"; 

echo "questionnaries_answers_tab -- <pre>";
print_r($questionnaries_answers_tab);
echo "</pre>"; 

echo "questionnaries_answers1_tab -- <pre>";
print_r($questionnaries_answers1_tab);
echo "</pre>"; 
*/

include_once('results1_disp.php');

?>