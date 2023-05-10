<?php
interface CalendarRepository {

    public function getNewsByDate(string $date): News;

    public function getAllNews(): array;

    public function addNews($postedTime, $link, $message, $theme, $image);
}