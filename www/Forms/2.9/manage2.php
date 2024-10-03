<?php declare(strict_types=1);

$name = $subjectsToEnroll = $typeOfClass = "";

$nameErrorFlag = false;
$nameErrorMessage = "The name cannot have special characters.";

$subjectsToEnrollArray = ["Java Programming", "Web Design", "Dockers administration", "Django Framework", "Mongo Database"];
$subjectsToEnrollFlag = false;
$subjectsToEnrollErrorMessage='The subject to enroll is not a valid one.';


$typeOfClassOptions = ["In-person Classes", "Online Classes"];
$typeOfClassErrorMessage = 'Error. Not a valid type of class.';
$typeOfClassErrorFlag = false;

if($_SERVER["REQUEST_METHOD"] == "GET") {

    if(!empty($_GET["subject"])) {
        
        if($_GET["subject"] < -1 || $_GET["subject"] > 4) {
            
            if($_GET["subject"] == -1 ) {
                $subjectsToEnrollErrorMessage = 'Select a subject is not a valid option';
                $subjectsToEnrollFlag = true;
            }

            $subjectsToEnrollErrorMessage = "The subject to enroll is out of range.";
            $subjectsToEnrollFlag = true;
        }

        $subjectsToEnroll = sanitize($_GET["subject"]);
    } else {
        
        $subjectsToEnrollFlag = true;
    }

    if(!empty($_GET["name"])) {
        $name = sanitize($_GET["name"]);
    } else {
        $nameErrorFlag = true;
    }

    if(!empty($_GET["classes"])) {
        $typeOfClass = sanitize($_GET["classes"]);
    } else {
        $typeOfClassErrorFlag = true;
    }

}

// Utility functions
function sanitize(mixed $data) : mixed {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function normalizeStr(string $str) : string {
    return str_replace(" ", "",  strtolower($str)); 
}



// Dynamic elements
function createSelect(array $selectOptions, string $selectName) : void {
    echo "<select name=$selectName id='$selectName'>";
    echo "<option value='-1'>Select an option</option>";
    $i = 0; // It's asking fo forEach so we kinda need to do some hacky way
    foreach($selectOptions as $option) {
        createOption($option, "$i");
        $i++;
    }
    echo "</select>";
};


// im passing an option such as JAva programming w 1. 

function createOption(string $option, string $value){
    //$normalizedOption = normalizeStr($option);
    // This is something really really really hacky. This is just BAD. I bring shame upon my name.
    // I wish mercy on the reader.
    /*
        Why is this bad? 
        - Using a global, bad scoping
        - Using a forEach as a classic for-loop, very cursed
        - Using array_search over in a forEach, so yeah let's traverse the array fully every iteration. There shouldn't be a perfomance issue right?
        - Accesing $_GET[""] directly instead of set variable. Could do it with $subjectsToEnroll but it needs to be global too.
        - Type inference to avoid explicit conversion on $value and $searchedValue comparisson as a side effect.
        
    It works but this is not good, waaay too much indirection, way too much juggling. 
    */
    global $subjectsToEnrollArray;
    $searchedValue = array_search($_GET["subject"], $subjectsToEnrollArray); // returns a key to the needed
    $isSelected = $value == $searchedValue ? "selected" : ""; 
    echo "<option value='$option' $isSelected> $option </option>";
};

function createRadios(array $radioOptions, string $radioName, string $value){
    echo "<ul>";
    for($i = 0; $i < count($radioOptions); $i++){
        $normalizedOption = normalizeStr($radioOptions[$i]);
        $isSelected = $normalizedOption === $value ? "checked" : "";
        echo "<li>";
        echo "<input type='radio' name='$radioName' id='form-radio-$i' value='$radioOptions[$i]' $isSelected>";
        echo "<label for='form-radio-$i'>$radioOptions[$i]</label>";
        echo "</li>";
    }
    echo "</ul>";
};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>First practice using forms</h1>
        <form action="./manage.php" method="POST">
            <div>
                <label for="form-name">Names and Surnames</label>
                <input type="text" name="name" id="form-name" value="<?php echo $_GET["name"]?>" required>
            </div>
                
            <div>
                <label for="subject">Select a subject to Enroll</label>
                <?php createSelect($subjectsToEnrollArray, "subject")?>
            </div>
            
            <div>
                <label for="radios">Classes</label>
                <?php createRadios($typeOfClassOptions, "classes", $typeOfClass)?>
            </div>
            <div>
                <input type="submit" value="Send data">

            </div>
        </form>
    
    </main>
</body>
</html>