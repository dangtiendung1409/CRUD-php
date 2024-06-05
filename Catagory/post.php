<?php
$p_name = $_POST["name"];
$p_slug = $_POST["slug"]; // Lấy giá trị "slug" từ form

// ... Các bước kết nối và thêm dữ liệu vào cơ sở dữ liệu
$host = "localhost";
$dbname = "myphp_test";
$dbuser = "root";
$dbpass = "root"; // Xampp: ""   Mamp: "root"


$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection refused!");
}

// Tạo câu truy vấn để thêm dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO url_catagory (name, slug) VALUES ('$p_name', '$p_slug')";
if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: Catagory.php");
?>
