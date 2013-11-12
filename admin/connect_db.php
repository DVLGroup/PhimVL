<?php
$link = mysql_connect('localhost', 'root', '123456');
if (!$link) {
	die('Lỗi kết nối: ' . mysql_error());
} else {

}
$db_selected = mysql_select_db('dbwebphim', $link);
mysql_query("SET character_set_client=utf8", $link);
mysql_query("SET character_set_connection=utf8", $link);
mysql_query("SET character_set_results=utf8", $link);
if (!$db_selected) {
	die('Lỗi kết nối: ' . mysql_error());
} else {
//echo
}
?>