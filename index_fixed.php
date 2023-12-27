<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Upload (Fixed)</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
    </style>
</head>
<body>
    
    <ul>
        <li><a href="?page=about">About</a></li>
        <li><a href="?page=upload_fixed">Upload File (Fixed)</a></li>
    </ul>
    <h1>Welcome to the fixed index page!</h1>
    <?php
    // Kiểm tra xem tham số "page" có tồn tại không
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        // Danh sách các trang hợp lệ
        $allowed_pages = array('about', 'upload_fixed');

        // Kiểm tra tên file có chứa ký tự an toàn không
        if (preg_match('/^[a-zA-Z0-9_]+$/', $page) && in_array($page, $allowed_pages)) {
            // Sử dụng đường dẫn tuyệt đối cho include
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
