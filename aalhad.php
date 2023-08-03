<!DOCTYPE html>
<html>
<head>
    <title>File Upload Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 10px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="email"], input[type="file"], input[type="submit"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}
.content{
    max-width: 40%;
    margin: auto;
    border: 2px solid black;
    padding: 20px;
}
    </style>

<body>
    <div class="content">
    <h2>File Upload Form</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="file">Upload File:</label>
            <input type="file" id="file" name="file" required>
        </div>
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Sign in</button>
        </div>
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
// Specify the folder to move the uploaded file to
$targetFolder = "aalhad/";

// Get the email from the form
$email = $_POST['email'];

// Generate a unique filename for the uploaded file
$filename = uniqid() . '_' . basename($_FILES["file"]["name"]);

// Set the target path for moving the uploaded file
$targetPath = $targetFolder . $filename;

// Move the uploaded file to the target folder
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
    echo "File uploaded successfully.";
    // Do further processing or database operations here using the $email and $targetPath variables
} else {
    echo "Error uploading file.";
}
}
?>
