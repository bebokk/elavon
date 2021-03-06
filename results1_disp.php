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
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/results.css">

	<script src="js/jquery.min.js"></script>
 	<script src="js/jquery-ui.js"></script>
 	<script src="js/results1_disp.js"></script>

</head>
<body class="body-results">

	<input type="hidden" name="position" value="" id="position" />
	<!-- Sticky header --> 
	<div class="rs-table-row rs-table-head rs-sticky-header" style="margin-top: -150px;">
		<div class="rs-section-inner">
			<div class="rs-table-col rs-table-keys">
				<span class="rs-table-key prpl-key">Personal Ranking</span>
				<span class="rs-table-key blue-key">Top 100 (about SLT)</span>
				<span class="rs-table-key red-key">Top 100 (about you)</span>
				<span class="rs-table-key green-key">SLT Ranking</span>
			</div>
			<div class="rs-triple-notes">
				<div class="rs-note-icon rs-note-icon1" id="rs-note-icon1">					
					<br />
					<br />
					<p><strong>Hover over graphs for further information</strong></p>
				</div>
			</div>
		</div>
	</div>

	<header class="rs-head">
		<div class="rs-section-inner">
			<img class="rs-head-logo" src="img/tcp-logo-colour.svg" alt="logo">
			<a href="results1.php?logout=1" class="rs-head-logout">Log out</a>
		</div>
	</header>
	
	<? $i=0; ?>
	<? foreach ($info_list0_tab as $key => $value) { ?>
			
		<!-- /.rs-head -->
		<header class="rs-section-head section-1">	
			<div class="rs-section-inner">
				<div class="roundel">
					<img class="roundel-large" src="img/section-roundel-light.svg" alt="Section 1">
					<p class="roundel-text heading-1"><? echo $key; ?></p>
				</div>
				<h2 class="rs-section-head-title"><? echo $value; ?></h2>
			</div>
		</header>
		<!-- /.rs-section-head -->	
		<section class="rs-section-head section-2">
			<div class="rs-section-inner">
				<p class="rs-section-personal-intro">
					<? if ($key == 1) { ?>
						<span style="font-weight:bold;font-size:18px;">Insights and perspectives arising from the SLT Survey March 2015</span><br />						<br />
						Welcome to your personal (and confidential) Report from the recent SLT Leadership and Team 
						Effectiveness Survey.<br />
						<br />
						As you know, the purpose of this survey is to provide an opportunity for the SLT to listen to feedback, 
						reflect and make adjustments to build your performance and contribution to Elavon.<br />
						<br />
						As you will appreciate, there is now a wealth of data that has come together from your own input; the 
						responses from your SLT colleagues; and importantly the responses from the Top 100 leaders. I have 
						reviewed the findings from the survey and considered these in the context of our previous work 
						together including the Emotional Capital work. This has enabled me to now offer the most meaningful 
						insights that will enable you to fulfil the ‘purpose’ of this survey. <br />
						<br />
						You will see that the Report contains those insights that are personal and confidential to you, and 
						those insights that relate to the team as a whole. The team insights will be discussed at the April 2015 
						offsite. <br />
						<br />
						There will be no obligation for you to share the personal and confidential insights with colleagues. You 
						may choose to share these findings and perspectives with your colleagues if you believe that this will 
						enhance the trust and relationships within the SLT. Sharing and engaging colleagues can also help 
						you to make changes to your leadership by asking them to ‘notice’ and to hold you accountable for 
						any changes that you choose to work on.<br />
						<br />
						Overall, 69 of the top 100 leaders took this opportunity to participate during the 2-week window from 
						4th-18th March 2015, and 10 of the 12 members of the SLT participated.<br />
						<br />
						The breakdown of top 100 leaders by SLT member (as per the ‘face-clicks’ within the survey) are as 
						follows: <br />
						<ul>
							<li>Elaine Baker - 13</li>
							<li>Guy Harris - 9</li>
							<li>Brian Mahony - 8</li>
							<li>Jamie Walker - 8</li>
							<li>Andrew Key - 6</li>
							<li>Marianne Johnson - 6</li>
							<li>Tom Phillips - 6</li>
							<li>Laura Willson - 5</li>
							<li>Carlos Navarro - 3</li>
							<li>Mindy Doster - 2</li>
							<li>Shanon Carpenter - 1</li>
							<li>Simon Haslam - 1</li>
							<li>Anonymous (didn’t click on a leader) 1</li>
						</ul>
					<? } ?>
				</p>
			</div>
		</section>
		<section class="rs-section-container">
		  <div class="rs-section-inner">
			<div class="rs-table">

				<? foreach ($info_list1_tab[$key] as $key1 => $value1) { ?>			
				
					<? $i++; ?>	

			<? if ($key1 == 1) { ?>

			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="circle1_100">     		
						<?
						$score=$who_you_are; 
						$score0=($score*100)/$questionnaries_i_tab[9];						
						$radius_start=100;
						$surface_area_start=3.14*($radius_start*$radius_start);
						$surface_area_taget=$surface_area_start*($score0/100);
						$radius_taget=sqrt($surface_area_taget/3.14);
						$margin_left=($radius_start-$radius_taget)/2;
						$radius_taget_display=round($score0);
						if ($score == '') $score=0;
						?>
						<div class="circle1_1" style="height:<? echo $radius_taget; ?>%;width:<? echo $radius_taget; ?>%;left:<? echo $margin_left; ?>%;background-color:rgb(205, 70, 128);"><span><? echo ($radius_taget_display); ?>%</span></div>
						<div class="rs-circle-chart-text circle1_2 circle1_1_q1" >				
							<p>Question asked to Top100 team:</p>
							<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p><br />
							<p>Based on <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of Top100 team members.</p> 
							<p><span style="color:#3a448d;font-weight:bold;"><? echo $score; ?></span> knew who you are.</p>
						</div>
					</div>
				  </div>
				  	<div class="rs-table-col-split"></div>
				</div>
			  </div>			

			<? } elseif ($key1 == 10) { ?>		

				<?
				$max_val41_tab='';
				if ($questionnaries_answers3_tab[$question2slt_tab[$key1]]) foreach ($questionnaries_answers3_tab[$question2slt_tab[$key1]] as $key01 => $value01) {	
					//$max_val41_tab[$key][$key1]=($value1*150)/$max_val4_tab[$key];
					$max_val41_tab[$question2slt_tab[$key1]][$key01]=($value01*450)/($questionnaries_i_tab[10]-1);
				}
				?>
				<!-- /.rs-table-row -->
				<div class="rs-table-row">
					<div class="rs-table-col rs-table-space">
						<span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
					</div>
					<div class="rs-table-col">
						<div class="rs-ball-chart">					  
							<? 
							//echo $question2slt_tab[$key1];
							if ($questionnaries_answers3_tab[$question2slt_tab[$key1]] != '') arsort($questionnaries_answers3_tab[$question2slt_tab[$key1]]);
							?>
							<? if ($questionnaries_answers3_tab[$question2slt_tab[$key1]] != '') foreach ($questionnaries_answers3_tab[$question2slt_tab[$key1]] as $key2 => $value2) { ?>
								<div style="float:left;width:100%;position:relative;"> 
									<div class="rs-ball-chart-item circle1_1" style="width: <? echo $max_val41_tab[$question2slt_tab[$key1]][$key2]; ?>px; height: <? echo $max_val41_tab[$question2slt_tab[$key1]][$key2]; ?>px">
										<span><? echo $answers_tab[$question2slt_tab[$key1]][$key2]; ?></span>
									</div>          
									<div class="rs-circle-chart-text circle1_2 circle1_1_q10_<? echo $value2; ?>" >
										<p>Question asked to SLT team:</p>
										<p class="question_asked"><? echo $questions99_tab[$question2slt_tab[$key1]]; ?></p><br />
										<p>Based on <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[10]; ?></span> opinions of SLT team members.</p> 
										<? if ($value2 == 1) { ?>
											<p><span style="color:#3a448d;font-weight:bold;"><? echo $value2; ?></span> person selected you.</p> <br />										
										<? } else { ?>
											<p><span style="color:#3a448d;font-weight:bold;"><? echo $value2; ?></span> people selected you.</p> <br />
										<? } ?>
										<p>Comments:</p><br />
										<? if ($dont_check_your_business_tab != '') { ?>
											<? foreach ($dont_check_your_business_tab as $key => $value) { ?>
												<p><? echo $value; ?></p><br />
											<? } ?>
										<? } else { ?>
											<p>no comments</p><br />		              			
										<? } ?>
									</div>
								</div>
							<? } ?>
						</div>
					</div>
				</div>			
			  
			<? } elseif ($key1 == 11) { ?>
			
				<?

				$questionnaries_answers_slt_tab1[$key1]=$questionnaries_answers_tab[$question2slt_tab[$key1]]/$questionnaries_i_tab[$questionnaries_answers1_tab[$question2slt_tab[$key1]]];
				
				if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_own_tab[$question2slt_tab[$key1]])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_own_tab[$question2slt_tab[$key1]]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=0;
				  
				}
				
				if ($questionnaries_answers_slt_tab1[$key1] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_slt_tab1[$key1])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_slt_tab1[$key1]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=0;
				}

				?>
	
			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
					<div class="rs-table-col-split line_chart_1">
						<div class="rs-line-chart">
							<? if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] != '') { ?>
								<span class="rs-line-item rs-line-prpl negative" 
								style="display:block;width: <? echo $questionnaries_answers_own_tab_1[$key1]; ?>%;
								margin-left: <? echo $questionnaries_answers_own_tab_2[$key1]; ?>%;"></span>
							<? } ?>
							<span class="rs-line-item rs-line-blue" 
							style="display:block;width: <? echo $questionnaries_answers_slt_tab2_1[$key1]; ?>%;
							margin-left: <? echo $questionnaries_answers_slt_tab2_2[$key1]; ?>%;background-color: #44a5a6 !important;"></span>
						</div>
					</div>
					<div class="rs-circle-chart-text circle1_2" >
						<p>Question asked to SLT team:</p>
						<p class="question_asked"><? echo $questions99_tab[$question2slt_tab[$key1]]; ?></p><br />						
						<p>Based on:<br />
							- <span style="background-color:#904fa0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> your opinion <br />							
							- <span style="background-color:#44a5a6;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[10]; ?></span> opinions of SLT team members <br />
						</p> 
						<p>
							Your score: <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_answers_own_tab[$question2slt_tab[$key1]]; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
							SLT average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers_slt_tab1[$key1], 2, '.', ' ');; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
						</p> 
					</div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($type2question_tab[$key1] == 1) { ?>

			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="circle1_100">     						
						<?
						$score=$least_aligned[$question2top100_tab[$key1]]; 
						$score0=($score*100)/$questionnaries_i_tab[9];	
						$radius_start=100;
						$surface_area_start=3.14*($radius_start*$radius_start);
						$surface_area_taget=$surface_area_start*($score0/100);
						$radius_taget=sqrt($surface_area_taget/3.14);
						$margin_left=($radius_start-$radius_taget)/2;
						$radius_taget_display=round($score0);
						if ($score == '') $score=0;
						?>			
						<div class="circle1_1" style="height:<? echo $radius_taget; ?>%;width:<? echo $radius_taget; ?>%;left:<? echo $margin_left; ?>%;background-color:rgb(205, 70, 128);">
							<? if ($score0 >= 10)  { ?>
								<span><? echo ($radius_taget_display); ?>%</span>
							<? } ?>
							<? if ($radius_taget_display < 10)  { ?>
								<? $left1=($score0*2)-14; ?>
								<span style="display: block;left: <? echo $left1; ?>px;position: absolute;top: -32px;width: 50px;"><? echo ($radius_taget_display); ?>%</span>
							<? } ?>
						</div>
						<div class="rs-circle-chart-text circle1_2 circle1_1_type1" style="left:-500px !important; width:1000px;">
							<p>Question asked to Top100 team:</p>
							<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p><br />
							<p>Based on <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of Top100 team members.</p> 
							<p><span style="color:#3a448d;font-weight:bold;"><? echo $score; ?></span> people selected you.</p> <br />
							<? if ($least_aligned_tab[$question2top100_tab[$key1]] != '') { ?>
								<p><span style="color:#3a448d;font-weight:bold;">Comments:</span></p>
								<? foreach ($least_aligned_tab[$question2top100_tab[$key1]] as $key => $value) { ?>
									<? if ($value != '') { ?>
										<p> - <? echo $value; ?></p>
									<? } ?>
								<? } ?>		              			
							<? } ?>
						</div>
					</div>
				  </div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($type2question_tab[$key1] == 2) { ?>

			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="circle1_100">     		
						<?
						$score=$least_aligned[$question2slt_tab[$key1]]; 
						if ($score == '') $score=0;
						$score0=($score*100)/$questionnaries_i_tab[10];				
						$radius_start=100;
						$surface_area_start=3.14*($radius_start*$radius_start);
						$surface_area_taget=$surface_area_start*($score0/100);
						$radius_taget=sqrt($surface_area_taget/3.14);
						$margin_left=($radius_start-$radius_taget)/2;
						$radius_taget_display=round($score0);
						//echo "TEST -- ".$score." ".$question2slt_tab[$key1]." <br>";
						?>
						<div class="circle1_1" style="height:<? echo $radius_taget; ?>%;width:<? echo $radius_taget; ?>%;left:<? echo $margin_left; ?>%;background-color:#44a5a6;">
							<span><? echo $score; ?></span>
						</div>
						<div class="rs-circle-chart-text circle1_2 circle1_1_type2">
							<p>Question asked to SLT team:</p>
							<p class="question_asked"><? echo $questions99_tab[$question2slt_tab[$key1]]; ?></p><br />
							<p>Based on <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[10]; ?></span> opinions of SLT team members.</p> 
							<p><span style="color:#3a448d;font-weight:bold;"><? echo $score; ?></span> people selected you.</p> <br />
							<? if ($least_aligned_tab[$question2slt_tab[$key1]] != '') { ?>					
								<p>Comments:</p><br />
								<? foreach ($least_aligned_tab[$question2slt_tab[$key1]] as $key => $value) { ?>
									<p><? echo $value; ?></p><br />
								<? } ?>	              			
							<? } ?>
						</div>
					</div>
				  </div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($type2question_tab[$key1] == 6) { ?>

			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
					<div style="float:left;">     	
						<div class="circle1_100">     		
							<?
							$score=$questionnaries_answers_tab[$question2slt_tab[$key1]]; 
							$score0=($score*100)/($questionnaries_i_tab[10]*100);	
							$score1=$questionnaries_answers_tab[$question2slt_tab[$key1]]/$questionnaries_i_tab[10];				
							$radius_start=100;
							$surface_area_start=3.14*($radius_start*$radius_start);
							$surface_area_taget=$surface_area_start*($score0/100);
							$radius_taget=sqrt($surface_area_taget/3.14);
							$margin_left=($radius_start-$radius_taget)/2;
							$radius_taget_display=round($score0);
							//echo "TEST -- ".$score." ".$question2slt_tab[$key1]." <br>";
							?>
							<div class="circle1_1" style="height:<? echo $radius_taget; ?>%;width:<? echo $radius_taget; ?>%;left:<? echo $margin_left; ?>%;background-color:#44a5a6;">
								<span><? echo $radius_taget_display; ?>%</span>
							</div>					
							<div class="rs-circle-chart-text circle1_2 circle1_1_type6" >
								<p>Question asked to SLT team:</p>
								<p class="question_asked"><? echo $questions99_tab[$question2slt_tab[$key1]]; ?></p><br />
								<p>Based on:<br />							
									- <span style="background-color:#44a5a6;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[10]; ?></span> opinions of SLT team members. <br />
								</p> 
								<p>
									SLT average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($score1, 2, '.', ' '); ?></span> (1 - 100) <br />
								</p> 
							</div>
						</div>
					</div>
					<div style="float:left;">     	
						<div class="circle1_100">     		
							<?
							$score=$questionnaries_answers4_3_tab[$question2top100_tab[$key1]]; 
							//echo "score -- $score -- ".$question2top100_tab[$key1]." <br>";
							$score0=($score*100)/($questionnaries_answers4_tab[$question2top100_tab[$key1]]*2);		
							$score1=$questionnaries_answers4_3_tab[$question2top100_tab[$key1]]/$questionnaries_i_tab[9];		
							$radius_start=100;
							$surface_area_start=3.14*($radius_start*$radius_start);
							$surface_area_taget=$surface_area_start*($score0/100);
							$radius_taget=sqrt($surface_area_taget/3.14);
							$margin_left=($radius_start-$radius_taget)/2;
							$radius_taget_display=round($score0);

							$score1=$score1-1;

							//echo "score -- $score <br>";
							//echo "score0 -- $score0 <br>";
							//echo "score1 -- $score1 <br>";
							//echo "radius_taget_display -- $radius_taget_display <br>";
							//echo "radius_taget_display -- $radius_taget_display".$questionnaries_answers4_1_tab[$question2top100_tab[$key1]]." <br>";
							?>
							<div class="circle1_1" style="height:<? echo $radius_taget; ?>%;width:<? echo $radius_taget; ?>%;left:<? echo $margin_left; ?>%;background-color:rgb(205, 70, 128);"><span><? echo ($radius_taget_display); ?>%</span></div>
							<div class="rs-circle-chart-text circle1_2 circle1_1_type6" >
								<p>Question asked to Top100 team:</p>
								<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p><br />
								<p>Based on:<br />					
									- <span style="background-color:rgb(205, 70, 128);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of Top100 team members about you. <br /> 
								</p> 
								<p>
									Top100 average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($score1, 2, '.', ' '); ?></span> (-1,0,1) <br />
									<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][1], 0, ',', ' ');; ?></span> - selected 1 (yes)<br />
									<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][0], 0, ',', ' ');; ?></span> - selected 0 (neutral)<br />
									<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][-1], 0, ',', ' ');; ?></span> - selected -1 (negative)<br />
								</p> 
							</div>
						</div>
					</div>
					<div style="float:left;">     	
						<div class="circle1_100">     		
							<?
							$score=$questionnaries_answers5_3_tab[$question2top100_tab[$key1]];
							//echo "score -- $score -- ".$question2top100_tab[$key1]." <br>";
							$score0=($score*100)/($questionnaries_answers5_tab[$question2top100_tab[$key1]]*2);		
							$score1=$questionnaries_answers5_3_tab[$question2top100_tab[$key1]]/$questionnaries_i_tab[9];		
							$radius_start=100;
							$surface_area_start=3.14*($radius_start*$radius_start);
							$surface_area_taget=$surface_area_start*($score0/100);
							$radius_taget=sqrt($surface_area_taget/3.14);
							$margin_left=($radius_start-$radius_taget)/2;
							$radius_taget_display=round($score0);

							$score1=$score1-1;

							//echo "score -- $score <br>";
							//echo "score0 -- $score0 <br>";
							//echo "score1 -- $score1 <br>";
							//echo "radius_taget_display -- $radius_taget_display <br>";
							//echo "radius_taget_display -- $radius_taget_display".$questionnaries_answers4_1_tab[$question2top100_tab[$key1]]." <br>";
							?>
							<div class="circle1_1" style="height:<? echo $radius_taget; ?>%;width:<? echo $radius_taget; ?>%;left:<? echo $margin_left; ?>%;background-color:rgb(55,162,228);"><span><? echo ($radius_taget_display); ?>%</span></div>
							<div class="rs-circle-chart-text circle1_2 circle1_1_type6" >
								<p>Question asked to Top100 team:</p>
								<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p><br />
								<p>Based on:<br />					
									- <span style="background-color:rgb(55,162,228);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of Top100 team members about SLT team <br /> 
								</p> 
								<p>
									Top100 average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($score1, 2, '.', ' '); ?></span> (-1,0,1) <br />
									<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers5_2_tab[$question2top100_tab[$key1]][1], 0, ',', ' ');; ?></span> - selected 1 (yes)<br />
									<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers5_2_tab[$question2top100_tab[$key1]][0], 0, ',', ' ');; ?></span> - selected 0 (neutral)<br />
									<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers5_2_tab[$question2top100_tab[$key1]][-1], 0, ',', ' ');; ?></span> - selected -1 (negative)<br />
								</p> 
							</div>
						</div>
					</div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($type2question_tab[$key1] == 10) { ?>

			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
					<div style="float:left;">     	
						<div class="circle1_100">     		
							<?
							$score=$questionnaries_answers_tab[$question2top100_tab[$key1]]; 
							$score0=($score*100)/($questionnaries_i_tab[9]*5);	
							$score1=$questionnaries_answers_tab[$question2top100_tab[$key1]]/$questionnaries_i_tab[9];				
							$radius_start=100;
							$surface_area_start=3.14*($radius_start*$radius_start);
							$surface_area_taget=$surface_area_start*($score0/100);
							$radius_taget=sqrt($surface_area_taget/3.14);
							$margin_left=($radius_start-$radius_taget)/2;
							$radius_taget_display=round($score0);
							//echo "TEST -- ".$score." ".$question2slt_tab[$key1]." <br>";
							?>
							<div class="circle1_1" style="height:<? echo $radius_taget; ?>%;width:<? echo $radius_taget; ?>%;left:<? echo $margin_left; ?>%;background-color:rgb(55,162,228);">
								<span><? echo $radius_taget_display; ?>%</span>
							</div>					
							<div class="rs-circle-chart-text circle1_2 circle1_1_type6" >
								<p>Question asked to Top100 team:</p>
								<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p><br />
								<p>Based on:<br />							
									- <span style="background-color:rgb(55,162,228);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of top100 team members. <br />
								</p> 
								<p>
									Top100 average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($score1, 2, '.', ' '); ?></span> (1 - 5) <br />
								</p> 
							</div>
						</div>
					</div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($key1 == 24) { ?>
			
				<?				
				$questionnaries_answers_slt_tab1[$key1]=(-1)*$questionnaries_answers4_1_tab[$question2top100_tab[$key1]]/$questionnaries_i_tab[9];
				
				if ($questionnaries_answers_slt_tab1[$key1] < 0) {
					
				  $proc1 = (($types_settings_tab[11][2]-$questionnaries_answers_slt_tab1[$key1])*50)/($types_settings_tab[11][2]-$types_settings_tab[11][1]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_slt_tab1[$key1]-$types_settings_tab[11][2])*50)/($types_settings_tab[11][3]-$types_settings_tab[11][2]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=0;
				}
				
				$questionnaries_answers_own_tab[$question2slt_tab[$key1]]=6-$questionnaries_answers_own_tab[$question2slt_tab[$key1]]; 
				if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_own_tab[$question2slt_tab[$key1]])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_own_tab[$question2slt_tab[$key1]]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=0;
				  
				}
				
				?>
	
			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="rs-line-chart line_chart_1">
						<? if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] != '') { ?>
							<span class="rs-line-item rs-line-prpl negative" 
							style="display:block;width: <? echo $questionnaries_answers_own_tab_1[$key1]; ?>%;
							margin-left: <? echo $questionnaries_answers_own_tab_2[$key1]; ?>%;"></span>
						<? } ?>
						<span class="rs-line-item rs-line-blue" 
						style="display:block;width: <? echo $questionnaries_answers_slt_tab2_1[$key1]; ?>%;
						margin-left: <? echo $questionnaries_answers_slt_tab2_2[$key1]; ?>%;background-color:rgb(205, 70, 128) !important;"></span>
					</div>
					<div class="rs-circle-chart-text circle1_2" >
						<p>Question asked to Top100 team:</p>
						<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p><br />
						<p>Based on:<br />
							- <span style="background-color:#904fa0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> your opinion <br />							
							- <span style="background-color:rgb(205, 70, 128);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of Top100 team members. <br /> 
						</p> 
						<p>
							Your score: <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_answers_own_tab[$question2slt_tab[$key1]]; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
							Top100 average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers_slt_tab1[$key1], 2, '.', ' '); ?></span> (-1,0,1) <br />
							<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][1], 0, ',', ' ');; ?></span> - selected 1 (yes)<br />
							<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][0], 0, ',', ' ');; ?></span> - selected 0 (neutral)<br />
							<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][-1], 0, ',', ' ');; ?></span> - selected -1 (negative)<br />
						</p> 
					</div>
				  </div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($type2question_tab[$key1] == 7) { ?>
			
				<?
				
				$questionnaries_answers_slt_tab1[$key1]=$questionnaries_answers4_1_tab[$question2top100_tab[$key1]]/$questionnaries_i_tab[9];
				
				if ($questionnaries_answers_slt_tab1[$key1] < 0) {
					
				  $proc1 = (($types_settings_tab[11][2]-$questionnaries_answers_slt_tab1[$key1])*50)/($types_settings_tab[11][2]-$types_settings_tab[11][1]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_slt_tab1[$key1]-$types_settings_tab[11][2])*50)/($types_settings_tab[11][3]-$types_settings_tab[11][2]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=0;
				}
				
				if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] == 3) {
					
				  $questionnaries_answers_own_tab_1[$key1]='3';
				  $questionnaries_answers_own_tab_2[$key1]='-2';

				} elseif ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_own_tab[$question2slt_tab[$key1]])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_own_tab[$question2slt_tab[$key1]]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=0;
				  
				}
				
				?>
	
			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="rs-line-chart line_chart_1">
						<? if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] != '') { ?>
							<span class="rs-line-item rs-line-prpl negative" 
							style="display:block;width: <? echo $questionnaries_answers_own_tab_1[$key1]; ?>%;
							margin-left: <? echo $questionnaries_answers_own_tab_2[$key1]; ?>%;"></span>
						<? } ?>
						<span class="rs-line-item rs-line-blue" 
						style="display:block;width: <? echo $questionnaries_answers_slt_tab2_1[$key1]; ?>%;
						margin-left: <? echo $questionnaries_answers_slt_tab2_2[$key1]; ?>%;background-color:rgb(205, 70, 128) !important;"></span>
					</div>
					<div class="rs-circle-chart-text circle1_2" >
						<p>Question asked to Top100 team:</p>
						<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p><br />
						<p>Based on:<br />
							- <span style="background-color:#904fa0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> your opinion <br />							
							- <span style="background-color:rgb(205, 70, 128);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of Top100 team members. <br /> 
						</p> 
						<p>
							Your score: <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_answers_own_tab[$question2slt_tab[$key1]]; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
							Top100 average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers_slt_tab1[$key1], 2, '.', ' '); ?></span> (-1,0,1) <br />
							<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][1], 0, ',', ' ');; ?></span> - selected 1 (yes)<br />
							<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][0], 0, ',', ' ');; ?></span> - selected 0 (neutral)<br />
							<span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers4_2_tab[$question2top100_tab[$key1]][-1], 0, ',', ' ');; ?></span> - selected -1 (negative)<br />
						</p> 
					</div>
				  </div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($type2question_tab[$key1] == 8) { ?>
			
				<?					
				$questionnaries_answers_slt_tab1[$key1]=$questionnaries_answers_tab[$question2slt_tab[$key1]]/$questionnaries_i_tab[10];
				//echo "questionnaries_answers_slt_tab1 -- ".$questionnaries_answers_own_tab[$question2slt_tab[$key1]]." ".$questionnaries_answers_slt_tab1[$key1]." -- ".$question2slt_tab[$key1]." -- ".$questionnaries_answers_tab[$question2slt_tab[$key1]]."<br>";

				if ($questionnaries_answers_slt_tab1[$key1] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_slt_tab1[$key1])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_slt_tab1[$key1]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=0;
				}
				
				if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] == 3) {
					
				  $questionnaries_answers_own_tab_1[$key1]='3';
				  $questionnaries_answers_own_tab_2[$key1]='-2';

				} elseif ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_own_tab[$question2slt_tab[$key1]])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_own_tab[$question2slt_tab[$key1]]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=0;
				  
				}

				?>
	
			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="rs-line-chart line_chart_1">
						<? if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] != '') { ?>
							<span class="rs-line-item rs-line-prpl negative" 
							style="display:block;width: <? echo $questionnaries_answers_own_tab_1[$key1]; ?>%;
							margin-left: <? echo $questionnaries_answers_own_tab_2[$key1]; ?>%;"></span>
						<? } ?>
						<span class="rs-line-item rs-line-blue"  
						style="display:block;width: <? echo $questionnaries_answers_slt_tab2_1[$key1]; ?>%;
						margin-left: <? echo $questionnaries_answers_slt_tab2_2[$key1]; ?>%;background-color: #44a5a6 !important;"></span>
					</div>
					<div class="rs-circle-chart-text circle1_2" >
						<p>Question asked to SLT team:</p>
						<p class="question_asked"><? echo $questions99_tab[$question2slt_tab[$key1]]; ?></p><br />
						<p>Based on:<br />
							- <span style="background-color:rgb(205, 70, 128);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> your opinion <br />							
							- <span style="background-color:#44a5a6;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[10]; ?></span> opinions of SLT team members. <br />
						</p> 
						<p>
							Your score: <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_answers_own_tab[$question2slt_tab[$key1]]; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
							SLT average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers_slt_tab1[$key1], 2, '.', ' ');; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
						</p> 
					</div>
				  </div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($type2question_tab[$key1] == 9) { ?>
			
				<?
				$questionnaries_answers_slt_tab1[$key1]=$questionnaries_answers_tab[$question2slt_tab[$key1]]/$questionnaries_answers0_tab[$question2slt_tab[$key1]];
				//echo "questionnaries_answers_slt_tab1 -- ".$questionnaries_answers_own_tab[$question2slt_tab[$key1]]." ".$questionnaries_answers_slt_tab1[$key1]." -- ".$question2slt_tab[$key1]." -- ".$questionnaries_answers_tab[$question2slt_tab[$key1]]."<br>";
			
				if ($questionnaries_answers_slt_tab1[$key1] < 50) {
					
				  $proc1 = (($types_settings_tab[2][2]-$questionnaries_answers_slt_tab1[$key1])*50)/($types_settings_tab[2][2]-$types_settings_tab[2][1]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_slt_tab1[$key1]-$types_settings_tab[2][2])*50)/($types_settings_tab[2][3]-$types_settings_tab[2][2]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=0;
				}
				
				$questionnaries_answers_top100_tab1[$key1]=$questionnaries_answers_tab[$question2top100_tab[$key1]]/$questionnaries_answers0_tab[$question2top100_tab[$key1]];
				//echo "questionnaries_answers_slt_tab1 -- ".$questionnaries_answers_top100_tab1[$key1]." ".$questionnaries_answers_slt_tab1[$key1]." -- ".$question2slt_tab[$key1]." -- ".$questionnaries_answers_tab[$question2slt_tab[$key1]]."<br>";
				
				if ($questionnaries_answers_top100_tab1[$key1] < 50) {
					
				  $proc1 = (($types_settings_tab[2][2]-$questionnaries_answers_top100_tab1[$key1])*50)/($types_settings_tab[2][2]-$types_settings_tab[2][1]);
				  $questionnaries_answers_top100_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_top100_tab2_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_top100_tab1[$key1]-$types_settings_tab[2][2])*50)/($types_settings_tab[2][3]-$types_settings_tab[2][2]);
				  $questionnaries_answers_top100_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_top100_tab2_2[$key1]=0;
				}
								
				if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] == 50) {
					
				  $questionnaries_answers_own_tab_1[$key1]='3';
				  $questionnaries_answers_own_tab_2[$key1]='-2';

				} elseif ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] < 50) {
					
				  $proc1 = (($types_settings_tab[2][2]-$questionnaries_answers_own_tab[$question2slt_tab[$key1]])*50)/($types_settings_tab[2][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_own_tab[$question2slt_tab[$key1]]-$types_settings_tab[2][2])*50)/($types_settings_tab[2][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=0;
				  
				}

				?>
	
			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="rs-line-chart line_chart_1">
						<? if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] != '') { ?>
							<span class="rs-line-item rs-line-prpl negative" 
							style="display:block;width: <? echo $questionnaries_answers_own_tab_1[$key1]; ?>%;
							margin-left: <? echo $questionnaries_answers_own_tab_2[$key1]; ?>%;height: 61%;"></span>
						<? } ?>
						<span class="rs-line-item rs-line-blue" 
						style="display:block;width: <? echo $questionnaries_answers_slt_tab2_1[$key1]; ?>%;
						margin-left: <? echo $questionnaries_answers_slt_tab2_2[$key1]; ?>%;background-color: #44a5a6 !important;top: 22px;"></span>
						<span class="rs-line-item rs-line-blue" 
						style="display:block;width: <? echo $questionnaries_answers_top100_tab2_1[$key1]; ?>%;
						margin-left: <? echo $questionnaries_answers_top100_tab2_2[$key1]; ?>%;background-color: #36a2e4 !important;top:0px;top: 12px;"></span>
					</div>
					<div class="rs-circle-chart-text circle1_2" >
						<p>Question asked to Top100 team:</p>
						<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p>
						<p>Question asked to SLT team:</p>
						<p class="question_asked"><? echo $questions99_tab[$question2slt_tab[$key1]]; ?></p><br />
						<p>Based on:<br />
							- <span style="background-color:#904fa0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> your opinion <br />							
							- <span style="background-color:#44a5a6;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[10]; ?></span> opinions of SLT team members. <br />
							- <span style="background-color:#37a2e4;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of Top100 team members. <br /> 
						</p> 
						<p>
							Your score: <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_answers_own_tab[$question2slt_tab[$key1]]; ?></span> (<? echo $types_settings_tab[2][1]." - ".$types_settings_tab[2][3] ?>) <br />
							SLT average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers_slt_tab1[$key1], 2, '.', ' ');; ?></span> (<? echo $types_settings_tab[2][1]." - ".$types_settings_tab[2][3] ?>) <br />
							Top100 average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers_top100_tab1[$key1], 2, '.', ' ');; ?></span> (<? echo $types_settings_tab[2][1]." - ".$types_settings_tab[2][3] ?>) <br />
						</p> 
					</div>
				  </div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($key1 == 3) { ?>

			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="circle1_100">     		
						<?
						$score=$dont_check_your_business; 
						$score0=($score*100)/$questionnaries_i_tab[9];				
						$radius_start=100;
						$surface_area_start=3.14*($radius_start*$radius_start);
						$surface_area_taget=$surface_area_start*($score0/100);
						$radius_taget=sqrt($surface_area_taget/3.14);
						$margin_left=($radius_start-$radius_taget)/2;
						$radius_taget_display=round($score0);
						?>
						<div class="circle1_1" style="height:<? echo $radius_taget; ?>%;width:<? echo $radius_taget; ?>%;left:<? echo $margin_left; ?>%;"><span><? echo ($radius_taget_display); ?>%</span></div>
						<div class="rs-circle-chart-text circle1_2">
							<p>Question asked to Top100 team:</p>
							<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p><br />
							<? if ($dont_check_your_business_tab != '') { ?>
								<p>Comments:</p><br />
								<? foreach ($dont_check_your_business_tab as $key => $value) { ?>
									<p><? echo $value; ?></p><br />
								<? } ?>              			
							<? } ?>
						</div>
					</div>
				  </div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } elseif ($type2question_tab[$key1] == 3) { ?>
			
				<?
				$questionnaries_answers_slt_tab1[$key1]=$questionnaries_answers_tab[$question2slt_tab[$key1]]/$questionnaries_i_tab[$questionnaries_answers1_tab[$question2slt_tab[$key1]]];
				$questionnaries_answers_top100_tab1[$key1]=$questionnaries_answers_tab[$question2top100_tab[$key1]]/$questionnaries_i_tab[$questionnaries_answers1_tab[$question2top100_tab[$key1]]];
				
				//echo "key -- ".$questionnaries_answers_tab[$question2slt_tab[$key1]]."<br>";
				//echo "key -- ".$questionnaries_answers_tab[$question2slt_tab[$key1]]."<br>";
				//echo "key -- ".$questionnaries_answers_tab[$question2top100_tab[$key1]]."<br>";
				//echo "key1 -- ".$questionnaries_answers_slt_tab1[$key1]."<br>";
				//echo "key1 -- ".$questionnaries_answers_top100_tab1[$key1]."<br>";
				//echo "key1 -- ".$questionnaries_answers_own_tab[$question2slt_tab[$key1]]." -- ".$question2slt_tab[$key1]."<br>";
				
				if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] == 3) {
					
				  $questionnaries_answers_own_tab_1[$key1]='3';
				  $questionnaries_answers_own_tab_2[$key1]='-2';

				} elseif ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_own_tab[$question2slt_tab[$key1]])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_own_tab[$question2slt_tab[$key1]]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_own_tab_1[$key1]=$proc1;
				  $questionnaries_answers_own_tab_2[$key1]=0;
				  
				}
				
				if ($questionnaries_answers_slt_tab1[$key1] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_slt_tab1[$key1])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_slt_tab1[$key1]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_slt_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_slt_tab2_2[$key1]=0;
				  
				}
				
				if ($questionnaries_answers_top100_tab1[$key1] < 3) {
					
				  $proc1 = (($types_settings_tab[1][2]-$questionnaries_answers_top100_tab1[$key1])*50)/($types_settings_tab[1][2]-$types_settings_tab[1][1]);
				  $questionnaries_answers_top100_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_top100_tab2_2[$key1]=$proc1*(-1);

				} else {

				  $proc1 = (($questionnaries_answers_top100_tab1[$key1]-$types_settings_tab[1][2])*50)/($types_settings_tab[1][3]-$types_settings_tab[1][2]);
				  $questionnaries_answers_top100_tab2_1[$key1]=$proc1;
				  $questionnaries_answers_top100_tab2_2[$key1]=0;
				  
				}
				?>
	
			  <!-- /.rs-table-row -->
			  <div class="rs-table-row">
				<div class="rs-table-col">
				  <span class="rs-question-num"><? echo $i; ?></span>
				  <p class="rs-question"><? echo $value1; ?></p>
				</div>
				<div class="rs-table-col">
				  <div class="rs-table-col-split">
					<div class="rs-line-chart line_chart_1">
						<? if ($questionnaries_answers_own_tab[$question2slt_tab[$key1]] != '') { ?>
							<span class="rs-line-item rs-line-prpl negative"
							style="display:block;width: <? echo $questionnaries_answers_own_tab_1[$key1]; ?>%;
							margin-left: <? echo $questionnaries_answers_own_tab_2[$key1]; ?>%;height: 7px;top: 4px;"></span>
						<? } ?>
						<span class="rs-line-item rs-line-blue" 
						style="display:block;width: <? echo $questionnaries_answers_slt_tab2_1[$key1]; ?>%;
						margin-left: <? echo $questionnaries_answers_slt_tab2_2[$key1]; ?>%;background-color: #44a5a6 !important;"></span>
						<span class="rs-line-item rs-line-blue" 
						style="display:block;width: <? echo $questionnaries_answers_top100_tab2_1[$key1]; ?>%;
						margin-left: <? echo $questionnaries_answers_top100_tab2_2[$key1]; ?>%;top:30px;"></span>
					</div>
					<div class="rs-circle-chart-text circle1_2" >
						<p>Question asked to Top100 team:</p>
						<p class="question_asked"><? echo $questions99_tab[$question2top100_tab[$key1]]; ?></p>
						<p>Question asked to SLT team:</p>
						<p class="question_asked"><? echo $questions99_tab[$question2slt_tab[$key1]]; ?></p><br />
						<p>Based on:<br />
							- <span style="background-color:#904fa0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> your opinion <br />							
							- <span style="background-color:#44a5a6;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[10]; ?></span> opinions of SLT team members. <br />
							- <span style="background-color:#37a2e4;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_i_tab[9]; ?></span> opinions of Top100 team members. <br /> 
						</p> 
						<p>
							Your score: <span style="color:#3a448d;font-weight:bold;"><? echo $questionnaries_answers_own_tab[$question2slt_tab[$key1]]; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
							SLT average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers_slt_tab1[$key1], 2, '.', ' ');; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
							Top100 average score: <span style="color:#3a448d;font-weight:bold;"><? echo number_format($questionnaries_answers_top100_tab1[$key1], 2, '.', ' ');; ?></span> (<? echo $types_settings_tab[1][1]." - ".$types_settings_tab[1][3] ?>) <br />
						</p> 
					</div>
				  </div>
				  <div class="rs-table-col-split"></div>
				</div>
			  </div>

			<? } else { ?>

				<div class="rs-table-row">
					<div class="rs-table-col">
						<span class="rs-question-num"><? echo $i; ?></span>
						<p class="rs-question"><? echo $value1; ?></p>
					</div>
					<div class="rs-table-col">
						<div class="rs-table-col-split">
							<div class="rs-line-chart">
								<span class="rs-line-item rs-line-prpl negative" style="width: 20%;">1</span>
								<span class="rs-line-item rs-line-blue" style="width: 40%;">2</span>
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
</body>
</html>