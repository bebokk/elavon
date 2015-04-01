<?php

session_start();
include_once('admin/config/mysql.php');
include_once('admin/functions.php');

$selected_userid=15;

//get slt users
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

//get groups
$query = "SELECT DISTINCT(questions_groups.questions_groupid),questions_groups.name 
FROM questions_groups,questions WHERE questions_groups.questions_groupid=questions.questions_groupid AND 
questions_groups.questions_groupid>0";
$query .= " AND questions_groups.usersgroupid=10";    
$query .= " ORDER BY questions_groups.position ASC"; 
$result = @mysql_query ($query);
$questions_groups_tab='';
$i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

  $i++;
  foreach ($row as $key => $value) {
    $questions_groups_tab[$row['questions_groupid']][$key]=$value;
  }
  $questions_groups_tab[$row['questions_groupid']]['i']=$i;
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
    $questions_tab[$row['questions_groupid']][$row['questionid']][$key]=$value;
  }
  $questions_tab[$row['questions_groupid']][$row['questionid']]['i']=$i;

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

$query = "SELECT * FROM questionnaries WHERE questionnarieid>0 AND type=10 AND questionnaries.createtime>'2015-02-19 12:30:07'";
$result = @mysql_query ($query);
$num_rows = mysql_num_rows($result);
$questionnaries_i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
  $questionnaries_i++;
}

//types settings, type , settingid 
$types_settings_tab[1][1]=1;
$types_settings_tab[1][2]=3;
$types_settings_tab[1][3]=5;
$types_settings_tab[2][1]=1;
$types_settings_tab[2][2]=50;
$types_settings_tab[2][3]=100;

//get answers for slt
$query = "SELECT * FROM questionnaries,questionnaries_answers WHERE questionnaries.questionnarieid=questionnaries_answers.questionnarieid AND
questionnaries.type=10 AND questionnaries.createtime>'2015-02-19 12:30:07'";
$result = @mysql_query ($query);
$questionnaries_answers_tab='';
$questionnaries_answers1_tab='';
$questionnaries_answers2_tab='';
$questionnaries_answers3_tab='';
$max_val3_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
  
  $questionnaries_answers_tab[$row['questionid']]+=$row['answerid'];
  $questionnaries_answers1_tab[$row['questionid']]=$row['answers_groupid'];
  
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
		/*
		echo "selected_i -- $selected_i <br>";				
		echo "answerid1_tab -- <pre>";
		print_r($answerid1_tab);
		echo "</pre>"; 
		*/

		$answerid2_tab=explode(',',$answerid1_tab[$selected_i]);
		
		foreach ($answerid2_tab as $key => $value) {		
			if ($value != '') {
				$questionnaries_answers3_tab[$row['questionid']][$value]++;
				if ($max_val4_tab[$row['questionid']] < $questionnaries_answers3_tab[$row['questionid']][$value]) $max_val4_tab[$row['questionid']]=$questionnaries_answers3_tab[$row['questionid']][$value];
			}
		}
    }
  }
}

/*
echo "answerid2_tab -- <pre>";
print_r($answerid2_tab);
echo "</pre>"; 

echo "questionnaries_answers3_tab -- <pre>";
print_r($questionnaries_answers3_tab);
echo "</pre>"; 

echo "max_val4_tab -- <pre>";
print_r($max_val4_tab);
echo "</pre>"; 
*/ 

$max_val31_tab='';
foreach ($questionnaries_answers2_tab as $key => $value) {
	foreach ($questionnaries_answers2_tab[$key] as $key1 => $value1) {	
    //$max_val31_tab[$key][$key1]=($value1*100)/$max_val3_tab[$key];
    $max_val31_tab[$key][$key1]=($value1*100)/11;
	}
}

$max_val41_tab='';
foreach ($questionnaries_answers3_tab as $key => $value) {
	foreach ($questionnaries_answers3_tab[$key] as $key1 => $value1) {	
    //$max_val41_tab[$key][$key1]=($value1*150)/$max_val4_tab[$key];
    $max_val41_tab[$key][$key1]=($value1*150)/11;
	}
}

/*
echo "managers_tab -- <pre>";
print_r($managers_tab);
echo "</pre>"; 

echo "max_val3 -- <pre>";
print_r($max_val3);
echo "</pre>"; 

echo "questionnaries_answers2_tab -- <pre>";
print_r($questionnaries_answers2_tab);
echo "</pre>"; 
*/

$questionnaries_answers_tab1='';
$questionnaries_answers_tab2_1='';
$questionnaries_answers_tab2_2='';
foreach ($questionnaries_answers_tab as $key => $value) {

  $questionnaries_answers_tab1[$key]=$questionnaries_answers_tab[$key]/$questionnaries_i;

  if ($questionnaries_answers1_tab[$key] == 1) {

    if ($questionnaries_answers_tab1[$key] < 3) {

      $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_tab1[$key])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);

      //echo "test1 -- ".$proc1."<br>";

      $questionnaries_answers_tab2_1[$key]=$proc1;
      $questionnaries_answers_tab2_2[$key]=$proc1*(-1);

    } else {

      $proc1 = (($questionnaries_answers_tab1[$key]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);

      //echo "test2 -- ".$proc1." -- ".$questionnaries_answers_tab1[$key]."<br>";

      $questionnaries_answers_tab2_1[$key]=$proc1;
      $questionnaries_answers_tab2_2[$key]=0;
    }
  } elseif ($questionnaries_answers1_tab[$key] == 5) {

    if ($questionnaries_answers_tab1[$key] < 50) {

      $proc1 = (($types_settings_tab[2][2]-$questionnaries_answers_tab1[$key])*50)/($types_settings_tab[2][2]-$types_settings_tab[2][1]);

      //echo "test1 -- ".$proc1."<br>";

      $questionnaries_answers_tab2_1[$key]=$proc1;
      $questionnaries_answers_tab2_2[$key]=$proc1*(-1);

    } else {

      $proc1 = (($questionnaries_answers_tab1[$key]-$types_settings_tab[2][2])*50)/($types_settings_tab[2][3]-$types_settings_tab[2][2]);

      //echo "test2 -- ".$proc1." -- ".$questionnaries_answers_tab1[$key]."<br>";

      $questionnaries_answers_tab2_1[$key]=$proc1;
      $questionnaries_answers_tab2_2[$key]=0;
    }
  } 
}

//get my answers 
$query = "SELECT * FROM questionnaries,questionnaries_answers WHERE questionnaries.questionnarieid=questionnaries_answers.questionnarieid AND
questionnaries.type=10 AND questionnaries.user='Andrew Key'";
$result = @mysql_query ($query);
$questionnaries1_answers_tab='';
$questionnaries1_answers1_tab='';
//echo "query - $query - $result <br>";
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
  
  $questionnaries1_answers_tab[$row['questionid']]+=$row['answerid'];
  $questionnaries1_answers1_tab[$row['questionid']]=$row['answers_groupid'];
}

$questionnaries1_answers_tab1='';
$questionnaries1_answers_tab2_1='';
$questionnaries1_answers_tab2_2='';
foreach ($questionnaries1_answers_tab as $key => $value) {

  $questionnaries1_answers_tab1[$key]=$questionnaries1_answers_tab[$key];

  if ($questionnaries1_answers1_tab[$key] == 1) {

    if ($questionnaries1_answers_tab1[$key] < 3) {

      $proc1 = (($types_settings_tab[1][2]-$questionnaries1_answers_tab1[$key])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);

      //echo "test1 -- ".$proc1."<br>";

      $questionnaries1_answers_tab2_1[$key]=$proc1;
      $questionnaries1_answers_tab2_2[$key]=$proc1*(-1);

    } else {

      $proc1 = (($questionnaries1_answers_tab1[$key]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);

      //echo "test2 -- ".$proc1." -- ".$questionnaries_answers_tab1[$key]."<br>";

      $questionnaries1_answers_tab2_1[$key]=$proc1;
      $questionnaries1_answers_tab2_2[$key]=0;
    }
  } elseif ($questionnaries1_answers1_tab[$key] == 5) {

    if ($questionnaries1_answers_tab1[$key] < 50) {

      $proc1 = (($types_settings_tab[2][2]-$questionnaries1_answers_tab1[$key])*50)/($types_settings_tab[2][2]-$types_settings_tab[2][1]);

      //echo "test1 -- ".$proc1."<br>";

      $questionnaries1_answers_tab2_1[$key]=$proc1;
      $questionnaries1_answers_tab2_2[$key]=$proc1*(-1);

    } else {

      $proc1 = (($questionnaries1_answers_tab1[$key]-$types_settings_tab[2][2])*50)/($types_settings_tab[2][3]-$types_settings_tab[2][2]);

      //echo "test2 -- ".$proc1." -- ".$questionnaries_answers_tab1[$key]."<br>";

      $questionnaries1_answers_tab2_1[$key]=$proc1;
      $questionnaries1_answers_tab2_2[$key]=0;
    }
  } 
}

/*
echo "questionnaries_answers_tab -- <pre>";
print_r($questionnaries_answers_tab);
echo "</pre>";

echo "questionnaries_answers1_tab -- <pre>";
print_r($questionnaries_answers1_tab);
echo "</pre>";

echo "questionnaries_answers_tab1 -- <pre>";
print_r($questionnaries_answers_tab1);
echo "</pre>";

echo "questionnaries_answers_tab2_1 -- <pre>";
print_r($questionnaries_answers_tab2_1);
echo "</pre>";
*/

/*
echo "questionnaries_answers_tab -- <pre>";
print_r($questionnaries_answers_tab);
echo "</pre>";

echo "questionnaries_answers_tab1 -- <pre>";
print_r($questionnaries_answers_tab1);
echo "</pre>";
*/

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <title>Questionnaire Results</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/results.css">
</head>
<body class="body-results">

  <header class="rs-head">
    <div class="rs-section-inner">
      <img class="rs-head-logo" src="img/tcp-logo-colour.svg" alt="logo">
    </div>
  </header>

  <? foreach ($questions_groups_tab as $key => $value) { ?>

    <!-- /.rs-head -->
    <header class="rs-section-head section-1">
      <div class="rs-section-inner">
        <div class="roundel">
          <img class="roundel-large" src="img/section-roundel-light.svg" alt="Section 1">
          <p class="roundel-text heading-1"><? echo $questions_groups_tab[$key]['i']; ?></p>
        </div>
        <h2 class="rs-section-head-title"><? echo $questions_groups_tab[$key]['name']; ?></h2>
      </div>
    </header>
    <!-- /.rs-section-head -->

    <section class="rs-section-container">
      <div class="rs-section-inner">
        <div class="rs-table">
          <div class="rs-table-row rs-table-head">
            <div class="rs-table-col rs-table-keys">
              <span class="rs-table-key prpl-key">Personal Ranking</span>
              <span class="rs-table-key blue-key">Top 100 Ranking</span>
              <span class="rs-table-key green-key">SLT Ranking</span>
            </div>
            <div class="rs-table-col rs-head-line-chart">
              <div class="rs-table-col-split">
                <span class="rs-table-col-cell">Strongly<br>disagree</span>
                <span class="rs-table-col-cell">Neutral</span>
                <span class="rs-table-col-cell">Strongly<br>agree</span>
              </div>
              <div class="rs-table-col-split hide-phone"></div>
            </div>
          </div>
          <? foreach ($questions_tab[$key] as $key1 => $value1) { ?>

            <? if ($questions_tab[$key][$key1]['answers_groupid'] == 1) { ?>

              <!-- /.rs-table-row -->
              <div class="rs-table-row">
                <div class="rs-table-col">
                  <span class="rs-question-num"><? echo $questions_tab[$key][$key1]['i']; ?></span>
                  <p class="rs-question"><? echo $questions_tab[$key][$key1]['name']; ?></p>
                </div>
                <div class="rs-table-col">
                  <div class="rs-table-col-split">
                    <div class="rs-line-chart">
                      <span class="rs-line-item rs-line-prpl negative" 
                      style="display:block;width: <? echo $questionnaries1_answers_tab2_1[$key1]; ?>%;
                      margin-left: <? echo $questionnaries1_answers_tab2_2[$key1]; ?>%;"></span>
                      <span class="rs-line-item rs-line-blue" 
                      style="display:block;width: <? echo $questionnaries_answers_tab2_1[$key1]; ?>%;
                      margin-left: <? echo $questionnaries_answers_tab2_2[$key1]; ?>%;"></span>
                    </div>
                  </div>
                  <div class="rs-table-col-split"></div>
                </div>
              </div>

            <? } elseif ($questions_tab[$key][$key1]['answers_groupid'] == 3) { ?>

              <!-- /.rs-table-row -->
              <div class="rs-table-row">
                <div class="rs-table-col rs-table-space">
                  <span class="rs-question-num"><? echo $questions_tab[$key][$key1]['i']; ?></span>
                  <p class="rs-question"><? echo $questions_tab[$key][$key1]['name']; ?></p>
                </div>
                <div class="rs-table-col">
                  <div class="rs-circle-chart-container">
                    <div class="rs-circle-chart-head">
                      <span class="rs-circle-chart-head-item">Least</span>
                      <span class="rs-circle-chart-head-item">Most</span>
                    </div>
                    <!-- /.rs-circle-chart-head -->
                    <div class="rs-circle-chart">
						
						<? 
						arsort($questionnaries_answers2_tab[$key1]);
						?>
						<? foreach ($questionnaries_answers2_tab[$key1] as $key2 => $value2) { ?>
						
              <? if ($key2 == $selected_userid) { ?>

	              <div class="rs-circle-chart-item" style="width: <? echo $max_val31_tab[$key1][$key2]; ?>%;">
  							<img src="<? echo $managers_tab[$key2]['face']; ?>" alt="" class="rs-circle-chart-avatar">
  							<div class="rs-circle-chart-text">
                  <p><? echo $questionnaries_answers2_tab[$key1][$key2]; ?> people selected you</p>
                  <p>Lorem ipsum dolor sit amet, et duo timeam voluptua appellantur. Congue noster, ad qui nemore quaeque.</p>
  							  <p>Nibh nusquam suscipit per ex, etota soluta.</p>
  							  <p>Comprehensam ne eam, nam diceret albucius. Congue noster, ad qui nemore quaeque.</p>
  							</div>
  						  </div>		
						  
              <? } ?>
            <? } ?>
						
                    </div>
                    <!-- /.rs-circle-chart -->
                  </div>
                </div>
                <!-- /.rs-table-col -->
              </div>

            <? } elseif ($questions_tab[$key][$key1]['answers_groupid'] == 4) { ?>

              <!-- /.rs-table-row -->
              <div class="rs-table-row">
                <div class="rs-table-col rs-table-space">
                  <span class="rs-question-num"><? echo $questions_tab[$key][$key1]['i']; ?></span>
                  <p class="rs-question"><? echo $questions_tab[$key][$key1]['name']; ?></p>
                </div>
                <div class="rs-table-col">
                  <div class="rs-ball-chart">
          
          <? 
          arsort($questionnaries_answers3_tab[$key1]);
          ?>
          <? foreach ($questionnaries_answers3_tab[$key1] as $key2 => $value2) { ?>
            <div class="rs-ball-chart-item" style="width: <? echo $max_val41_tab[$key1][$key2]; ?>px; height: <? echo $max_val41_tab[$key1][$key2]; ?>px">
              <span><? echo $answers_tab[$key1][$key2]; ?></span>
            </div>          
          <? } ?>
                  </div>
                </div>

            <? } elseif ($questions_tab[$key][$key1]['answers_groupid'] == 5) { ?>

              <!-- /.rs-table-row -->
              <div class="rs-table-row">
                <div class="rs-table-col">
                  <span class="rs-question-num"><? echo $questions_tab[$key][$key1]['i']; ?></span>
                  <p class="rs-question"><? echo $questions_tab[$key][$key1]['name']; ?></p>
                </div>
                <div class="rs-table-col">
                  <div class="rs-table-col-split">
                    <div class="rs-line-chart">
                      <span class="rs-line-item rs-line-prpl negative" 
                      style="display:block;width: <? echo $questionnaries1_answers_tab2_1[$key1]; ?>%;
                      margin-left: <? echo $questionnaries1_answers_tab2_2[$key1]; ?>%;"></span>
                      <span class="rs-line-item rs-line-blue" 
                      style="display:block;width: <? echo $questionnaries_answers_tab2_1[$key1]; ?>%;
                      margin-left: <? echo $questionnaries_answers_tab2_2[$key1]; ?>%;"></span>
                    </div>
                  </div>
                  <div class="rs-table-col-split"></div>
                </div>
              </div>

            <? } ?>
          <? } ?>

          </div>
          <!-- /.rs-table-row -->
        </div>
        <!-- /.rs-table -->
      </div>
    </section>
    <!-- /.rs-section-container -->
  <? } ?>

  <script>
    var chartItems = document.querySelectorAll('.rs-circle-chart-item');
    var chartItemArray = Array.prototype.slice.call(chartItems);
    chartItemArray.forEach(function (item, idx) {
      item.addEventListener('click', function (evt) {
        if (!item.classList.contains('hidden')) {
          item.classList.add('hidden');
        }
      });
    });
  </script>
</body>
</html>