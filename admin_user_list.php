<?php
include_once ('admin_global.php');

$r=$db->Get_user_shell_check($uid, $shell);

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
  <tr><h2 style="color:purple">&nbsp;&nbsp;welcome, <?php echo $_SESSION[username]?></h2></tr>
  <br>
  <TR>
  <form action="" method="post">
    <TH>后台 >> 用户管理</TH></TR></TBODY></TABLE><BR>

	<table border=0 cellspacing=1 align=center class=form>
	<tr>
		<th width='150'>username</th><th>password</th><th width='100'>operation</th>
	</tr>
    <tr>
    <?php
    $result=mysql_query("select uid from p_admin");
    $total=mysql_num_rows($result);
    pageft($total,20);
    if($firstcount<0) $firstcount=0;
    $query=$db->findall("p_admin limit $firstcount, $displaypg");
    while($row=$db->fetch_array($query)){
    ?>
    	<td><?php echo $row[username]?></td>
    	<td><?php echo $row[password]?></td>
    	<td><a href='?del=<?php echo $row[id]?>'>Delete</a> / Edit</td>
    </tr>
    <?php
    }
    ?>

    </tr>

    <tr>
    <th colspan="5"><?php echo $pagenav;?></th>
    </tr>
	</table>

	<br>

  </BODY></HTML>
