<?php
session_start();
if (isset($_SESSION['session_counter'])) {
    $_SESSION['session_counter']++;
} else {
    $_SESSION['session_counter'] = 1;
}
$cookie_val = isset($_COOKIE['cookie_counter']) ? $_COOKIE['cookie_counter'] + 1 : 1;
setcookie('cookie_counter', $cookie_val, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Counter: Cookies vs Sessions</title>
    <style>
        body{
            font-family: sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        .box{
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
        }
        .session{
            background-color: #e3f2fd;
        }
        .cookie{
            background-color: #f1f8e9;
        }
        b{ font-size: 1.2em;
            color: #333;
        }
    </style>
</head>
<body>
    <h2>Combined Tracking Dashboard</h2>
    <div class="box session">
        <h3>Session-Based Counter</h3>
        <p>This counter lives on the <b>Server</b>. If you close your browser tab or restart your browser, this will likely reset.</p>
        <p>Current Count: <b><?php echo $_SESSION['session_counter']; ?></b></p>
    </div>
    <div class="box cookie">
        <h3>Cookie-Based Counter</h3>
        <p>This counter lives in your <b>Browser</b>. Even if you close the browser and come back tomorrow, it will remember you.</p>
        <p>Current Count: <b><?php echo $cookie_val; ?></b></p>
    </div>
    <p><i>Refresh the page to see both numbers increase!</i></p>
    <hr>
    <h4>Debug Info (The raw $_COOKIE array):</h4>
    <pre><?php print_r($_COOKIE); ?></pre>
</body>
</html>