<?php declare(strict_types=1);
require_once("../lib/ValidatorsSanitization.php");


function generateDynamicSelectOfAssociative(array $options, string $name, string $id = null) : void{
    $id = $id ?? $name;
    echo "<select name='$name' id='$id'>";
    foreach($options as $selectOption => $value){
        generateDynamicOption($selectOption, $value);
    }
    echo "</select>";
};

function generateDynamicSelectOfArray(array $options, string $name, string $id = null) : void {
    $id = $id ?? $name;
    echo "<select name='$name' id='$id'>";
    foreach($options as $option){
        generateDynamicOption($option);
    }
    echo "</select>";
}


function generateDynamicOption(string $option, array $value = null) : void {
    $normalizedOption = normalizeString($option);
    echo "<option value='$normalizedOption'>$option</option>";
}

function generateErrorBlock(array $errors) {
    echo "<div class='error-block'>";
    echo "<ul class='fa-ul'>";
    foreach($errors as $error => $errorValue){
        if(!empty($errorValue)){
            echo "<li><span class='fa-li'><i class='fa-xmark fa-solid'></i></span>$errorValue</li>";
        }
    }
    echo "</ul>";
    echo "</div>";
}


function generateReceiptItem(mixed $keyName, string $value) : void {
    echo  "<li><b>$keyName:</b> $value</li>";
}

function generateReceiptList(array $listItems){
    echo "<div><ul>";
    foreach($listItems as $item => $itemValue){
        generateReceiptItem($item, $itemValue);
    }
    echo "</ul></div>";
}

?>