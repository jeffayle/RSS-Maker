<?php
    require('lib.php');
    $db = db_connect();
    $update = ($_SERVER['QUERY_STRING']=='edit') ? $_POST['feed'] : 0;
    
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $url = $_POST['url'];
    $cat = $_POST['cat'];
    $copy = $_POST['copyright'];
    $image_url = $_POST['image_url'];
    $image_title = $_POST['image_title'];
    $language = $_POST['lang'];
    $webmaster = $_POST['webmaster'];
    $editor = $_POST['editor'];

    new_feed($db, $name,$desc,$url,$cat,$copy,$image_url,$image_title,$language,
            $webmaster, $editor, $update);

    header('Location: index.php');
?>
