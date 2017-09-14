<?php
include("f_member.php");
include("f_item.php");
include("f_npc.php");
$pig_sowrd_king = ask_game_state();
echo json_encode($pig_sowrd_king);

?>