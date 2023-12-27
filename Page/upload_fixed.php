<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload (Fixed)</title>
    <style>
        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            text-align: center;
        }

        .success {
            color: green;
            text-align: center;
        }
    </style>
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
            echo "<p class='error'>Error uploading file. Please try again.</p>";
            $uploadOk = 0;
        }

        if ($_FILES["uploaded_file"]["size"] > 500000) {
            echo "<p class='error'>Sorry, your file is too large.</p>";
            $uploadOk = 0;
        }

        $allowed_extensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowed_extensions)) {
            echo "<p class='error'>Sorry, only JPG, JPEG, PNG, and GIF files are allowed.</p>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<p class='error'>Sorry, your file was not uploaded.</p>";
        } else {
            if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {
                echo "<p class='success'>The file " . $random_filename . " has been uploaded.</p>";
            } else {
                echo "<p class='error'> Sorry, there was an error uploading your file. </p>";
            }
        }
    }
    ?>
</body>
</html>
