<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Календарь</title>
</head>
<body>
<form method="post">

</form>
</body>
<?php
require_once 'database/SQLiteCalendarRepository.php';
require_once 'database/entities/News.php';

function getData() {
    $tmp = new SQLiteCalendarRepository();
    $values = $tmp->getAllNews();
    $data = array();
    for ($i = 0; $i < sizeof($values); $i ++) {
        $t = $values[$i];
        if ($t instanceof News) {
            $data[] = array(
                $t->getPostedTime() => array(
                    $t->getMessage(),
                    $t->getLink(),
                    $t->getImage(),
                    $t->getTheme()
                )
            );
        }
    }

    return $data;
}

function getElemByDate($data, int $date) {
    for ($i = 0; $i < sizeof($data); $i++) {
        $tm = $data[$i];
        if ($tm["$date"] != null) {
            return $tm["$date"];
        }
    }
}

function generateCalendar() {
    $data = getData();

    $currentDate = 1;
    $html = '<table bgcolor="lightgrey" align="center" cellspacing="21" cellpadding="21">';
    $html = $html.'<caption align="top"></caption>';
    $html = $html.'<thead><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>sat</th></tr></thead>';
    $html = $html.'<tbody>';

    for ($i = 0; $i < 6; $i++) {
        $html = $html."<tr>";
        for ($j = 0; $j < 7; $j++) {
            $internalValue = array();
            $t = getElemByDate($data, "$currentDate");
            if ($t != null) {
                $message = $t[0];
                $link = $t[1];
                $image = $t[2];
                $theme = $t[3];
                $internalValue = array($message, $link, $image, $theme);
            }
            $html = $html."<td><p>$currentDate</p>";
            $html = $html."<label>message:</label><input type='text' value='$internalValue[0]'>";
            $html = $html."<label>link:</label><input type='text' value='$internalValue[1]'>";
            $html = $html."<label>image:</label><input type='text' value='$internalValue[2]'>";
            $html = $html."<label>theme:</label><input type='text' value='$internalValue[3]'>";
            $html = $html."</td>";
            $currentDate++;
            if ($currentDate > 31) {
                $currentDate = 1;
            }
        }
        $html = $html."</tr>";
        $html = $html."<tr></tr>";
    }

    $html = $html.'</tbody>';
    $html = $html.'</table>';
    echo $html;
}

generateCalendar();
echo "<form></form>";
?>
</html>