<html lang="">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
        <body>
            <form method="post" action="">
                <label for="plain_text">Plain text: </label>
                <input type="text" id="plain_text" name="plain_text" value="">
                <label for="key">Key: </label>
                <input type="text" id="key" name="key" value="">
                <label for="ed">Encrypt/Decrypt</label>
                <input type="checkbox" id="ed" name="ed" value="true">
                <button type="submit" name="submit">Generate result</button>
            </form>
            <?php
                require_once 'Encoder.php';

                if (isset($_POST['submit'])) {
                    $text = $_POST['plain_text'];
                    $key = $_POST['key'];
                    $encoder = new Encoder($text, $key);
                    $result = "123";
                    if (isset($_POST['ed'])) {
                        $result = $encoder->encrypt();
                    } else {
                        $result = $encoder->decrypt();
                    }
                    echo "<h3>$result</h3>";
                }
            ?>
        </body>
</html>