<?php
namespace explorer;

if (isset($_GET['file'])) {
    $filename = $_GET['file'];

    // Check if file exists
    if (! file_exists("files/" . $filename)) {
        die("File not found.");
    }

    // Delete file
    unlink("files/" . $filename);

    header("Location: index.php");
    exit();
}