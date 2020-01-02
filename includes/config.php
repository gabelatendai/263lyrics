<?php
/**
 * Created by PhpStorm.
 * User: gabela
 * Date: 23/3/2019
 * Time: 03:51
 */
include '../rb.php';
//R::setup('mysql:host=localhost;dbname=263lyrics', 'root', ''); //for both mysql or mariaDB
$db = mysqli_connect("localhost", "root", "", "263lyrics");
?>