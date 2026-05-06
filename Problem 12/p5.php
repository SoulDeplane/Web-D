<html>
    <head>
        <title>Calculator</title>
    </head>
    <style>
        body {
            background-color: #a76021ff;
            margin: 40px;
            color: white;
            font-size: 20px;
            font-family: sans-serif;
        }
        button {
            width: 100px;
            height: 50px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            display: inline-block;
            border-radius: 5px;
        }
        </style>
    <body>
        <form method="post">
            <label>Enter number 1:</label><br>
            <input type="number" name="num1" required style="font-size: 20px; padding: 10px; margin: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <br>
            <label>Enter number 2:</label><br>
            <input type="number" name="num2" required style="font-size: 20px; padding: 10px; margin: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <br><br>           
            <button type="submit" name="swap" value="swap" style="font-size: 20px; border-radius: 5px; color: white; background-color: #078f3eff;">Swap</button>
        </form>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $a=$_POST["num1"];
                    $b=$_POST["num2"];
                    $c=$_POST["swap"];
                    if($c=="swap"){
                        echo "Before swapping: a=$a, b=$b\n";
                        $temp=$a;
                        $a=$b;
                        $b=$temp;
                        echo "<br>After swapping: a=$a, b=$b";
                    }
                }
            ?> 
    </body>
</html>