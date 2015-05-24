<?php
include_once ('admin_global.php');
include_once ('../baidu/LoginService.php');
include_once ('../baidu/ProfileService.php');
include_once ('../baidu/ReportService.php');

//preLogin,doLogin URL
define('LOGIN_URL', 'https://api.baidu.com/sem/common/HolmesLoginService');
//DataApi URL
define('API_URL', 'https://api.baidu.com/json/tongji/v1/ProductService/api');
//USERNAME
define('USERNAME', '环球兴学');
//PASSWORD
define('PASSWORD', 'HQ2014edu');
//TOKEN
define('TOKEN', '2c5bdcf2aeb11d32a00317f36cf5e1ef');
//UUID, used to identify your device, for instance: MAC address
define('UUID', '94-DE-80-26-66-7C');
//ACCOUNT_TYPE
define('ACCOUNT_TYPE', 2);

if(isset($_POST[connect]))
{
	$loginService = new LoginService();

    //preLogin
    if (!$loginService->PreLogin())
    {
        exit();
    }

    //doLogin
	$ret = $loginService->DoLogin();
	if ($ret)
	{
    	$ucid = $ret['ucid'];
    	$st = $ret['st'];
	}
	else
	{
    	exit();
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK rev=MADE
href="mailto:haowubai@hotmail.com"><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<BODY>
<TABLE class=navi cellSpacing=1 align=center border=0>
  <TBODY>
  <TR>
  <form action="" method="post">
    <TH>后台 >> 百度统计</TH></TR></TBODY></TABLE><BR>

	<table border=0 cellspacing=1 align=center class=form>

    <tr>
    <td><input type="submit" name="connect" size=20 value="连接百度服务器"></td>
    </tr>

	</table>

	<br>

  </BODY></HTML>
