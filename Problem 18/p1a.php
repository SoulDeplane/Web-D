<?php
    $host = "localhost"; $user = "root"; $pass = ""; $port = 3307;
    $db = $_GET['db'];
    $table = $_GET['table'];
    $conn = new mysqli($host, $user, $pass, $db, $port);
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $conn->query("DELETE FROM $table WHERE id=$id");
        header("Location: edit.php?db=$db&table=$table");
    }
    if (isset($_POST['add'])) {
        $cols = []; $vals = [];
        foreach ($_POST['data'] as $col => $val) {
            $cols[] = $col; $vals[] = "'$val'";
        }
        $conn->query("INSERT INTO $table (".implode(',',$cols).") VALUES (".implode(',',$vals).")");
    }
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $updates = [];
        foreach ($_POST['data'] as $col => $val) $updates[] = "$col='$val'";
        $conn->query("UPDATE $table SET ".implode(',',$updates)." WHERE id=$id");
        header("Location: edit.php?db=$db&table=$table");
    }
    $edit_row = null;
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $edit_row = $conn->query("SELECT * FROM $table WHERE id=$id")->fetch_assoc();
    }
    $columns = [];
    $res = $conn->query("SHOW COLUMNS FROM $table");
    while($row = $res->fetch_assoc()) { if($row['Field'] != 'id') $columns[] = $row['Field']; }
?>
<html>
<head>
    <title>Manage <?= $table ?></title>
    <style>
        body {
            font-family: sans-serif; 
            padding: 20px;
        }
        .form-box {
            background: #eee; 
            padding: 15px; 
            margin-bottom: 20px; 
            border-radius: 5px; 
        }
        table {
            width: 100%; 
            border-collapse: collapse;
        }
            th, td {
            border: 1px solid #ccc; 
            padding: 8px; 
            text-align: left;
        }
        .btn {
            padding: 5px 10px; 
            text-decoration: none; 
            color: white; 
            border-radius: 3px; 
            border: none;
        }
    </style>
</head>
<body>
    <a href="p1.php">⬅ Back to Explorer</a>
    <h2>Managing Table: <?= htmlspecialchars($table) ?></h2>
    <div class="form-box">
        <form method="POST">
            <input type="hidden" name="id" value="<?= $edit_row['id'] ?? '' ?>">
            <?php foreach ($columns as $col): ?>
                <input type="text" name="data[<?= $col ?>]" placeholder="<?= $col ?>" value="<?= $edit_row[$col] ?? '' ?>" required>
            <?php endforeach; ?>
            
            <?php if ($edit_row): ?>
                <button type="submit" name="update" style="background: orange">Update Record</button>
            <?php else: ?>
                <button type="submit" name="add" style="background: green; color:white">Add Record</button>
            <?php endif; ?>
        </form>
    </div>
    <table>
        <tr>
            <th>id</th>
            <?php foreach ($columns as $col) echo "<th>$col</th>"; ?>
            <th>Actions</th>
        </tr>
        <?php
        $res = $conn->query("SELECT * FROM $table");
        while ($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <?php foreach ($columns as $col) echo "<td>".$row[$col]."</td>"; ?>
                <td>
                    <a href="?db=<?= $db ?>&table=<?= $table ?>&edit=<?= $row['id'] ?>" class="btn" style="background:orange">Edit</a>
                    <a href="?db=<?= $db ?>&table=<?= $table ?>&delete=<?= $row['id'] ?>" class="btn" style="background:red" onclick="return confirm('Delete?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>