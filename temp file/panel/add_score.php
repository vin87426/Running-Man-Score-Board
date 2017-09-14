<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

Team number :
<?php
    $num=$_GET["team"];
    for($i=1; $i<=8; $i++){
        if($num % 10 == 1){
            echo $i;
            echo " ";
        }
        $num /= 10;
    }
?><br>

</body>
</html>