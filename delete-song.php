<?php
include 'includes/header.php';
include 'rb.php';
R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB

$id = $_GET['id'];

 $init = R::findOne('lyrics', 'id = ?', [$id]);

 R::trash( $init );

print ("<script>window.alert('successfully deleted ')</script>");
print ("<script>window.location.assign('account.php')</script>");
?>
