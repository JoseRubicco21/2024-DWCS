<?php declare(strict_types=1);

$name = $subjectsToEnroll = "";

$nameErrorFlag = false;
$nameErrorMessage = "The name cannot have special characters.";

$subjectsToEnrollArray = ["Java Programming", "Web Design", "Dockers administration", "Django Framework", "Mongo Database"];
$subjectsToEnrollFlag = false;
$subjectsToEnrollErrorMessage='The subject to enroll is not a valid one.';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!empty($_POST["subject"])) {
        
        if($_POST["subject"] < -1 || $_POST["subject"] > 4) {
            
            if($_POST["subject"] == -1 ) {
                $subjectsToEnrollErrorMessage = 'Select a subject is not a valid option';
                $subjectsToEnrollFlag = true;
            }

            $subjectsToEnrollErrorMessage = "The subject to enroll is out of range.";
            $subjectsToEnrollFlag = true;
        }

        $subjectsToEnroll = sanitize($_POST["subject"]);
    } else {
        
        $subjectsToEnrollFlag = true;
    }

    if(!empty($_POST["subject"])) {
        
        if(validateSpecialChars($_POST["name"])) {
            $nameErrorFlag = true;
        }

        $name = sanitize($_POST["name"]);
    } else {
        $nameErrorFlag = true;
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


function validateSpecialChars(string $string) : bool {
    return preg_match('/[^\p{L}\s-]/u', $string);
}


// Dynamic elements
function createSelect(array $selectOptions, string $selectName) : void {
    echo "<select name=$selectName id='$selectName'>";
    echo "<option value='-1'>Select an option</option>";
    echo $i = 0; // It's asking fo forEach so we kinda need to do some hacky way
    foreach($selectOptions as $option) {
        createOption($option, "$i");
        $i++;
    }
    echo "</select>";
};

function createOption(string $option, string $value){
    $normalizedOption = normalizeStr($option);
    $isSelected = $normalizedOption === $value ? "selected" : "";
    echo "<option value='$option' $isSelected> $option </option>";
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
                <input type="text" name="name" id="form-name">
            </div>
                
            <div>
                <label for="subject">Select a subject to Enroll</label>
                <?php createSelect($subjectsToEnrollArray, "subject")?>
            </div>
            
            <div>
                <input type="submit" value="Send data">
            </div>
        </form>
    </main>
</body>
</html>