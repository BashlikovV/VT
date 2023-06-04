<?php

class SQLiteAppDatabase {
    private string $path = "/home/bashlikovvv/Bsuir/VT/lab8-3/db.sqlite3";
    private PDO $dbh;

    public function __construct()
    {
        $this->dbh = new PDO("sqlite:$this->path");
    }

    private function getCount($colName) {
        switch ($colName) {
            case "linux": { return 0; }
            case "windows": { return 1; }
            case "android": { return 2; }
            case "macos": { return 3; }
            case "apple": { return 4; }
        }
    }

    public function getValues(): array
    {
        $array = array();
        $query = "select * from oss where ROWID = 1;";
        foreach ($this->dbh->query($query) as $item) {
            for ($i = 0; $i < 5; $i++) {
                $array[] = $item[$i];
            }
        }

        return $array;
    }

    private function incContract($colName): void
    {
        $query = "select ($colName) from oss;";
        {
            foreach ($this->dbh->query($query) as $item) {
                if ((int) $item[0] == 0) {
                    $insertQuery = "update oss set ($colName) = (1);";
                } else {
                    $value = (int) $item[0] + 1;
                    echo "$value<br>";
                    $insertQuery = "update oss set ($colName) = ($value);";
                }
                $this->dbh->exec($insertQuery);
            }
        }
    }

    private function decContract($rowName): void
    {
        $query = "select ($rowName) from oss;";
        foreach ($this->dbh->query($query) as $item) {
            if ($item[0] > 0) {
                $insertQuery = "update oss set ($rowName) = ($item - 1) where ROWID = 1;";
                $this->dbh->query($insertQuery);
            }
        }
    }

    public function incLinux(): void
    {
        $this->incContract("linux");
    }

    public function incWindows(): void
    {
        $this->incContract("windows");
    }

    public function incAndroid(): void
    {
        $this->incContract("android");
    }

    public function incMacOs(): void
    {
        $this->incContract("macos");
    }

    public function incApple(): void
    {
        $this->incContract("apple");
    }

    //

    public function decLinux(): void
    {
        $this->decContract("linux");
    }

    public function decWindows(): void
    {
        $this->decContract("windows");
    }

    public function decAndroid(): void
    {
        $this->decContract("android");
    }

    public function decMacOs(): void
    {
        $this->decContract("macos");
    }

    public function decApple(): void
    {
        $this->decContract("apple");
    }
}