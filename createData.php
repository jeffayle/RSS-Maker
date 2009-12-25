<?php
    /* Create the SQL tables, delete this after it has been run */
    require('lib.php');
    $db = db_connect();

    /* Feeds table */
    $db->query('CREATE TABLE feeds (
        id INTEGER PRIMARY KEY,
        title STRING,
        description STRING,
        link STRING,
        category STRING,
        copyright STRING,
        image_url STRING,
        image_title STRING,
        language STRING,
        webmaster STRING,
        editor STRING
    )');
?>

Database created.
