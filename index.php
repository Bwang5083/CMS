<?php
include_once ('global.php');

//$query=$db->query("SELECT * FROM `p_config`");
//$row=$db->fetch_array($query);
//echo $row[values];
//$smarty->assign("row",$row[name]);
//$smarty->assign("name","PHP100");

$sql = "SELECT * FROM `p_newsclass` where f_id=0 order by id ASC";
$query = $db->query($sql);
while($row_class = $db->fetch_array($query)){
	$sm_class[] = array("name"=>$row_class[name], "id"=>$row_class[id]);
}

$sql = "SELECT * FROM `p_config`";
$query = $db->query($sql);
while($row_config = $db->fetch_array($query)){
	$sm_config[] = array("websitename"=>$row_config[websitename], "website_url"=>$row_config[website_url],
	"website_keyword"=>$row_config[website_keyword], "website_cp"=>$row_config[website_cp],
	"website_email"=>$row_config[website_email], "website_tel"=>$row_config[website_tel]);
}

$smarty->assign("sm_class",$sm_class);
$smarty->assign("sm_config",$sm_config);
$smarty->display("index.htm");

?>
