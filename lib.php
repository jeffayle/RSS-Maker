<?php
/* Library functions */

/* Connect to the database, return connection object */
function db_connect() {
    $db = new SQLiteDatabase('data/database.sqlite');
    return $db;
}

/* Create a new feed */
function new_feed($db, $name, $desc, $url, $cat, $copyright, $image_url,
        $image_title, $lang, $webmaster, $editor) {
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
     $db->query("INSERT INTO feeds (title,description,link,category,copyright,
                image_url,image_title,language,webmaster,editor)
            VALUES ('$name','$desc','$url','$cat','$copyright','$image_url',
                '$image_title','$lang','$webmaster','$editor')");
     return true;
}

/* Get a list of feeds */
function feed_list($db) {
    $result = $db->array_query('SELECT * FROM feeds', SQLITE_ASSOC);
    return $result;
}
?>
