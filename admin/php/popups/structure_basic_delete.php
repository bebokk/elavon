<?php

session_start();

include_once('../../config/mysql.php');

//get picture details
$query = "SELECT * FROM ".$_SESSION['table_name']." WHERE ".$_SESSION['table_key']."='".$_POST['element_id']."'";
$result = @mysql_query ($query);	
$data1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$data1_tab[$key]=$value;
	}
}
	
?>
<div class="popup01"></div>
<form id="structure_basic_form">
	<div class="popup">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup').css('display','none');$('.popup01').css('display','none');">close</a></div>
			</div>
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span>Delete element</span></div>
						<div class="popup1_content1_1_3">
							<table>
								<tr>
									<td>
										<span class="del_text1">Are you sure that you want to delete <? echo $data1_tab['name']; ?></span>										
										<a onclick="save_delete_element(<? echo $_POST['element_id']; ?>);" class="popup1_content1_1_3_1">	
											<div class="del_el1">	
												<div class="button4">
													<div class="button4_1">
														<div class="button4_2">
															<div class="button4_3">
																<div class="button1_3_fog"></div>
																<span>delete element</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>			
										<input class="hidden_submit1" onclick="save_delete_element(<? echo $_POST['element_id']; ?>);" type="submit" name="delete_element" value="delete element" />
									</td>
								</tr>
							</table>
						</div>
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