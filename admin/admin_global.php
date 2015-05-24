<?php
session_start();
include_once ("../common/mysql.class.php"); //mysql类
include_once ("../configs/config.php"); //配置参数
include_once ("common/page.class.php"); //后台专用分页类
include_once ("common/action.class.php"); //数据库操作类

//在mysql类的构造函数中，用mysql的API连接mysql数据库
$db = new action($mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset); //数据库操作类.

$uid = $_SESSION[uid];
$shell = $_SESSION[shell];
?>