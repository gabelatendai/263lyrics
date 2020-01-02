<?php
/**
 * Created by PhpStorm.
 * User: Tapiwanashe
 * Date: 30/11/2017
 * Time: 15:20
 */

// Database connection constants
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "263lyrics");

function url($directory, $module, $path)
{
    //initialise result to blank
    $url = '';

    if (basename(__DIR__) != $directory) {
        $url .= $module . $path;
    } else {
        $url .= '../' . $module . '/' . $path;
    }
    return $url;
}

function highlight($directory, $path)
{
    $text = "";
    if ($path == $directory) {
        $text .= "active";
    }
    return $text;
}

function random_password($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

function getListingName($param)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('error connecting');
    $query = " SELECT * FROM listing WHERE id = $param";
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);
    return $row['name'];
}
?>