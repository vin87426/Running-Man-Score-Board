<?php
include ("npc_search.php");
include ("reset_sql.php");
include ("score_in.php");
include ("sql_in.php");
reset_sql();
$x=npc_search("eat");
//$list[1] = array('id1',"team1","time1");
//$list[2] = array('id2',"team1","time1");
$myJSON = json_encode($list);
echo $myJSON;
?>
