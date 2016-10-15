<?php

require 'weixin.class.php';

$open_url=urlencode('http://lovepingping.applinzi.com/publish.php');
$open_urlJoin=urlencode('http:://lovepingping.applinzi.com/join.php');
$redirect_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx42dbf69f8939e9a8&redirect_uri='.$open_url.'&response_type=code&scope=snsapi_base&state=1';
$redirect_urlJoin= 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx42dbf69f8939e9a8&redirect_uri='.$open_urlJoin.'&response_type=code&scope=snsapi_base&state=1';
$ret=wxcommon::getToken();
$ACCESS_TOKEN=$ret['access_token'];
$menuPostData='{
  				 "button":[
					 {	
						  "type":"view",
						  "name":"发布活动",
                          "url":$redirect_url
                      },
                      {
                            "type":"view"
                            "name":"参加活动",
                            "url":$redirect_urlJoin
                      },
					  {
						   "name":"更多",
						   "sub_button":[
							{
							   "type":"click",
							   "name":"我们",
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
//$del=$wxmenu->deleteMenu();
//var_dump($del);
