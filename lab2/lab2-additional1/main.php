<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="" name="form">
            <label for="params">Input</label>
            <textarea name="params" id="params" rows="5" cols="50"></textarea>
            <button type="submit" name="submit">Submit</button>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $params = $_POST['params'];
                $type = gettype($params);
                echo "<h3>$type</h3>";
            }
        ?>
    </body>
</html>