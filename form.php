<?php

//instead of isset:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //if above is true then way we have access to form input
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $loader = new PostLoader();
    //instantiated PostLoader and have access to properties of the class PostLoader
    $loader->addPost($title, $content, $author);
    $loader->savePost();

    $posts = $loader->getPosts();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="stylesheet" href="style.css">-->
</head>
<body>


<form method="POST">
    <label for="author">Author:
        <input type="text" name="author" id="author">
    </label>
    <label for="author">Title:
        <input type="text" name="title" id="title">
    </label>
    <label for="author">Message:
        <input type="text" name="content" id="content">
    </label>
    <button type="submit">Save</button>
</form>

<div id="posts-wrapper">

    <?php

    if (!empty($posts)) {

        foreach ($posts as $post) {
            ?>
            <div class="single-post">

                <p><?php echo $post->getTitle()?></p>;
                <p><?php echo $post->getAuthor()?></p>;
                <p><?php echo $post->getDate()?></p>;
                <p><?php echo $post->getContent()?></p>;

            </div>
            <?php
        }
    }

    ?>

</div>

</body>
</html>

