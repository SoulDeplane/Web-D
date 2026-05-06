<?php
    $my_secret = "PHP is awesome!";
    $log = [];
    if (isset($my_secret))
        $log[] = "Before unset(): \$my_secret is SET. Value: <strong>$my_secret</strong>";
    unset($my_secret);
    if (isset($my_secret))
        $log[] = "After unset(): \$my_secret is still set.";
    else
        $log[] = "After unset(): \$my_secret has been DESTROYED. It is no longer set.";
?>
<html>
    <head>
        <title>unset() Function</title>
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
                max-width: 500px;
                margin: auto;
            }
            h2{
                color: #333;
                border-bottom: 2px solid #dc3545;
                padding-bottom: 10px;
            }
            .box{
                background: #f8d7da;
                color: #721c24;
                padding: 15px;
                border-radius: 5px;
                margin-bottom: 10px;
                border: 1px solid #f5c6cb;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Problem 3: unset() Demo</h2>
            <?php foreach ($log as $msg): ?>
                <div class="box"><?php echo $msg; ?></div>
            <?php endforeach; ?>
        </div>
    </body>
</html>