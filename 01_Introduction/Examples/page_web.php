<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <style>
        li{
            list-style: none;
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <?php 
        $count = 20 ;
        echo '<ul>';
        while($count > 0) {
            echo  "<li> $count - Je dois connaitre PHP.</li>" ;
            $count = $count - 1 ;
        }
        echo '</ul>';
    ?>
</body>
</html>