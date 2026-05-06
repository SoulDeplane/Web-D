<html>
    <head>
        <title>Even/Odd</title>
    </head>
    <style>
        body{
            background-color: #af4040ff;
            color: white;
            text-align: center;
            font-size: 30px;
            margin: 50px;
            padding: 50px;
        }
    </style>
    <body>
        <br><br><br>
        <form method="post">
            <label>Enter a number:</label>
            <input type="number" name="number" style="font-size: 30px; padding: 10px; margin: 20px; border-radius: 5px; border: 1px solid #ccc;">
            <button type="submit" style="font-size: 30px; padding: 10px; margin: 20px; border-radius: 5px; color: white; background-color: #078f3eff;">Check</button>
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $n=$_POST['number'];
                if($n%2==0)
                    echo "$n is Even";
                else
                    echo "$n is Odd";
            } 
        ?>
    </body>
</html>