<?php
/* Library functions */

/* Connect to the database, return connection object */
function db_connect() {
    $db = new SQLiteDatabase('data/database.sqlite');
    return $db;
}
?>
