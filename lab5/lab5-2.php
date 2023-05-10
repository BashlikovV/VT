<?php

function getDirSize($path): int
{
    $total_size = 0;
    $files = scandir($path);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..')
            continue;
        $file_path = $path . '/' . $file;
        if (is_dir($file_path)) {
            $total_size += getDirSize($file_path);
        } else {
            $total_size += filesize($file_path);
        }
    }

    return $total_size;
}

$path = "/home/bashlykovvv/Bsuir/VT/";
printf("%s\n", "Total directory size: " . getDirSize($path) . " bytes");