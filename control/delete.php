<!DOCTYPE html>
<html lang="en">

<!-- NPC 2 -->

<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <link rel="stylesheet" type="text/css" href="../css/control_log.css">
    <script src="../script/get_php.js"></script>
    <script src="../script/get_log.js"></script>
    <script src="../script/multi_select.js"></script>
</head>

<body>
<div id="modify" style="display: inherit">
    <div id="log" style="display: inherit"></div>
</div>

<div>
    <span id="change" onclick="window.location.href='game_control.html'" style="cursor: pointer;">Back</span>
    <span id="but_del" onclick="del('log',<?php echo $_GET['state'];?> )" style="cursor:pointer;">Del</span>
</div>
<script type="application/javascript">
    get_log('log',<?php echo $_GET['state'];?>);
</script>
</body>
</html>