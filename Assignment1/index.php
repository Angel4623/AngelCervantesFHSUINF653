<?php

if(isset($_GET["first"]) && isset($_GET["last"])){
    $firstName = $_GET["first"];
    $lastName = $_GET["last"];
    if(!empty($firstName) && !empty($lastName)) {
        echo "My name is " . $firstName . " " . $lastName . "<br/>";
    } else {
        echo "Please fill in the first and last name.<br/>";
    }
}

if(isset($_GET["age"])){
    $age = intval($_GET["age"]);
    if($age >= 18){
        echo "I am old enough to vote in the United States.";
    } 
 
    else{
        echo "I am not old enough to vote in the United States.";
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getting Data</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <h1>Voting Age Test</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
    <label for="first">First Name:</label>
    <input type="text" id="first" name="first" autocomplete="off"> 
    <br/>
    <br/>
    <label for="last">Last Name:</label>
    <input type="text" id="last" name="last" autocomplete="off">
    <br/>
    <br/>
    <label for="age">Age:</label>
    <input type="text" id="age" name="age" autocomplete="off">
    <br/>
    <br/>
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>   
</body>
</html>

