<?php
include_once ('admin_global.php');

$r=$db->Get_user_shell_check($uid, $shell);

if(isset($_GET[del])){
	mysql_query("DELETE FROM `p_newsbase` WHERE `id` = '$_GET[del]' LIMIT 1;");
	mysql_query("DELETE FROM `p_newscontent` WHERE `nid` = '$_GET[del]' LIMIT 1;");
	$db->Get_admin_msg("admin_news_list.php", "删除成功");
}

if(isset($_POST[into_news])){
	$db->query("INSERT INTO `news_php100`.`p_newsbase` (`id`, `cid`, `title`, `author`, `date_time`) " .
			"VALUES (NULL, '$_POST[cid]', '$_POST[title]', '$_POST[author]', '".mktime()."');");
	$last_id=$db->insert_id();
	$db->query("INSERT INTO `news_php100`.`p_newscontent` (`nid`, `keyword`, `content`, `remark`) " .
			"VALUES ($last_id, '$_POST[keyword]', '$_POST[content]', '');");
	$db->Get_admin_msg("admin_news_add.php","添加成功");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK rev=MADE
href="mailto:haowubai@hotmail.com"><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR>
</HEAD>
<BODY>
<TABLE class=navi cellSpacing=1 align=center border=0>
  <TBODY>
  <tr>当前用户：<?php echo $_SESSION[username]?></tr>
  <br>
  <TR>
  <form action="" method="post">
    <TH>后台 >> 新闻列表</TH></TR></TBODY></TABLE><BR>

	<table border=0 cellspacing=1 align=center class=form>
	<tr>
		<th width='100'>新闻分类</th><th>新闻标题</th><th width='100'>作者</th><th width='100'>日期</th><th width='100'>操作</th>
	</tr>
    <tr>
    <?php
    $result=mysql_query("select id from p_newsbase");
    $total=mysql_num_rows($result);
    pageft($total,20);
    if($firstcount<0) $firstcount=0;
    $query=$db->findall("p_newsbase limit $firstcount, $displaypg");
    while($row=$db->fetch_array($query)){
    	$query_name = mysql_query("select * from p_newsclass where id='$row[cid]'");
        $row_name = mysql_fetch_array($query_name);
    ?>
    	<td><?php echo $row_name[name]?></td>
    	<td><?php echo $row[title]?></td>
    	<td><?php echo $row[author]?></td>
    	<td><?php echo date("Y-m-d",$row[date_time])?></td>
    	<td><a href='?del=<?php echo $row[id]?>'>删除</a> / 修改</td>
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
