<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../validations/validations.php";

$validData = validatePostData($_POST);

$formErrors = $validData["errors"];
$oldData = $validData["valid_data"];

if ($_POST['password'] !== $_POST['confirm']) {
    
    $formErrors['confirm'] = "Passwords do not match";
}

if (! isset($_POST['room'])){

    $formErrors['room'] = "Room must be selected";
}

if(emailExistence("../data/users.txt",$_POST['email'])){
    $formErrors['email'] = "Email already existed";
}

$img = validIMG($_FILES,$formErrors);

if (count($formErrors)) {

    $errors = json_encode($formErrors);
    $queryString = "errors={$errors}";
    $old_data = json_encode($oldData);

    if ($old_data) {
        $queryString .= "&old={$old_data}";
    }

    header("location:../app/register.php?{$queryString}");

} else {
    $id = getID("../data/users.txt");
    $txt = "\n{$id}";
    
    $email = $_POST['email'];
    $txt .= ":{$email}";
    
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $txt .= ":{$hashedPassword}";
    
    $name = $_POST['name'];
    $txt .= ":{$name}";
    
    $txt .= ":" . $_POST['room'];

    $txt .= ":{$img}";

    $file = fopen("../data/users.txt", "a");
    fwrite($file, $txt);
    fclose($file);
    header("location:../app/login.php");
}
