<?php

class PostLoader {
    private $posts = [];
    //private $contents = 'database.txt';
    const DB_FILE = 'database.txt';

    public function addPost($title, $content, $author){
        $newPost = new Post($title, $content, $author);
        array_push($this->posts, $newPost);
    }

    public function savePost(){
        // Encode the posts array to save it to the database.txt file
        $encodedPosts = serialize($this->posts); // Converts an array or object to a string representation of the object
        //otherwise we could use json_encode and export

        //file_put_contents('database.txt', $encodedPosts);
        //$contents = file_get_contents('database.txt', $encodedPosts);
        file_put_contents(self::DB_FILE, $encodedPosts);
    }

    public function getPosts(){
        return $this->posts; //converts string to array
    }

    public function __construct() {
        //$contents = file_get_contents('database.txt');
        $contents = file_get_contents(self::DB_FILE);


        if (!empty($contents)){
        //added if (!empty($contents)) in order to solve error on line 10:
        // array_push() expects parameter 1 to be array in Postloader
            $this->posts = unserialize($contents); //put contents in posts, converts string to array
        }

    }

}

$loader = new PostLoader();
