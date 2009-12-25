<?php
    require('lib.php');
    $db = db_connect();

    $id = $_GET['id'];
    $article = get_article($db, $id);
    rm_article($db, $id);

    header("Location: feed.php?f={$article['feed']}");
?>
