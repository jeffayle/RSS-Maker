<? require('header.php');
    $fid = $_GET['f'];
    $feed = get_feed($db, $fid);
    $articles = article_list($db, $fid);
?>

<div id="nav">
    <a href="index.php">Home</a>
</div>

<h2><? echo $feed['title']; ?></h2>
<ul>
<? foreach ($articles as $a) {
    echo '<li>';
    echo "<a href=\"article.php?a={$a['id']}\">{$a['title']}</a>";
    echo '</li>';
} ?>
</ul>

<h2>New Article</h2>
<form action="newarticle.php" method="post">
    <input type="hidden" name="feed" value="<?=$fid?>" />
    Title: <input type="text" name="title" /> <br />
    <textarea name="desc">Description</textarea> <br />
    Link: <input type="text" name="link" /> <br />
    Author: <input type="text" name="author" /> <br />
    Category: <input type="text" name="cat" /> <br />
    Published: <input type="text" name="pubDate" value="<?=time()?>" />
            (* epoch time) <br />
    <input type="submit" value="New Article" />
</form>

<h2>Edit</h2>
<form action="newfeed.php?edit" method="post">
    <input type="hidden" name="feed" value="<?= $fid; ?>" />
    Name: <input type="text" name="name" value="<?=$feed['title']?>" /> <br />
    Description: <input type="text" name="desc" value="<?=$feed['description']?>" /> <br />
    URL: <input type="text" name="url" value="<?=$feed['link']?>" /> <br />
    Category: <input type="text" name="cat" value="<?=$feed['category']?>" /> <br />
    Copyright: <input type="text" name="copyright" value="<?=$feed['copyright']?>" /> <br />
    Image URL: <input type="text" name="image_url" value="<?=$feed['image_url']?>" /> <br />
    Image Title: <input type="text" name="image_title" value="<?=$feed['image_title']?>" /> <br />
    Language: <input type="text" name="lang" value="<?=$feed['language']?>" /> <br />
    Webmaster's Email: <input type="text" name="webmaster" value="<?=$feed['webmaster']?>" /> <br />
    Editor's Email: <input type="text" name="editor" value="<?=$feed['editor']?>" /> <br />
    <input type="submit" value="Update feed" />
</form>

<div class="remove">
    <a href="rm_feed.php?id=<?=$fid?>">Delete Feed</a>
</div>

<? require('footer.php'); ?>
