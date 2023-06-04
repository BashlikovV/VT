<?php
class OSStorage {

    public int $linux = 0;
    public int $windows = 0;
    public int $android = 0;
    public int $macOs = 0;
    public int $apple = 0;

    public function incLinux(): void
    {
        $this->linux = $this->linux + 1;
    }

    public function incWindows(): void
    {
        $this->windows = $this->windows + 1;
    }

    public function incAndroid(): void
    {
        $this->android = $this->android + 1;
    }

    public function incMacOs(): void
    {
        $this->macOs = $this->macOs + 1;
    }

    public function incApple(): void
    {
        $this->apple = $this->apple + 1;
    }

    //

    public function decLinux(): void
    {
        $this->linux = $this->linux - 1;
    }

    public function decWindows(): void
    {
        $this->windows = $this->windows - 1;
    }

    public function decAndroid(): void
    {
        $this->android = $this->android - 1;
    }

    public function decMacOs(): void
    {
        $this->macOs = $this->macOs - 1;
    }

    public function decApple(): void
    {
        $this->apple = $this->apple - 1;
    }
}