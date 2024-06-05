<?php
$id = $_GET["id"];

$host = "localhost";
$dbname = "myphp_test";
$dbuser = "root";
$dbpass = "root"; // Xampp: ""   Mamp: "root"



$conn = new mysqli($host,$dbuser,$dbpass,$dbname); // host user pass dbname
if($conn->connect_error){
    die("Connection refused!");
}
// connection succeed
$sql = "delete from url_catagory where id=$id";// 0 | 1
$result = $conn->query($sql);
header("Location: Catagory.php");
