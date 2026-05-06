<?php
    $message = "";
    if (isset($_POST['submit_btn'])){
        if (isset($_POST['user_input']) && $_POST['user_input'] !== ""){
            $message = "Success! The variable is set and its value is: <strong>" . htmlspecialchars($_POST['user_input']) . "</strong>";
        } 
        else
            $message = "The form was submitted, but the input field is empty.";
    }
?>
<html>
    <head>
        <title>isset() Function</title>
        <style>
            body{
                font-family: Arial, sans-serif;
                background-color: #f0f2f5;
                padding: 20px;
            }
            .container{
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 400px;
                margin: auto;
            }
            h2{
                color: #333;
            }
            input[type="text"]{
                width: 90%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            button{
                width: 95%;
                padding: 10px;
                background: #28a745;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            button:hover{
                background: #218838;
            }
            .alert{
                background: #d4edda;
                color: #155724;
                padding: 10px;
                border-radius: 4px;
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Problem 2: isset() Demo</h2>
            <form method="POST" action="">
                <label for="user_input">Enter something:</label>
                <input type="text" name="user_input" id="user_input" placeholder="Type here...">
                <button type="submit" name="submit_btn">Check with isset()</button>
            </form>
            <?php if ($message !== ""): ?>
                <div class="alert"><?php echo $message; ?></div>
            <?php endif; ?>
        </div>
    </body>
</html>