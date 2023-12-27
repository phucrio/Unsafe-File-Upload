<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload (Fixed)</title>
</head>
<body>
    <h1>File Upload (Fixed)</h1>
    <form action="?page=upload_fixed" method="post" enctype="multipart/form-data">
        <label for="uploaded_file">Choose a file:</label>
        <input type="file" name="uploaded_file" id="uploaded_file">
        <br>
        <input type="submit" value="Upload File" name="submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploaded_file'])) {
        $target_dir = "./uploads/";

        $random_filename = uniqid() . "." . pathinfo($_FILES["uploaded_file"]["name"], PATHINFO_EXTENSION);
        $target_file = $target_dir . $random_filename;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_FILES["uploaded_file"]["error"] != 0) {
            echo "Error uploading file. Please try again.";
            $uploadOk = 0;
        }

        if ($_FILES["uploaded_file"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowed_extensions)) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {
                echo "The file " . $random_filename . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>
</body>
</html>
