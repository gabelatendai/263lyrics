<?php

include 'rb.php';
R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$id = $_GET['id'];

 $init = R::findOne('comments', 'id = ?', [$id]);

 R::trash( $init );
header('location:comments');

?>
