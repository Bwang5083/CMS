<?php
include_once ('admin_global.php');

$r = $db->Get_user_shell_check($uid, $shell);

if (isset ($_POST[into_news])) {
	$db->query("INSERT INTO `news_php100`.`p_newsbase` (`id`, `cid`, `title`, `author`, `date_time`) " .
	"VALUES (NULL, '$_POST[cid]', '$_POST[title]', '$_POST[author]', '" . mktime() . "');");
	$last_id = $db->insert_id();
	$db->query("INSERT INTO `news_php100`.`p_newscontent` (`nid`, `keyword`, `content`, `remark`) " .
	"VALUES ($last_id, '$_POST[keyword]', '$_POST[content]', '');");
	$db->Get_admin_msg("admin_news_add.php", "���ӳɹ�");
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
<TABLE class=navi cellSpacing=1 align=center border=0>
  <TBODY>
  <TR>
  <form action="" method="post">
    <TH>��̨ >> ��������</TH></TR></TBODY></TABLE><BR>

	<table border=0 cellspacing=1 align=center class=form>
	<tr>
		<th colspan="2">��������</th>
	</tr>
	<form action="" method="post" onsubmit="syncTextarea()">
    <tr>
    <td width='100'>ѡ�����</td>
    <td>
  <select name="cid">
    <option value="0"> </option>
    <?php
    $query = mysql_query("select * from p_newsclass where f_id=0");
    while ($row = mysql_fetch_array($query)) {
	    echo "<option value=\"$row[id]\">$row[name]</option>";
	    $query_son = mysql_query("select * from p_newsclass where f_id='$row[id]'");
	    while ($row_son = mysql_fetch_array($query_son)) {
		    echo "<option value=\"$row_son[id]\">&nbsp;&nbsp;&nbsp;��$row_son[name]</option>";
	    }
    }
    ?>
  </select>
    </td>
    </tr>

    <tr>
    <td>���ű���</td>
    <td><input type="text" name="title" size=50></td>
    </tr>
    <tr>
    <td>��������</td>
    <td><input type="text" name="author" size=20></td>
    </tr>

  <tr>
    <td>����</td>
    <td>
    <textarea id="edited" name="content" style="width:95%;height:280px"></textarea>
    <script language="JavaScript" type="text/javascript" src="edit/whizzywig61.js"></script>


    </td>
    </tr>

    <tr>
    <td></td>
    <td><input type="submit" name="into_news" value="��������"></td>
    </tr>

    </form>
	</table>

	<br>

  </BODY></HTML>