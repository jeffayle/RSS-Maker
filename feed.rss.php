<?php
    /* Generates the actual RSS feed from the database */
    header("Content-Type: text/plain"); //Just temporarily, for debudding
    require('lib.php');
    $db = db_connect();

    $feed = get_feed($db, $_GET['f']);
    $articles = article_list($db, $_GET['f']);

    echo '<?xml version="1.0" encoding="ISO-8859-1" ?>';
?>
<rss version="2.0">
    <channel>
        <title><?= $feed['title'] ?></title>
        <link><?= $feed['link'] ?></title>
        <description><?= $feed['description'] ?></description>
    </channel>
</rss>
