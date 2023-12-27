<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Upload (Fixed)</title>
</head>
<body>
    <h1>Welcome to the fixed index page!</h1>
    <ul>
        <li><a href="?page=about">About</a></li>
        <li><a href="?page=upload_fixed">Upload File (Fixed)</a></li>
    </ul>

    <?php
    // Kiểm tra xem tham số "page" có tồn tại không
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        // Danh sách các trang hợp lệ
        $allowed_pages = array('about', 'upload_fixed'); // Thêm 'upload_fixed' vào danh sách

        // Kiểm tra xem giá trị của "page" có nằm trong danh sách hợp lệ không
        if (in_array($page, $allowed_pages)) {
            // Sử dụng hàm include_once để bảo vệ việc include trang nhiều lần
            include_once(__DIR__ . '/Page/' . $page . '.php');
        } else {
            echo "Invalid page request!";
        }
    } else {
        echo "Welcome to the fixed index page!";
    }
    ?>
</body>
</html>
