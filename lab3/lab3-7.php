<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="" name="form">
            <label for="path">Path: </label>
            <input name="path" id="path" type="text">
            <button type="submit" name="submit">Submit</button>
        </form>
        <table>
            <?php
            if (isset($_POST['submit'])) {
                $dir = $_POST['path'];
                if (is_dir($dir)) {
                    if ($dh = opendir($dir)) {
                        //About directory
                        $fi = new SplFileInfo($dir);

                        echo "Directory:".$fi->getPath()."/".$fi->getFilename()." <br />";

                        $file = readdir($dh);
                        while ($file != false) {
                            $info = new SplFileInfo($dir.$file);
                            $size = $info->getSize();
                            $time = gmdate("Y-m-d\TH:i:s", $info->getCTime());
                            if (is_file($dir.$file /** path to file */)) {
                                echo "filename: ".$file.", size: ".$size.", createdAt: "  .$time."<br/>";
                                $ext = pathinfo($dir.$file, PATHINFO_EXTENSION);
                                if ($ext == "txt") {
                                    $text = file_get_contents($dir.$file);
                                    $tmp = 100;
                                    if ($tmp < sizeof(array($text))) {
                                        $tmp = sizeof(array($text));
                                    }
                                    $text = substr($text, 0, $tmp);
                                    echo "<p>text: ".$text."<br/><p/>";
                                }
                            } else {
                                echo "dir name: ".$file.", size: ".$size.", createdAt: ".$time."<br/>";
                            }
                            $file = readdir($dh);
                        }

                        closedir($dh);
                    }
                }
            }
            ?>
        </table>
    </body>
</html>
