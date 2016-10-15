<?php

require 'weixin.class.php';

$ret=wxcommon::getToken();
$ACCESS_TOKEN=$ret['access_token'];
$menuPostData='{
  				 "button":[
					 {	
						  "type":"view",
						  "name":"发布活动",
                          "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx42dbf69f8939e9a8&redirect_uri=http://lovepingping.applinzi.com/publish.php&response_type=code&scope=snsapi_base&state=1"
					  },
					  {
						   "type":"click",
						   "name":"参与活动",
						   "key":"JOIN"
					  },
					  {
						   "name":"更多",
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
$get=$wxmenu->getMenu();
var_dump($get);

//delete current menu
//$del=$wxmenu->deleteMenu();
//var_dump($del);
