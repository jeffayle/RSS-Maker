<? require('header.php');
    $fid = $_GET['f'];
    $feed = get_feed($db, $fid);
?>
<h2><? echo $feed['title']; ?></h2>

<? require('footer.php'); ?>
