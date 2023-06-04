<?php

require_once "database/SQLiteAppDatabase.php";

function collectData($name): void
{
    $database = new SQLiteAppDatabase();

    if (str_contains($name, "Windows")) {
        $database->incWindows();
    } else if (str_contains($name, "Linux")) {
        $database->incLinux();
    } else if (str_contains($name, "Android")) {
        $database->incAndroid();
    } else if (str_contains($name, "Apple")) {
        $database->incApple();
    } else if (str_contains($name, "MacOs")) {
        $database->incMacOs();
    }
}

$name = $_SERVER['HTTP_USER_AGENT'];
collectData($name);
echo "$name<br>";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Graph - Canvas</title>
    <script src="canvas.js"></script>
    <style>
        #wrapper {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }
        #canvas {
            border: 1px solid black;
        }
    </style>
    <?php
        $database = new SQLiteAppDatabase();
        $values = implode(",", $database->getValues());
        echo "<input type='text' name='nums' id='nums' value='$values'>";
    ?>
</head>

<body>
<div id="wrapper">
    <label style="background: cyan">Linux</label>
    <label style="background: red">Windows</label>
    <label style="background: green">Android</label>
    <label style="background: blue">MacOs</label>
    <label style="background: magenta">Apple</label>
    <canvas id="canvas" width="400" height="400"></canvas>
</div>
</body>
</html>
