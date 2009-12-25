<?php
    require('lib.php');
    $db = db_connect();

    $feed = $_POST['feed'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $link = $_POST['link'];
    $auth = $_POST['author'];
    $cat = $_POST['cat'];
    $pubDate = $_POST['pubDate']*1;

    new_article($db, $feed,$title,$desc,$link,$auth,$cat,$pubDate);

    header("Location: feed.php?f=$feed");
?>
