<?php
include_once('admin_global.php');
if(!empty($_POST[username])&& !empty($_POST[password])) $db->Get_user_login($_POST[username],$_POST[password]);
?>
<html><head><meta http-equiv='Content-Type' content='text/html; charset=gb2312'>
<meta name='Author' content='Alan'>
<link rev=MADE href='mailto:haowubai@hotmail.com'><title>后台管理</title>
<link rel='stylesheet' type='text/css' href='images/private.css'>
<script> if(self!=top){ window.open(self.location,'_top'); } </script>
</head><body>
<div style="background:url('./images/background.jpg') repeat; width:100%; height:100%;">
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<form action="" method="post">
	<table border=0 cellspacing=1 bordercolor="red" align=center class=form style="width: 350px; height: 100px;">
	<tr>
		<th colspan="2"><h2>Login</h2></th>
	</tr>
  <tr>
  <td align="right"><h3>User Name:</h3></td>
  <td><input type="text" name="username" value="wangbin" size="20" maxlength="40"/>  </td>
  </tr>
  <tr>
  <td align="right"><h3>Password:</h3></td>
  <td><input type="password" name="password" value="123456" size="20" maxlength="40"/>  </td>
  </tr>
  <tr>
  <td colspan="2" align="center" height='30'>
  <input type="submit" name="update" value="  login  " />
  </td>
  </form>
  </tr>
  </table>
</div>
</body></html>






