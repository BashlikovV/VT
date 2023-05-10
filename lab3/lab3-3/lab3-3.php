<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post" action="" name="form">
    <label for="1">Params for array1</label>
    <input name="1" id="1" type="text">
    <label for="2">Params for array2</label>
    <input name="2" id="2" type="text">
    <button type="submit" name="submit">Submit</button>
</form>
<?php

function contains($array, $elem): bool {
    for ($i = 0; $i < sizeof($array); $i++) {
        if ($array[$i] == $elem) {
            return true;
        }
    }
    return false;
}

if (isset($_POST['submit'])) {
    $tmp = $_POST['1'];
    $array1 = explode(", ", $tmp);
    $tmp2 = $_POST['2'];
    $array2 = explode(", ", $tmp2);
    $result = array();
    for ($i = 0; $i < sizeof($array1); $i++) {
        $result[] = $array1[$i];
    }
    for ($i = 0; $i < sizeof($array2); $i++) {
        if (!contains($array1, $array2[$i])) {
            $result[] = $array2[$i];
        }
    }
    //2, 2, 5, 3, 7, 2
    //2, 4, 4, 85
    $input = json_encode($result);
    echo "<p>$input</p>";
    for ($i = 0; $i < sizeof($result); $i++) {
        echo "<p>(int)$result[$i]</p>";
    }
}
?>
</body>
</html>