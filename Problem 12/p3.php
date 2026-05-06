<html>
    <head>
        <title>Largest of three numbers</title>
    </head>
    <style>
        body{
            background-color: #5f1414ff;
            margin: 40px;
            color: white;
            font-size: 20px;
        }
    </style>
    <body>
        <form method="post">
            <label>Enter number 1:</label>
            <input type="number" name="num1" style="font-size: 20px; padding: 10px; margin: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <br><br>
            <label>Enter number 2:</label>
            <input type="number" name="num2" style="font-size: 20px; padding: 10px; margin: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <br><br>
            <label>Enter number 3:</label>
            <input type="number" name="num3" style="font-size: 20px; padding: 10px; margin: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <br><br>
            <button type="submit" style="font-size: 20px; padding: 10px; margin: 10px; border-radius: 5px; color: white; background-color: #078f3eff;">Find Largest</button>
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $a=$_POST['num1'];
                $b=$_POST['num2'];
                $c=$_POST['num3'];
                if($a>$b && $a>$c)
                    echo "Largest number is: $a out of $a, $b and $c";
                else if($b>$a && $b>$c)
                    echo "Largest number is: $b out of $a, $b and $c";
                else
                    echo "Largest number is: $c out of $a, $b and $c";
            }
        ?>
    </body>
</html>