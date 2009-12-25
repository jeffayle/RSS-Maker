<?php
    require('lib.php');
    $db = db_connect();
    $update = ($_SERVER['QUERY_STRING']=='edit') ? $_POST['article'] : 0;
    
    if ($update == 0)
        $feed = $_POST['feed'];
    else
        $feed = 0; //Does not know feed if updating, does not change it.
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $link = $_POST['link'];
    $auth = $_POST['author'];
    $cat = $_POST['cat'];
    $pubDate = $_POST['pubDate']*1;

    new_article($db, $feed,$title,$desc,$link,$auth,$cat,$pubDate,$update);
    
    if ($update == 0)
        header("Location: feed.php?f=$feed");
    else
        header("Location: article.php?a=$update");
?>
