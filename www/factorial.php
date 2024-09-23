<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factorial</title>
</head>
<body>
    <h1>Programa para calcular el factorial</h1>
    <form action="factorial.php" method="post">
        <label for="number">Numero a calcular</label>
        <input type="number" name="number" id="number">
        <input type="submit">
    </form>
    
    <?php
        

        for(;$num>0;$num--){
            $total*=$num;
        }

        echo '<p>' . $total . '</p>';

      ?>
</body>
</html>