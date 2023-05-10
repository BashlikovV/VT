<html>
  <head></head>
<body>
  <table>
    <?php
    $array = array(
        0 => array(0, 1, 2, 3, 4),
        1 => array(0, 1, 2, 3, 4),
        2 => array(0, 1, 2, 3, 4),
        3 => array(0, 1, 2, 3, 4),
        4 => array(0, 1, 2, 3, 4)
    );
    $colors = array(
        0 => "FF0000",
        1 => "0000FF",
        2 => "008000",
        3 => "800080",
        4 => "ffd966"
    );
    for ($i = 0; $i < 5; $i++) {
        printArray($array, $colors[$i], $i);
    }
    function printArray($array, $color, $i) {
        echo "<tr style='background-color: {$color}'>";
        for ($j = 0; $j < 5; $j++) {
            $value = json_encode($array[$i][$j]);
            echo "<td style='background-color: {$color}'>$value</td>";
        }
        echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
