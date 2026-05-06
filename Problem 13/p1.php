<html>
    <head>
        <title>Calculator</title>
        <style>
            body {
                background-color: #421a3dff;
                margin: 40px;
                color: white;
                font-size: 20px;
                font-family: sans-serif;
            }
            button {
                width: 50px;
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
    </head>
    <body>
        <form method="post">
            <label>Enter number 1:</label><br>
            <input type="number" name="num1" required style="font-size: 20px; padding: 10px; margin: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <br>
            <label>Enter number 2:</label><br>
            <input type="number" name="num2" required style="font-size: 20px; padding: 10px; margin: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <br><br>           
            <button type="submit" name="operator" value="+" style="font-size: 20px; border-radius: 5px; color: white; background-color: #078f3eff;">+</button>
            <button type="submit" name="operator" value="-" style="font-size: 20px; border-radius: 5px; color: white; background-color: #078f3eff;">-</button>
            <button type="submit" name="operator" value="*" style="font-size: 20px; border-radius: 5px; color: white; background-color: #078f3eff;">*</button>
            <button type="submit" name="operator" value="/" style="font-size: 20px; border-radius: 5px; color: white; background-color: #078f3eff;">/</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $a = (float)$_POST["num1"];
                $b = (float)$_POST["num2"];
                $operator = $_POST["operator"];
                $result = "";
                switch ($operator) {
                    case "+":
                        $result = $a + $b;
                        break;
                    case "-":
                        $result = $a - $b;
                        break;
                    case "*":
                        $result = $a * $b;
                        break;
                    case "/":
                        if ($b != 0) {
                            $result = $a / $b;
                        } else {
                            $result = "Error (Div by 0)";
                        }
                        break;
                }
                echo "<div class='result'><strong>$a $operator $b:</strong> $result</div>";
            }
        ?>
    </body>
</html>