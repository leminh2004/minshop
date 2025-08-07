<?php
// Kiểm tra nếu có POST thì in ra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<h2>Dữ liệu nhận được:</h2>';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    die();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Test Gửi Form</title>
</head>
<body>
    <h1>Form test gửi dữ liệu</h1>
    <form method="POST" action="" enctype="application/x-www-form-urlencoded">
        <label>Tên sản phẩm:</label><br>
        <input type="text" name="name"><br><br>

        <label>Giá:</label><br>
        <input type="text" name="price"><br><br>

        <label>Số lượng:</label><br>
        <input type="text" name="quantity"><br><br>

        <label>Mô tả:</label><br>
        <textarea name="description"></textarea><br><br>

        <button type="submit">Gửi dữ liệu</button>
    </form>
</body>
</html>