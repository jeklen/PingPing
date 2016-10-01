<?php

require 'weixin.class.php';

$ret=wxcommon::getToken();
$ACCESS_TOKEN=$ret['access_token'];
$menuPostData='{
  				 "button":[
					 {	
						  "type":"view",
						  "name":"点菜",
                          "url":"http://lovepingping.applinzi.com/publish.php"
					  },
					  {
						   "type":"click",
						   "name":"参与活动",
						   "key":"JOIN"
					  },
					  {
						   "name":"菜单",
						   "sub_button":[
							{
							   "type":"click",
							   "name":"我",
							   "key":"ME"
							},
							{
							   "type":"click",
							   "name":"赞一下我们",
							   "key":"ENCOURAGE"
							}]
					   }]
				 }';
         
// create new menu
$wxmenu=new wxmenu($ACCESS_TOKEN);	 
$create=$wxmenu->createMenu($menuPostData);

//get current menu
//$get=$wxmenu->getMenu();
//var_dump($get);

//delete current menu
$del=$wxmenu->deleteMenu();
var_dump($del);
