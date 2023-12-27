<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Upload</title>
</head>
<body>
    <h1>Welcome to the index page!</h1>
    <ul>
        <li><a href="?page=about">About</a></li>
        <li><a href="?page=upload">Upload File</a></li>
    </ul>

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        include('./Page/' . $page . '.php');
    } else {
        echo "Welcome to the index page!";
    }
    ?>
</body>
</html>