<?php declare(strict_types=1);
// Initialization of normal variables
$username = $password = $city = $webServer = $role =  "";

$webServers = ["apache2", "nginx", "Tomcat"];
$roles = ["Admin", "Engineer", "Manager", "Guest"];
$signOns = ["Mail", "Payroll", "Self-service"];

// Initialization of Error variables : This is done separately since we're using guard clauses.
$usernameError = "Error. Username cannot be empty.";
$usernameErrorFlag = false;

$passwordError = "Error. password cannot be empty.";
$passwordErrorFlag = false;

$cityError = "Error. city cannot be empty.";
$cityErrorFlag = false;

$webServerError = "Error. web server cannot be empty.";
$webServerErrorFlag = false;

$roleError = "Error. role cannot be empty.";
$singleSignOnError = "Error. Single sign-on not valid.";


// State handlers for checkboxes;
$checkboxHandlers = [ "mail" => "", "payroll" => "", "self-service" => ""];

// Validation section
// Possbile better way is to use guardclause such as !empty.. ? The only problem with this is that we need to define the errors
// beforehand. This could be kinda good but restraining. Setting up error values beforehand is a bit restraining. 
// One could say that the masterState of a value is "empty|not-empty" thus defining a template str for each err value might be easier?

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Username
    if(!empty($_POST["username"])) {
        if(strlen(trim($_POST["username"])) == 0){
            $usernameErrorFlag=true;
        } else {
            $username = sanitize($_POST["username"]);
        }
    } 

    if(!empty($_POST["password"])) {
        if(strlen(trim($_POST["password"])) == 0) {
            $passwordErrorFlag = true;
        } else {
            $password = sanitize($_POST["password"]);
        }
    } 
    
    if(!empty($_POST["city"])) {
        if(strlen(trim($_POST["city"])) == 0) {
            $cityErrorFlag = true;
        } else {
            $city = sanitize($_POST["city"]);
        }
    } 

    if(!empty($_POST["webservers"]) ||  $_POST["webservers"] == "default") {
        $webServerErrorFlag = true;
    } else {
        $webServer = sanitize($_POST["webservers"]);
    }

    if(!empty($_POST["roles"])) {
        $role = sanitize($_POST["roles"]);
    }

    if(!empty($_POST["mail"])) {
        $checkboxHandlers["mail"] = sanitize($_POST["mail"]);
    } 

    if(!empty($_POST["payroll"])) {
        $checkboxHandlers["payroll"] = sanitize($_POST["payroll"]);
    } 

    if(!empty($_POST["self-service"])) {
        $checkboxHandlers["self-service"] = sanitize($_POST["self-service"]);
    } 
}

// Sanitization 

function sanitize(mixed $data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Utility Functions

function normalizeStr(string $str) : string {
    return str_replace(" ", "",  strtolower($str)); 
}

// Dynamic elements

// Dynamic selects
function createSelect(array $selectOptions, string $selectName, string $value){
    echo "<select name=$selectName id='webservers'>";
    echo "<option value='default'> -- Choose a web server --</option>";
    foreach($selectOptions as $option) {
        createOption($option, $value);
    }
    echo "</select>";
};

function createOption(string $option, string $value){
    $normalizedOption = normalizeStr($option);
    $isSelected = $normalizedOption === $value ? "selected" : "";
    echo "<option value='$normalizedOption' $isSelected> $option </option>";
};

// Dynamic radios
function createRadios(array $radioOptions, string $radioName, string $value){
    // We actually want an index here, sames happens with checkbox.
    echo "<ul>";
    for($i = 0; $i < count($radioOptions); $i++){
        $normalizedOption = normalizeStr($radioOptions[$i]);
        $isSelected = $normalizedOption === $value ? "checked" : "";
        echo "<li>";
        echo "<input type='radio' name='$radioName' id='form-radio-$i' value='$normalizedOption' $isSelected>";
        echo "<label for='form-radio-$i'>$radioOptions[$i]</label>";
        echo "</li>";
    }
    echo "</ul>";
};


// Dynamic checkboxes
function createCheckboxes(array $checkboxOptions,  array $handlers){
    echo "<ul>";
    // We do need an index too.
    for($i = 0; $i < count ($checkboxOptions); $i++){
        $normalizedOption = normalizeStr($checkboxOptions[$i]);
        // Get the handler off normalizedOption 
        // If it's set and it's not the base value of '' then we do add checked. Otherwise remains unchecked. 
        $currentHandler = isset($handlers[$normalizedOption]) && $handlers[$normalizedOption] != '' ?  'checked' : '';    
        echo "<li>";
        echo "<input type='checkbox' name='$normalizedOption' value='$normalizedOption' id='form-checkbox-$i' $currentHandler>";
        echo "<label for='form-checkbox-$i'>$checkboxOptions[$i]</label>";
        echo "</li>";
    }
    echo "</ul>";
};

function createAlertErrorBox(string $errorMessage) {
    echo "<div class='error-box'>";
    echo "<h2> Error! </h2>";
    echo "<p>$errorMessage</p>";
    echo "</div>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2.8 Form</title>
    <style>
        :root {
            --bg : #222;
            --bg-light : #333;
            --bg-dark: #111; 
            --text: #eee;
            --error: #D32F2F;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        main {
            margin: 10vh auto;
            width: 400px;
            background-color: var(--bg);
            padding: 10px;
            border-radius: 10px;
            box-shadow: #000 0px 0px 10px 0px;
        }
        
        ul {
            list-style: none;
        }
        
        h1 {
            text-align: center;
        }

        h2 {
            margin: 1px;
        }
        input, select {
            background-color: var(--bg-light);
            padding: 10px;
            border: #222 1px solid;
            border-radius: 5px;
            color: var(--text);
        }

        .form-group {
            display: flex;
            margin: 10px 10px;
        }

        .form-col {
            width: 50%;
            display: flex;
            justify-self: end;
        }

        .form-col input, .form-col select {
            width: 100%;
        }

        .button-group {
            display: flex;
            justify-content: center;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: var(--bg-dark);
        }

        input[type="submit"]:active,
        input[type="reset"]:active {
            background-color: #000;
        }

        .error-box{
            background-color: var(--error);
            border-radius: 10px;
            width: 300px;
            padding: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <main>

        <h1>Novell Services <Login></Login></h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            
            <div class="form-container">
                <div class="form-group">
                    <div class="form-col">
                        <label for="form-username">Username: </label>
                    </div>
                    <div class="form-col">
                        <input type="text" name="username" id='form-username' value='<?php echo $username; ?>' required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="form-col"><label for='form-password'>Password: </label></div>
                    <div class="form-col"><input type="password" name="password" id='form-password' value='<?php echo $password; ?>' required></div>
                </div>
                
                
                <div class="form-group">
                    <div class="form-col"><label for="form-city">City</label></div>
                    <div class="form-col"><input type="text" name="city" id="form-city" value='<?php echo $city; ?>' required></div>
                </div>
                
                <div class="form-group">
                    <div class="form-col"><label for="webservers">Select a web Server</label></div>
                    <?php createSelect($webServers, "webservers", $webServer); ?>
                </div>
                
                <div class="form-group">
                    <div class="form-col">
                        <p>Please Sepecify your role</p>
                    </div>
                    <?php createRadios($roles, "roles", $role); ?>
                </div>
                
                <div class="form-group">
                    <div class="form-col">
                        <p>Single Sign-on to the following:</p>
                    </div>
                    <?php createCheckboxes($signOns, $checkboxHandlers); ?>
                </div>
                
                <div class="button-group">
                    <input type="submit" value="Login">
                    <input type="reset" value="Reset">
                </div>
            </div>
        </form>
    </main>
    <?php $usernameErrorFlag ? createAlertErrorBox($usernameError) : '' ?>
    <?php $passwordErrorFlag ? createAlertErrorBox($passwordError) : '' ?>
    <?php $cityErrorFlag ? createAlertErrorBox($cityError) : '' ?>
    <?php $webServerErrorFlag ? createAlertErrorBox($webServerError) : '' ?>
    </body>
</html>