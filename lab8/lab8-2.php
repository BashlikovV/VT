<?php

// Путь к исходному изображению
$sourceImagePath = 'abra@gmail.com.jpg';

// Путь для сохранения уменьшенной копии
$thumbnailPath = 'sugoma.jpg';

// Максимальные размеры уменьшенной копии
$maxWidth = 200;
$maxHeight = 200;

// Создание изображения из исходного файла
$sourceImage = imagecreatefromjpeg($sourceImagePath);

// Получение размеров исходного изображения
$sourceWidth = imagesx($sourceImage);
$sourceHeight = imagesy($sourceImage);

// Вычисление новых размеров уменьшенной копии с сохранением пропорций
$aspectRatio = $sourceWidth / $sourceHeight;
if ($maxWidth / $maxHeight > $aspectRatio) {
    $newWidth = $maxHeight * $aspectRatio;
    $newHeight = $maxHeight;
} else {
    $newWidth = $maxWidth;
    $newHeight = $maxWidth / $aspectRatio;
}

// Создание нового изображения с уменьшенными размерами
$thumbnail = imagecreatetruecolor($newWidth, $newHeight);
imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);

// Сохранение уменьшенной копии в файл
imagejpeg($thumbnail, $thumbnailPath);

// Освобождение памяти, занятой изображениями
imagedestroy($thumbnail);
imagedestroy($sourceImage);

echo 'Уменьшенная копия изображения успешно создана и сохранена.';

?>