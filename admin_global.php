<?php
session_start();
include_once ("common/mysql.class.php"); //mysql��
include_once ("config.php"); //���ò���
include_once ("common/page.class.php"); //��̨ר�÷�ҳ��
include_once ("common/action.class.php"); //���ݿ������

//��mysql��Ĺ��캯���У���mysql��API����mysql���ݿ�
$db = new action($mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset); //���ݿ������.

$uid = $_SESSION[uid];
$shell = $_SESSION[shell];
?>