<?php

session_start();

include_once('../../config/mysql.php');

//get picture details
$query = "SELECT * FROM ".$_POST['attachetname']." WHERE ".$_SESSION['attachetid_tab'][$_POST['attachetname']]."='".$_POST['element_id']."'";
$result = @mysql_query ($query);	
$data1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$data1_tab[$key]=$value;
	}
}

$elements_details1_tab=$_SESSION['attachet_fields_list_details_tab'][$_POST['attachetname']];

//check if there is any pass element 
$pass1='';
foreach ($elements_details1_tab['name1'] as $key => $value)	{	
	if ($elements_details1_tab['type'][$key] == 'pass') {
		$pass1=1;
	}
}

/*
echo "elements_details1_tab -- <pre>";
print_r($elements_details1_tab);
echo "</pre>";
*/
	
?>
<div class="popup001"></div>
<form id="structure_basic_form" method="POST">
	<div class="popup000">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup000').css('display','none');$('.popup001').css('display','none');">close</a></div>
			</div>
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span>Edit element</span></div>
						<div class="popup1_s1">
							<table>
								<? $i=0; ?>
								<? foreach ($elements_details1_tab['name1'] as $key => $value) { ?>
									<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
									<? if ($elements_details1_tab['type'][$key] == 'text') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;"><input id="<? echo $key; ?>" class="popup1_content_input1 save_par_att <? echo $class1; ?>" type="text" name="<? echo $key; ?>" value="<? echo $data1_tab[$key]; ?>" /></td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'select') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;" class="tleft">
												<select id="<? echo $key; ?>" class="popup1_content_input1 save_par_att <? echo $class1; ?> select_value" name="<? echo $key; ?>">
													<? foreach ($elements_details1_tab['select'][$key] as $key1 => $value1) { ?>
														<? if ($key1 == $data1_tab[$key]) { ?>
															<option selected value="<? echo $key1; ?>"><? echo $value1; ?></option>
														<? } else { ?>
															<option value="<? echo $key1; ?>"><? echo $value1; ?></option>
														<? } ?>
													<? } ?>	
												</select>						
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'wysywig') { ?>
										<tr>
											<td colspan="2">
												<? echo $value; ?> <br />
												<!--
												<div  id="<? echo $key; ?>">
													<textarea class="popup1_content_input1 save_par_att <? echo $class1; ?> tinymce" type="text" name="<? echo $key; ?>"><? echo $data1_tab[$key]; ?></textarea>
												</div>
												-->
												<textarea id="<? echo $key; ?>" class="popup1_content_input1 save_par_att <? echo $class1; ?> tinymce" type="text" name="<? echo $key; ?>"><? echo $data1_tab[$key]; ?></textarea>
											</td>
										</tr>
									<? } ?>
								<? } ?>
							</table>
						</div>						
						<div class="popup1_content1_1_3">
							<a onclick="save_element_changes_att(<? echo $_POST['element_id']; ?>,'<? echo $_POST['element_id1']; ?>','<? echo $_POST['attachetname']; ?>');" class="popup1_content1_1_3_1">	
								<div class="popup1_content1_1_3_1_1">	
									<div class="button4">
										<div class="button4_1">
											<div class="button4_2">
												<div class="button4_3">
													<div class="button1_3_fog"></div>
													<span>save changes</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
							<input class="hidden_submit1" onclick="save_element_changes_att(<? echo $_POST['element_id']; ?>,'<? echo $_POST['element_id1']; ?>','<? echo $_POST['attachetname']; ?>');" type="submit" name="save_changes" value="save changes" />
						</div>	
						<!--
						<div class="popup1_content1_1_3"><input onclick="save_element_changes(<? echo $_POST['element_id']; ?>);" type="submit" name="save_changes" value="save changes" /></div>
						-->
						<? if ($pass1 == 1) { ?>
							<div class="popup1_s1">
								<table>
									<? $i=0; ?>
									<? foreach ($elements_details1_tab['name1'] as $key => $value) { ?>
										<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
										<? if ($elements_details1_tab['type'][$key] == 'pass') { ?>
											<tr>
												<td style="width:25%;"><? echo $value; ?></td>
												<td style="width:75%;">
													<input id="<? echo $key; ?>" class="popup1_content_input1 save_par_att <? echo $class1; ?>" type="text" name="<? echo $key; ?>" value="" />
												</td>
											</tr>
										<? } ?>
									<? } ?>
								</table>
							</div>		
							<div class="popup1_content1_1_3">
								<a onclick="save_element_changes_att(<? echo $_POST['element_id']; ?>,'<? echo $_POST['element_id1']; ?>','<? echo $_POST['attachetname']; ?>');" class="popup1_content1_1_3_1">	
									<div class="popup1_content1_1_3_1_1">	
										<div class="button4">
											<div class="button4_1">
												<div class="button4_2">
													<div class="button4_3">
														<div class="button1_3_fog"></div>
														<span>save changes</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
								<input class="hidden_submit1" onclick="save_element_changes_att(<? echo $_POST['element_id']; ?>,'<? echo $_POST['element_id1']; ?>','<? echo $_POST['attachetname']; ?>');" type="submit" name="save_changes" value="save changes" />
							</div>	
						<? } ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
<script language="javascript"> $("#structure_basic_form").submit(function(e) {	e.preventDefault(); }); </script>
<?











































mysql_close($dbc);

?>