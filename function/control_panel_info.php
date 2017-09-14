<?php
include("f_member.php");
include("f_item.php");
include("f_npc.php");
$teamlist = mem_all();
$pig_sowrd_king = ask_game_state();
$npc_state = npc_search_all();
$freeze = get_freeze();
$all_info = array($teamlist,$pig_sowrd_king,$npc_state,$freeze);
echo json_encode($all_info);

?>