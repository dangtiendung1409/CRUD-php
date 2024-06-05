<?php
$id = $_GET["id"];
// 1. Kết nối CSDL
$host = "localhost";
$dbname = "myphp_test";
$dbuser = "root";
$dbpass = "root"; // Xampp: ""   Mamp: "root"


$conn = new mysqli($host, $dbuser, $dbpass, $dbname); // host user pass dbname
if ($conn->connect_error) {
    die("Kết nối thất bại!");
}
// Kết nối thành công
$sql = "select * from url_catagory where id = $id"; // 0 | 1
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $new_name = $_POST["name"];

    // Hàm chuyển đổi văn bản thành slug
    function slugify($text)
    {
        // Xóa tất cả khoảng trắng thừa
        $text = trim($text);

        // Chuyển đổi tất cả các chữ cái sang chữ thường
        $text = mb_strtolower($text, 'UTF-8');

        // Thay thế tất cả các khoảng trắng bằng dấu gạch ngang
        $text = preg_replace('/\s+/', '-', $text);

        // Loại bỏ tất cả các ký tự không phải là chữ cái, số hoặc dấu gạch ngang
        $text = preg_replace('/[^a-z0-9-]/', '', $text);

        // Thay thế tất cả các khoảng trắng liền kề bằng một dấu gạch ngang duy nhất
        $text = preg_replace('/-+/', '-', $text);

        return $text;
    }

    $new_slug = slugify($new_name);

    $update_sql = "update url_catagory set name='$new_name', slug='$new_slug' where id=$id";
    $conn->query($update_sql);
    header("Location: Catagory.php");
} else {
    die("404 không tìm thấy!");
}
?>
