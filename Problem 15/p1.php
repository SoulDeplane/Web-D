<?php
    session_start();
    $error = "";
    if (isset($_GET['action']) && $_GET['action'] == 'logout'){
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username === 'admin' && $password === 'password'){
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $username;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        else
            $error = "Invalid username or password!";
    }
?>
<html>
    <head>
        <title>PHP Session Login</title>
        <style>
            body{
                font-family: Arial, sans-serif;
                background-color: #2c3e50;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 90vh;
            }
            .card{
                background-color: #ecf0f1;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
                width: 300px;
                text-align: center;
            }
            input[type="text"]{
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #bdc3c7;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type="password"]{
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #bdc3c7;
                border-radius: 4px;
                box-sizing: border-box;
            }
            button{
                width: 100%;
                padding: 10px;
                background: #2980b9;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            button:hover{
                background: #3498db;
            }
            .logout-btn{
                background: #c0392b;
                margin-top: 15px;
                text-decoration: none;
                display: inline-block;
                padding: 10px 20px;
                color: white;
                border-radius: 4px;
            }
            .logout-btn:hover{
                background: #e74c3c;
            }
            .error{
                color: #c0392b;
                background: #fadbd8;
                padding: 10px;
                border-radius: 4px;
                margin-bottom: 10px;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
                <p>You have successfully accessed the secure session area.</p>
                <a href="?action=logout" class="logout-btn">Logout</a>
            <?php else: ?>
                <h2>User Login</h2>
                <?php if ($error): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>            
                <form method="POST" action="">
                    <input type="text" name="username" placeholder="Username (admin)" required>
                    <input type="password" name="password" placeholder="Password (password)" required>
                    <button type="submit" name="login">Login</button>
                </form>
                
            <?php endif; ?>
        </div>
    </body>
</html>