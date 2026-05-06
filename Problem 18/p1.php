<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $port = 3307;
    $conn = new mysqli($host, $user, $pass, "", $port);
    $db_name = $_POST['db_name'] ?? '';
    $selected_table = $_POST['table_name'] ?? '';
    $tables = [];
    if ($db_name) {
        $conn->select_db($db_name);
        $res = $conn->query("SHOW TABLES");
        while ($row = $res->fetch_array()) $tables[] = $row[0];
    }
?>
<html>
<head>
    <title>DB Explorer</title>
    <style>
        a {
            font-family: sans-serif;
            padding: 20px;
            background: #f4f4f4;
        }
        .box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        input, select, button {
            padding: 10px;
            margin: 10px 0;
            display: block;
            width: 100%;
            box-sizing: border-box;
        }
        .manage-btn {
            background: #28a745;
            color: white;
            text-decoration: none;
            padding: 10px;
            display: inline-block;
            border-radius: 4px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>
<div class="box">
    <h2>Explore Database</h2>
    <form method="POST">
        <input type="text" name="db_name" placeholder="Enter Database Name" value="<?= htmlspecialchars($db_name) ?>" required>
        <button type="submit">Load Tables</button>
    </form>
    <?php if ($tables): ?>
        <form method="POST">
            <input type="hidden" name="db_name" value="<?= htmlspecialchars($db_name) ?>">
            <select name="table_name" onchange="this.form.submit()">
                <option value="">-- Select Table --</option>
                <?php foreach ($tables as $t): ?>
                    <option value="<?= $t ?>" <?= $selected_table == $t ? 'selected' : '' ?>><?= $t ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    <?php endif; ?>
    <?php if ($selected_table): ?>
        <hr>
        <a href="p1a.php?db=<?= $db_name ?>&table=<?= $selected_table ?>" class="manage-btn">⚙️ Manage/Edit This Table</a>
        <table>
            <?php
            $conn->select_db($db_name);
            $data = $conn->query("SELECT * FROM $selected_table LIMIT 10");
            $first = true;
            while ($row = $data->fetch_assoc()):
                if ($first): ?>
                    <tr><?php foreach ($row as $col => $v) echo "<th>$col</th>"; ?></tr>
                <?php $first = false; endif; ?>
                <tr><?php foreach ($row as $v) echo "<td>$v</td>"; ?></tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</div>
</body>
</html>