<?php
/* Library functions */

/* Connect to the database, return connection object */
function db_connect() {
    $db = new SQLiteDatabase('data/database.sqlite');
    return $db;
}

/* Create a new feed */
function new_feed($db, $name, $desc, $url, $cat, $copyright, $image_url,
        $image_title, $lang, $webmaster, $editor, $update=0) {
     $name = sqlite_escape_string($name);
     $desc = sqlite_escape_string($desc);
     $url = sqlite_escape_string($url);
     $cat = sqlite_escape_string($cat);
     $copyright = sqlite_escape_string($copyright);
     $image_url = sqlite_escape_string($image_url);
     $image_title = sqlite_escape_string($image_title);
     $lang = sqlite_escape_string($lang);
     $webmaster = sqlite_escape_string($webmaster);
     $editor = sqlite_escape_string($editor);
     if ($update == 0) {
         $db->query("INSERT INTO feeds (title,description,link,category,
                copyright, image_url,image_title,language,webmaster,editor)
                VALUES ('$name','$desc','$url','$cat','$copyright','$image_url',
                    '$image_title','$lang','$webmaster','$editor')");
     } else {
        $id = sqlite_escape_string($update); //Feed id to update
        $db->query("UPDATE feeds SET
                title = '$name',
                description = '$desc',
                link = '$url',
                category = '$cat',
                copyright = '$copyright',
                image_url = '$image_url',
                image_title = '$image_title',
                language = '$lang',
                webmaster = '$webmaster',
                editor = '$editor'
            WHERE id = '$id'");
     }
     return true;
}

/* Get a list of feeds */
function feed_list($db) {
    $result = $db->arrayQuery('SELECT * FROM feeds', SQLITE_ASSOC);
    return $result;
}

/* Get a single feed */
function get_feed($db, $id) {
    $id = sqlite_escape_string($id);
    $result = $db->arrayQuery("SELECT * FROM feeds WHERE id='$id'",
            SQLITE_ASSOC);
    return $result[0];
}

/* Add a new article */
function new_article($db, $feed,$title,$desc,$link,$author,$cat,$pubDate) {
    $feed = sqlite_escape_string($feed);
    $title = sqlite_escape_string($feed);
    $link = sqlite_escape_string($link);
    $author = sqlite_escape_string($author);
    $cat = sqlite_escape_string($cat);
    $pubDate = sqlite_escape_string($pubDate);
    $db->query("INSERT INTO articles (feed,title,link,description,author,
            category,pubDate)
        VALUES ('$feed','$title','$link','$desc','$author',
        '$cat','$pubDate')");
}

/* Get a list of articles */
function article_list($db, $fid) {
    $fid = sqlite_escape_string($fid);
    $result = $db->arrayQuery("SELECT * FROM articles WHERE feed='$fid'
                ORDER BY pubDate DESC",
            SQLITE_ASSOC);
    return $result;
}

function get_article($db, $id) {
    $id = sqlite_escape_string($id);
    $result = $db->arrayQuery("SELECT * FROM articles WHERE id='$id'",
            SQLITE_ASSOC);
    return $result[0];
?>
