<?php
    require('lib.php');
    $db = db_connect();

    $id = $_GET['id'];
    rm_feed($db, $id);

    header("Location: index.php");
?>
