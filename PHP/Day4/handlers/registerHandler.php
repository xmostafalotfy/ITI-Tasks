<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../validations/validations.php";
require_once "../mysqli/CRUDop.php";
require_once "../mysqli/Connection.php"; 


$validData = validatePostData($_POST);

$formErrors = $validData["errors"];
$oldData = $validData["valid_data"];

if ($_POST['password'] !== $_POST['confirm']) {
    
    $formErrors['confirm'] = "Passwords do not match";
}

if (! isset($_POST['room'])){

    $formErrors['room'] = "Room must be selected";
}

if(emailExistence($_POST['email'])){
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
    exit;

} else {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $room  = $_POST['room'];
    $image = $img ?? "";     
    $id = insert($name, $email, $pass, $room, $image);
    
    if ($id) {
        header("location:../app/login.php");
        exit;
    } else {
        echo "Error Inserting Data";
    }
    
}
