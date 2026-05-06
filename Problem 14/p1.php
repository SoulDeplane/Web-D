<?php
    $var="100";
    $log=[];
    $log[]="Original Value: '$var'";
    $log[]="Original Type: <strong>".gettype($var)."</strong>";
    settype($var, "integer");
    $log[]="After settype(\$var, 'integer'), Value: $var, Type: <strong>".gettype($var)."</strong>";
    settype($var, "boolean");
    $log[]="After settype(\$var, 'boolean'), Value: ".($var ? 'true' : 'false').", Type: <strong>".gettype($var)."</strong>";
?>
<html>
    <head>
        <title>gettype() and settype()</title>
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
                border-bottom: 2px solid #007bff;
                padding-bottom: 10px;
            }
            .result{
                background: #e9ecef;
                padding: 15px;
                border-radius: 5px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Problem 1: gettype() & settype()</h2>
            <?php foreach ($log as $message): ?>
                <div class="result"><?php echo $message; ?></div>
            <?php endforeach; ?>
        </div>
    </body>
</html>