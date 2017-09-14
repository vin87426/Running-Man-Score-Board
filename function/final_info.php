<?php
include("f_member.php");
include("f_item.php");
$teamlist = mem_all();
$freeze = get_freeze();
foreach ($teamlist as $key => $value){
    $score[$key] = $value['score'];
    $mem_cur[$key] = $value['mem_cur'];
}
array_multisort($score,SORT_DESC,$mem_cur,SORT_DESC,$teamlist);
echo json_encode(array($teamlist,$freeze));
?>