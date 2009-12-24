<? require('header.php'); ?>

<h2>Feeds</h2>
<!-- TODO -->

<h2>New Feed</h2>
<form action="newfeed.php" method="post">
    Name: <input type="text" name="name" /> <br />
    Description: <input type="text" name="desc" /> <br />
    URL: <input type="text" name="url" /> <br />
    Category: <input type="text" name="cat" /> <br />
    Copyright: <input type="text" name="copyright" /> <br />
    Image URL: <input type="text" name="image_url" /> <br />
    Image Title: <input type="text" name="image_title" /> <br />
    Language: <input type="text" name="lang" /> <br />
    Webmaster's Email: <input type="text" name="webmaster" /> <br />
    Editor's Email: <input type="text" name="editor" /> <br />
    <input type="submit" value="Create feed" />
</form>

<? require('footer.php'); ?>
