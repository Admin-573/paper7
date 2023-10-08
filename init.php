<?php

$host = '127.0.0.1';
$user = 'root';
$pass = '1234';
$db = 'beauty';

$product='product';
$pid='pid';
$pname='pname';
$pcategory='pcategory';
$pdes='pdes';
$pcompany='pcompany';
$pprice='pprice';
$search_category='search_category';

$con = mysqli_connect($host,$user,$pass,$db);
if(!$con){
    mysqli_connect_error();
} else {
    //echo 'Connected';
}

?>