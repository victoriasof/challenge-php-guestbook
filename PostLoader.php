<?php

class PostLoader {
    private $posts = [];
    const DB_FILE = 'database.txt';

    public function addPost($title, $content, $author){
        $newPost = new Post($title, $content, $author);
        array_push($this->posts, $newPost);
    }

    public function savePost(){
        // Encode the posts array to save it to the database.txt file
        $encodedPosts = serialize($this->posts); // Converts an array or object to a string representation of the object
        // $contents = file_get_contents('database.txt');
        file_put_contents(self::DB_FILE, $encodedPosts);
    }

    public function getPosts(){
        return $this->posts; //converts string to array
    }

    public function __construct() {
        //$contents = file_get_contents('database.txt');
        $contents = file_get_contents(self::DB_FILE);
        $this->posts = unserialize($contents); //put contents in posts, converts string to array
    }

}

$loader = new PostLoader();
