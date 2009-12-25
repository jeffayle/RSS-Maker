<? require('header.php');
    $fid = $_GET['f'];
    $feed = get_feed($db, $fid);
?>
<h2><? echo $feed['title']; ?></h2>
<!-- TODO: Feed items -->

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

<? require('footer.php'); ?>
