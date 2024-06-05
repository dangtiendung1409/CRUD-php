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
                <form action="post.php" method="post">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required/>
                    </div>
                    <!-- Thêm trường ẩn để gửi slug -->
                    <input type="hidden" name="slug" id="slug" value="" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</section>
<script>
    // Hàm chuyển đổi kí tự có dấu thành không dấu
    // Hàm tạo slug từ tên
    function slugify(text) {
        const slug = text
            .trim() // Loại bỏ các khoảng trắng ở đầu và cuối
            .toLowerCase() // Chuyển đổi thành chữ thường
            .normalize("NFD") // Loại bỏ dấu
            .replace(/[\u0300-\u036f]/g, "") // Loại bỏ các ký tự dấu
            .replace(/\s+/g, "-"); // Thay thế khoảng trắng bằng gạch ngang
        return slug;
    }

    // Lắng nghe sự kiện nhập liệu trong trường "name"
    document.querySelector('input[name="name"]').addEventListener('input', function() {
        var slug = slugify(this.value);
        document.querySelector('#slug').value = slug; // Đặt giá trị slug vào trường ẩn
    });

</script>
</body>
</html>
