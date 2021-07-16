<?php

$db_host = "localhost";
//$db_name = "id17257212_db_zakat";
//$db_user = "id17257212_nura";
//$db_pass = "zakaT#website123";

//username website : Zakat-Website
//password website : zakat-website

$conn = mysqli_connect($db_host,'nura','','db_zakat');


if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}
