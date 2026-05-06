<?php
$message = "";
$messageClass = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['myfile'])) {
    $file = $_FILES['myfile'];
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    $maxSize = 2 * 1024 * 1024;
    $uploadDir = 'uploads/';
    if ($file['error'] !== 0) {
        $message = "Error: File upload failed.";
        $messageClass = "error";
    } elseif (!in_array($file['type'], $allowedTypes)) {
        $message = "Error: Invalid file type. Only JPG, PNG, and PDF allowed.";
        $messageClass = "error";
    } elseif ($file['size'] > $maxSize) {
        $message = "Error: File exceeds 2MB limit.";
        $messageClass = "error";
    } else {
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $destination = $uploadDir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $message = "Success! File uploaded successfully.";
            $messageClass = "success";
        } else {
            $message = "Error: Could not save file.";
            $messageClass = "error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern PHP File Upload</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #07291eff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 1.5rem;
        }
        .message {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        input[type="file"] {
            display: block;
            width: 100%;
            margin-bottom: 1.5rem;
            padding: 10px;
            border: 1px dashed #bbb;
            border-radius: 6px;
            cursor: pointer;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .debug-box {
            margin-top: 2rem;
            text-align: left;
            background: #272822;
            color: #f8f8f2;
            padding: 1rem;
            border-radius: 6px;
            font-size: 0.8rem;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>File Upload</h2>  
        <?php if ($message): ?>
            <div class="message <?php echo $messageClass; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="myfile" required>
            <input type="submit" value="Upload Now">
        </form>
        <?php if(isset($_FILES['myfile'])): ?>
            <div class="debug-box">
                <strong>$_FILES Data:</strong>
                <pre><?php print_r($_FILES['myfile']); ?></pre>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>