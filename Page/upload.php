<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>File Upload</h1>
    <form action="?page=upload" method="post" enctype="multipart/form-data">
        <label for="uploaded_file">Choose a file:</label>
        <input type="file" name="uploaded_file" id="uploaded_file">
        <br>
        <input type="submit" value="Upload File" name="submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploaded_file'])) {
        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($_FILES["uploaded_file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["uploaded_file"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file);
            echo "The file " . basename($_FILES["uploaded_file"]["name"]) . " has been uploaded.";
        }
    }
    ?>
</body>
</html>