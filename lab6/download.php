<?php
namespace explorer;

if (isset($_GET['file'])) {
    $filename = $_GET['file'];

    // Check if file exists
    if (! file_exists("files/" . $filename)) {
        die("File not found.");
    }

    // Download file
    header("Content-Disposition: attachment; filename=" . basename($filename));
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . filesize("files/" . $filename));
    readfile("files/" . $filename);

    exit();
}