<?php
include("sql_in.php");
include("f_reset_sql.php");
include("f_score_in.php");
include("f_npc.php");
include("f_item.php");
include("f_member.php");
//reset_sql();

score_in(1,1000,"eat");
score_in(1,1000,"drink");
score_in(5,1500,"sleep");
score_in(3,-300,"sleep");
score_in(4,1000,"army");
score_in(2,1000,"eat");
score_in(7,800,"rain");
score_in(8,2000,"eat");
score_in(6,1000,"nier");
score_in(2,-100,"nier");

$log = npc_search("sleep");
echo $log[0][0];
echo "<br>";
echo $log[0][1];
echo "<br>";
echo $log[0][2];
echo "<br>";
echo "<br>";

npc_eventdel($log[0][0]);

$log = npc_search("sleep");
echo $log[0][0];
echo "<br>";
echo $log[0][1];
echo "<br>";
echo $log[0][2];
echo "<br>";

$pig=pig_change(4);
$sword=sword_change(0);
echo "init-pig:".$pig."<br>";
echo "init-sword:".$sword."<br>";

$sword=sword_change(1);
$pig=pig_change(1);
$sword=sword_change(1);
$pig=pig_change(1);
echo "tmp-pig:".$pig."<br>";
echo "tmp-sword:".$sword."<br>";
mem_dead(2);
mem_dead(2);
$pig=pig_change(-1);

$sword=sword_change(1);
$mcur=mem_now(2);
echo "team2:".$mcur."<br>";

$sword=sword_change(1);
$pig=pig_change(-1);
echo "tmp-pig:".$pig."<br>";
echo "tmp-sword:".$sword."<br>";

if($sword>=4){
    kingofpig(1);
    echo ">";
}

mem_reborn(2);
$mcur=mem_now(2);
echo "<br>team2:".$mcur."<br>";


?>