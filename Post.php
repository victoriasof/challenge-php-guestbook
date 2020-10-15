<?php

class Post {
    private $title;
    private $date;
    private $content;
    private $author;

    /**
     * Post constructor.
     * @param $title
     * @param $content
     * @param $author
     */
    public function __construct($title, $content, $author)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = date('Y/m/d H-i-s');
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDate(){
        return $this->date;
    }

    public function getContent(){
        return $this->content;
    }

    public function getAuthor(){
        return $this->author;
    }
}