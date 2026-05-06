<?php
    $success = false;
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $roll = $_POST['roll'];
        $name = $_POST['name'];
        $status = $_POST['status'];
        $line = "$date | $roll | $name | $status\n";
        file_put_contents("a.txt", $line, FILE_APPEND);
        $success = true;
    }
?>
<html>
<head>
    <title>Add Attendance</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background: #f4f4f4;
        }
        .box {
            background: white;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: block;
            box-sizing: border-box;
        }
        button {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        .msg {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            text-align: center;
        }
        .menu-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="box">
    <h2>Record Attendance</h2>
    <?php if ($success): ?>
        <div class="msg">Record Added Successfully!</div>
    <?php endif; ?>
    <form method="POST">
        <input type="date" name="date" value="<?= date('Y-m-d') ?>" required>
        <input type="text" name="roll" placeholder="Roll No" required>
        <input type="text" name="name" placeholder="Student Name" required>
        <select name="status">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>
        <button type="submit" name="submit">Save and Add Another</button>
    </form>
    <a href="p1.php" class="menu-link">Back to Main Menu</a>
</div>
</body>
</html>