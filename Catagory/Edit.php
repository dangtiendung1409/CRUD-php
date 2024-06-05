<?php
$id = $_GET["id"];
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
$sql = "select * from url_catagory where id = $id";// 0 | 1
$result = $conn->query($sql);
$url_catagory = null;
if($result->num_rows > 0){
    $url_catagory = $result->fetch_assoc();
}else{
    die("404 not found!");
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
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="Update.php?id=<?php echo $id;?>" method="post">
                    <div class="mb-3">
                        <label>Product Name</label>
                        <input type="text" value="<?php echo $url_catagory["name"] ?>" name="name" class="form-control" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</section>
</body>
</html>
