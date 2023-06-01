<?php
    class SQLiteDatabaseRep {

        private $dbh = null;

        public function __construct()
        {
        }

        function getUsers(): array {
            $result = array();
            try {
                $dbh = new PDO('sqlite:/home/bashlikovvv/Bsuir/VT/lab7/database/database.sqlite');
                $query = "select * from users;";
                foreach ($dbh->query($query) as $item) {
                    $result[] = $item[0];
//                    echo "$item[0]<br>";
                }
            } catch (Exception $e) {
                $str = $e->getMessage();
                echo "$str<br>";
            }

            return $result;
        }
    }