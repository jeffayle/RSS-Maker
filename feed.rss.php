<?php
    /* Generates the actual RSS feed from the database */
    require('lib.php');
    $db = db_connect();

    $feed = get_feed($db, $_GET['f']);
    $articles = article_list($db, $_GET['f']);

    header("Content-Type: application/rss+xml");
    header(
        "Content-Disposition: attachment; filename=\"{$feed['title']}.rss\"");

    echo '<?xml version="1.0" encoding="ISO-8859-1" ?>';
?>
<rss version="2.0">
    <channel>
        <title><?= $feed['title'] ?></title>
        <link><?= $feed['link'] ?></link>
        <description><![CDATA[<?= $feed['description'] ?>]]></description>
        <? if ($feed['category']!='') { ?>
        <category><?= $feed['category'] ?></category>
        <? } if ($feed['copyright']!='') { ?>
        <copyright><?= $feed['copyright'] ?></copyright>
        <? } if ($feed['image_url']!='') { ?>
        <image>
            <url><?= $feed['image_url'] ?></url>
            <title><?= $feed['image_title'] ?></title>
            <link><?= $feed['image_url'] ?></link>
        </image>
        <? } if ($feed['language']!='') { ?>
        <language><?= $feed['language'] ?></language>
        <? } if ($feed['webmaster']!='') { ?>
        <webMaster><?= $feed['webmaster'] ?></webMaster>
        <? } if ($feed['editor']!='') { ?>
        <managingEditor><?= $feed['editor'] ?></managingEditor>
        <? } ?>
        <generator>RSS Creator</generator>

        <!-- Feed Items -->
        <? foreach ($articles as $a) { ?>
        <item>
            <title><?= $a['title'] ?></title>
            <link><?= $a['link'] ?></link>
            <description><![CDATA[<?= $a['description'] ?>]]></description>
            <? if ($a['author']!='') { ?>
            <author><?= $a['author'] ?></author>
            <? } if ($a['category']!='') { ?>
            <category><?= $a['category'] ?></category>
            <? } ?>
            <pubDate><?= date('D, d M Y g:i:s O',$a['pubDate']) ?></pubDate>
        </item>
        <? } ?>
    </channel>
</rss>
