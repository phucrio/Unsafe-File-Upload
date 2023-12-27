<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Upload</title>
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
        <li><a href="?page=upload">Upload File</a></li>
    </ul>

    <div class="container">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            include('./Page/' . $page . '.php');
        } else {
            echo "<h1>Welcome to the index page!</h1>";
        }
        ?>
    </div>
</body>
</html>
