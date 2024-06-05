<?php
// get products from db
// 1. connect db
$host = "localhost";
$dbname = "myphp_test";
$dbuser = "root";
$dbpass = "root"; // Xampp: ""   Mamp: "root"



$conn = new mysqli($host,$dbuser,$dbpass,$dbname); // host user pass dbname
if($conn->connect_error){
    die("Connection refused!");
}
// connection succeed
// 2. query db
$sql = "select * from url_catagory";
$result = $conn->query($sql);
$url_catagory= [];
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $url_catagory[] = $row;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php include("head.php"); ?>
</head>
<body>
<?php include("nav.php"); ?>
<section>
    <div class="container">
        <a href="Create.php" class="btn btn-outline-primary" style="background:blue; color:white;">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>slug</th>
                <th>Action</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($url_catagory as $item):?>
                <tr>
                    <td><?php echo $item["id"] ?></td>
                    <td><?php echo $item["name"] ?></td>
                    <td><?php echo $item["slug"] ?></td>

                    <td><?php echo $item["Action"] ?>
                        <a href="edit.php?id=<?php echo $item["id"] ?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Chắc chắn muốn xoá sản phẩm: <?php echo $item["name"] ?>')" href="delete.php?id=<?php echo $item["id"] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>