<?php namespace explorer;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Explorer</title>
</head>
<body>
<h1>Explorer</h1>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Upload a File:
    <input type="file" name="the_file" id="fileToUpload">
    <input type="submit" name="submit" value="Start Upload">
</form>

<h2>Uploaded Files</h2>
<ul>
    <?php
    $files = glob("files/*");
    foreach ($files as $file) {
        echo "<li><a href='download.php?file=" . basename($file) . "'>" . basename($file) . "</a> <a href='delete.php?file=" . basename($file) . "'>Delete</a></li>";
    }
    ?>
</ul>
</body>
</html>