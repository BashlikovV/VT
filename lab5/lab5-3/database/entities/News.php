<?php
class News {

    private $postedTime;
    private $link;
    private $message;
    private $theme;
    private $image;

    /**
     * @param string $postedTime
     * @param string $link
     * @param string $message
     * @param string $theme
     * @param string $image
     */
    public function __construct(string $postedTime, string $link, string $message, string $theme, string $image)
    {
        $this->postedTime = $postedTime;
        $this->link = $link;
        $this->message = $message;
        $this->theme = $theme;
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getPostedTime(): string
    {
        return $this->postedTime;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }
}