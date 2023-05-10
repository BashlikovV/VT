<?php
require_once 'database/CalendarRepository.php';
require_once 'database/SQLiteContract.php';
require_once 'database/entities/News.php';
class SQLiteCalendarRepository implements CalendarRepository {

    private $dbh = null;

    /**
     * @param string $date
     * @return News
     * @throws Exception
     */
    public function getNewsByDate(string $date): News
    {
        throw new Exception("Not implemented");
    }

    /**
     * @return array of [News]
     */
    public function getAllNews(): array
    {
        $result = array();

        try {
            $dbh = new PDO(SQLiteContract::$CALENDAR_SQLITE_DATABASE_URL) or printf("Connection error");
            $query = "SELECT * FROM news;";
            foreach ($dbh->query($query) as $row) {
                $item = new News(
                    (string)$row[0], (string)$row[1], (string)$row[2], (string)$row[3], (string)$row[4]
                );
                $result[] = $item;
            }
        } catch (Exception $e) {
            printf($e->getMessage());
        } finally {
            $dbh = null;
        }

        return $result;
    }

    /**
     * @param $postedTime
     * @param $link
     * @param $message
     * @param $theme
     * @param $image
     * @return void
     */
    public function addNews($postedTime, $link, $message, $theme, $image)
    {
        try {
            $dbh = new PDO(SQLiteContract::$CALENDAR_SQLITE_DATABASE_URL) or printf("Connection error");
            $query =
                "INSERT INTO news(
	                posted_time, link, message, theme, image
                ) VALUES (
	                '$postedTime', '$link', '$message', '$theme', '$image'
                );";
            $dbh->query($query);
        } catch (Exception $e) {
            printf($e->getMessage());
        } finally {
            $dbh = null;
        }
    }
}
?>