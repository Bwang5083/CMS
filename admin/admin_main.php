<?php
include_once ('admin_global.php');

$r=$db->Get_user_shell_check($uid, $shell);
if($_GET[action]=='logout')$db->Get_user_out();

$query=$db->findall("p_config");
while($row=$db->fetch_array($query)){
	//print_r($row[name]);
	//print_r($row[values]);
	//$row_arr[$row[name]]=$row[values];
	$row_arr[websitename]=$row[websitename];
	$row_arr[website_url]=$row[website_url];
	$row_arr[website_keyword]=$row[website_keyword];
	$row_arr[website_cp]=$row[website_cp];
	$row_arr[website_email]=$row[website_email];
	$row_arr[website_tel]=$row[website_tel];
}
//print_r($_POST);
if(isset($_POST['update'])){
	unset($_POST['update']);
	foreach($_POST as $name=>$values){
		$db->query("update p_config set `websitename`='$_POST[websitename]',`website_url`='$_POST[website_url]'," .
				"`website_keyword`='$_POST[website_keyword]',`website_cp`='$_POST[website_cp]'," .
				"`website_email`='$_POST[website_email]',`website_tel`='$_POST[website_tel]'");
	}
	$db->Get_admin_msg("admin_main.php");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>��̨����</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK rev=MADE
href="mailto:haowubai@hotmail.com"><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<BODY>
<tr><h2 style="color:purple">&nbsp;current user��<?php echo $_SESSION[username]?></h2></tr>
<TABLE class=navi cellSpacing=1 align=center border=0>
  <TBODY>
  <TR>
  <form action="" method="post">
    <TH>��̨ >> ϵͳ����</TH></TR></TBODY></TABLE><BR>

	<table border=0 cellspacing=1 align=center class=form>
	<tr>
		<th colspan="2">ϵͳ����</th>
	</tr>
     	  <tr>
  <td align="right">��վ����:</td>
  <td><input type="text" name="websitename" value="<?php echo $row_arr[websitename]?>"/>  </td>
  </tr>
       	  <tr>
  <td align="right">��վ��ַ:</td>
  <td><input type="text" name="website_url" value="<?php echo $row_arr[website_url]?>"/>  </td>
  </tr>
  <tr>
  <td align="right">�ؼ���:</td>
  <td><input type="text" name="website_keyword" size=40 value="<?php echo $row_arr[website_keyword]?>"/>  </td>
  </tr>
  <tr>
  <td align="right">˵��:</td>
  <td><input type="text" name="website_cp" size=40 value="<?php echo $row_arr[website_cp]?>"/>  </td>
  </tr>
  <tr>
  <td align="right">�绰:</td>
  <td><input type="text" name="website_tel" size=40 value="<?php echo $row_arr[website_tel]?>"/>  </td>
  </tr>
  <tr>
  <td align="right">email:</td>
  <td><input type="text" name="website_email" size=40 value="<?php echo $row_arr[website_email]?>"/>  </td>
  </tr>
  <tr>
    <td colspan="2" align="center" height='30'>
  <input type="submit" name="update" value=" ���� "/>

  </td>  </form>
    </tr>
	</table>

	</BODY></HTML>
