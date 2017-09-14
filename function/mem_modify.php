<?php
include("f_member.php");
if(isset($_GET['id']) && isset($_GET['num'])){
    $id = $_GET['id'];
    $num = $_GET['num'];
    if($num==1)mem_reborn($id);
    elseif($num==-1)mem_dead($id);
}
?>