<?php
    $studentStats = [];
    if (file_exists("a.txt")) {
        $lines = file("a.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $parts = explode(" | ", $line);
            if (count($parts) == 4) {
                $name = trim($parts[2]);
                $status = trim($parts[3]);
                if (!isset($studentStats[$name])) {
                    $studentStats[$name] = ['p' => 0, 'a' => 0];
                }
                if (strtolower($status) == 'present') {
                    $studentStats[$name]['p']++;
                } else {
                    $studentStats[$name]['a']++;
                }
            }
        }
    }
?>
<html>
<head>
    <title>Attendance Report</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        .total-box {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 15px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="p1.php" class="back-link">⬅ Back to Menu</a>
    <h2>Attendance Report</h2>
    <div class="total-box">
        Total Unique Students: <?= count($studentStats) ?>
    </div>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Present Count</th>
            <th>Absent Count</th>
        </tr>
        <?php foreach ($studentStats as $name => $data): ?>
        <tr>
            <td><?= htmlspecialchars($name) ?></td>
            <td><?= $data['p'] ?></td>
            <td><?= $data['a'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>