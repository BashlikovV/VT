<?php
// Определите каталоги, которые нужно архивировать
$directories = [
    './files'
];

// Определите путь, где будет создан архив
$archivePath = './hummel.zip';

// Создайте новый объект ZipArchive
$zip = new ZipArchive();

// Откройте архив для записи
if ($zip->open($archivePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
    // Проход по каждому каталогу и добавление файлов в архив
    foreach ($directories as $directory) {
        // Получите список файлов в каталоге
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        // Добавьте каждый файл в архив
        foreach ($files as $name => $file) {
            // Пропустите папки
            if (!$file->isDir()) {
                // Получите относительный путь файла
                $relativePath = substr($file, strlen($directory) + 1);

                // Добавьте файл в архив с сохранением относительной структуры
                $zip->addFile($file, $relativePath);
            }
        }
    }

    // Закройте архив
    $zip->close();

    echo 'Архив успешно создан!';
} else {
    echo 'Не удалось открыть архив для записи.';
}