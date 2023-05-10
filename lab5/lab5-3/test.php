<?php
require_once 'database/SQLiteCalendarRepository.php';
$repository = new SQLiteCalendarRepository();
$repository->addNews(
    "17", "https://stackoverflow.com/questions/27846429/how-can-i-connect-the-wasd-keys-to-specific-events",
    "test message 17", "test theme 17", "17"
);