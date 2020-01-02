<?php
/**
 * developed by gabriel tendai musodza.
 * Date: 30/06/2017
 * Time: 13:37
 */
session_start();
session_destroy();
header("Location: index.php");
exit;
?>