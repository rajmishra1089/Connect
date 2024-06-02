<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
        echo "hello php this is the hell";
        ?>
         <?php
        function go($printthis){
            $a=$printthis;
            echo"<br>This is a function call and value passed is :$printthis";
        }
        echo "hello php";
        $variable=1;
        $variable1=2;
        $variable2= $variable1*$variable*3;
        echo "<br>the value of variable is:  $variable2";
        if($variable1!=0){
            echo "<br>This is inside of if block";
        }
        $languages=array("Python","Java","Java Script","C++","C");
        for($i=0;$i<5;$i++){
            echo"<br> $languages[$i]";
        }
        foreach($languages as $value){
            echo "<br>the values are: $value";
        }
        $i=count($languages);
        go($i);
        ?>
    </div>
</body>
</html>