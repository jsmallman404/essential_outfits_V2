<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $uploadDir = "../images/"; // Ensure this path is correct
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $uploadDir . $fileName;

    // Ensure the images folder exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Check if the file was uploaded without errors
    if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            echo "Image uploaded successfully: <a href='$targetFilePath'>$fileName</a>";
        } else {
            echo "❌ Error moving the uploaded file!";
        }
    } else {
        echo "❌ File upload error: " . $_FILES["image"]["error"];
    }
}

?>
