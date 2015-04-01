<?php

/*
echo "_SESSION -- <pre>";
print_r($_SESSION);
echo "</pre>";

echo "login_submit1 -- ".$_POST['login_submit1']."<br>";
*/

//logout
if ($_GET['logout'] == 1) {
	unset($_SESSION['user_results']);
}	

$check_login=0;
if (isset($_POST['login_submit1'])) {

	//select user from database
	$query = "SELECT * FROM users WHERE usersgroupid=11 AND email='".$_POST['login']."' AND pass='".$_POST['pass']."'";
	$result = @mysql_query ($query);		
	//echo "query -- $query -- $result <br>";
	
	$resulti = mysql_num_rows($result);
	if ($resulti > 0) {
	
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
			foreach ($row as $key => $value) {
				$_SESSION['user_results'][$key]=$value;
			}
			$check_login=1;
		}
		
	} else {	
	
		$fault='Wrong login or pass!';		
	}
	
} else {

	if ($check_login == '' AND $_SESSION['user_results']['email'] != '') {
		
		$query = "SELECT * FROM users WHERE email='".$_SESSION['user_results']['email']."' AND pass='".$_SESSION['user_results']['pass']."'";
		$result = @mysql_query ($query);	
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
			foreach ($row as $key => $value) {
				$_SESSION['user_results'][$key]=$value;
			}
			$check_login=1;
		}
	}
	
	//get logo from admin
	$query1 = "SELECT * FROM structure_basic_pictures WHERE tableid='2' AND table_name='images'
	ORDER BY position ASC, createtime DESC LIMIT 0,1";
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {	
		$admin_logo=adres_miniatury('images/basic/',$row1['structure_basic_pictureid'].'.'.$row1['extension'],260,84);
	}
	
	$query = "SELECT * FROM settings";
	$result = @mysql_query ($query);
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$settings_tab[$row['settingid']]=$row['value'];
	}
}

if ($check_login == 0) {

	?> 
	<!DOCTYPE html>
	<html>
	<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="robots" content="index, follow"/>
	<meta http-equiv="Content-Language" content="en" />
	<style type="text/css" media="screen">
		@import url("admin/css/basic.css");
	</style>			
	<script type="text/javascript" src="admin/js/jquery.js"></script>
	<script type="text/javascript" src="admin/js/login.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
	<div class="body_login0">
		<div class="body_login">
			<div class="body_login01">
				<div class="logo_login" style="background:transparent url('<? echo $admin_logo; ?>') no-repeat center center;"></div>
				<div class="footer_font">© Copyright by The Cogent Partnership</div>
				<table class="login_to_admin_tab" cellspacing="0" cellpadding="0" height="100%" width="100%" style="position:absolute;top:-51px;">
					<tr>
						<td align="center" valign="center">
							<table class="login_to_admin_tab" cellspacing="0" cellpadding="0">
								<tr>
									<td align="center" valign="center">				
										<form action="./results1.php" method="POST" name="login_page2">
											<? if ($fault != '') { ?>
												<div class="simple_fault1">
													<span><? echo $fault; ?></span>
												</div>		
											<? } ?>								
											<div class="boxlog1">
												<div class="boxlog1_1">
													<div class="boxlog1_2">
														<div class="boxlog1_3"><span>Welcome to Elavon panel</span></div>
													</div>
												</div>
												<div class="boxlog1_4">
													<div class="boxlog1_5">
														<div class="boxlog1_6">	
															<div class="login0">	
																<div class="login0_1">	
																	<div class="login0_1_1">	
																		<span>Login:</span>
																	</div>
																	<div class="login0_1_2">	
																		<div class="login0_1_2_1">	
																			<div class="login0_1_2_1_ico1"></div>		
																			<input class="login0_1_2_1_1" type="text" name="login" value="" />															
																		</div>													
																	</div>
																</div>
																<div class="login0_1">	
																	<div class="login0_1_1">	
																		<span>Password:</span>
																	</div>
																	<div class="login0_1_2">	
																		<div class="login0_1_2_1">	
																			<div class="login0_1_2_1_ico2"></div>		
																			<input class="login0_1_2_1_1" type="password" name="pass" value="" />															
																		</div>													
																	</div>
																</div>
															</div>
															<div class="login01">	
																<a class="login01_login" onclick="login_page2.submit();">	
																	<div class="button1">
																		<div class="button1_1">
																			<div class="button1_2">
																				<div class="button1_3">
																					<div class="button1_3_fog"></div>
																					<span>Login in</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</a>
																<input class="login01_sbumit" type="submit" name="login_submit" value="Log in" />
																<input type="hidden" name="login_submit1" value="1" />
															</div>
															<div class="clear"></div>
														</div>
													</div>
												</div>	
												<div class="boxlog1_7">
													<div class="boxlog1_8">
														<div class="boxlog1_9"><span></span></div>
													</div>
												</div>					
											</div>		
										</form>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	</body>
	</html>
	<? 
	die();
}
?>