<? require('header.php');
    $id = $_GET['a'];
    $article = get_article($db, $id);
?>
<h2><?= $article['title'] ?></h2>
<form action="newarticle.php?edit">
    <input type="hidden" name="article" value="<?=$id?>" />
    Title: <input type="text" name="title" value="<?=$article['title']?>" /> <br />
    <textarea name="desc"><?=$article['description']?></textarea> <br />
    Link: <input type="text" name="link" value="<?=$article['link']?>" /> <br />
    Author: <input type="text" name="author" value="<?=$article['author']?>" /> <br />
    Category: <input type="text" name="cat" value="<?=$article['category']?>" /> <br />
    Published: <input type="text" name="pubDate" value="<?=$article['pubDate']?>" />
            (* epoch time) <br />
    <input type="submit" value="Update Article" />
</form>

<? require('footer.php'); ?>
