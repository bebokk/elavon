<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='questionnaries';
$table_key='questionnarieid';
$view_name1='Questionnaries';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['user']='User';
$elements_list1_tab['name']['type']='Type';
$elements_list1_tab['name']['createtime']='Createtime';

$elements_list1_tab['type']['user']='select';
$elements_list1_tab['type']['type']='select';
$elements_list1_tab['type']['createtime']='text';

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['user'][$row['userid']]=$row['name'];
}

$query = "SELECT * FROM usersgroups ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['type'][$row['usersgroupid']]=$row['name'];
}

//element for width
$elements_list1_tab['width']['user']='55';
$elements_list1_tab['width']['type']='20';
$elements_list1_tab['width']['createtime']='20';

//element for filters
$elements_list1_tab['filter']['user']='select';
$elements_list1_tab['filter']['type']='select';
$elements_list1_tab['filter']['createtime']='text';

//element for sort
$elements_list1_tab['sort']['user']=1;
$elements_list1_tab['sort']['type']=1;
$elements_list1_tab['sort']['createtime']=1;

$default_sort1='createtime';
$default_sort2='DESC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['user']='User';
$elements_details1_tab['name']['type']='Type';

$elements_details1_tab['type']['user']='select';
$elements_details1_tab['type']['type']='select';

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['user'][$row['userid']]=$row['name'];
}

$query = "SELECT * FROM usersgroups ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['type'][$row['usersgroupid']]=$row['name'];
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=0;
$page_settings_tab['adding']=0;
$page_settings_tab['editing']=0;
$page_settings_tab['position']=0;

include_once('php/elements/structure_basic.php');





































?>