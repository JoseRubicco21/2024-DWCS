<html>

<head>
    <title>DWCS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <?php
        echo "<h1>¡Hola, Bienvenido/a al módulo de DWCS!</h1>";
        require './componentTest.php';
        require_once './NotReact.php';
        require_once './NotuseState.php';
        
        NotReact::render(componentTest((object)array("title" => "Test title", "text" => "Some text here")));
        NotReact::render(componentTest((object)array(
            "title" => 'This is react in php',
            "text" => 'It even has props lol'
        )));
    
        $setTest = function () {
            echo "Setter";
        };

        notUseState(["test", 0, $setTest]);

        echo implode(",",NotReact::getInstance()->getStorage());
        //NotReact::getInstance()->getStorage();
        ?>
    </div>
</body>

</html>