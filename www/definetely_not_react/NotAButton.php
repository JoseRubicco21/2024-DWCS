<?php
    require_once("./NotUseState.php");
    [$count, $setCount] = notUseState("count", 0);
    echo $count;
?>

<input type="button" value="countup">

<?php
    if($_GET) {
        if(isset($_GET['countup'])) {
            $setCount(5);
            echo $count;
        }
    }
?>