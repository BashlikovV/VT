<html lang="">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
    $numRows = isset($_POST['numRows']) ? intval($_POST['numRows']) : 0;

    if ($numRows <= 0) {
        echo "<p>Please enter a valid number of rows.</p>";
    } else {
        echo "<h2>Generated Table:</h2>";
        echo generateTable($numRows);
    }

    function generateTable($numRows) {
        $color = 0;
        $inc = 255 / $numRows;
        $html = "<table>";
        $html .= "<thead><tr><th>#</th></tr></thead>";
        $html .= "<tbody>";
        for ($i = 1; $i <= $numRows; $i++) {
            $html .= "<tr style='background-color: rgb($color, $color, $color)'><td>$i</td><td>Some Text</td></tr>";
            $color += $inc;
        }
        $html .= "</tbody>";
        $html .= "</table>";
        return $html;
    }
    ?>

    <form method="post" action="">
        <label for="numRows">Number of Rows:</label>
        <input type="number" id="numRows" name="numRows" value="<?php echo $numRows; ?>">
        <button type="submit">Generate Table</button>
    </form>
    </body>
</html>
