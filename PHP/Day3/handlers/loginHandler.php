<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../validations/validations.php";

$validData = validatePostData($_POST);

$formErrors = $validData["errors"];
$oldData = $validData["valid_data"];


if (! count($formErrors)){
    $auth = authenticate("../data/users.txt", $_POST['email'], $_POST['password'], $formErrors);
}

if (count($formErrors)) {

    $errors = json_encode($formErrors);
    $queryString = "errors={$errors}";
    $old_data = json_encode($oldData);

    if ($old_data) {
        $queryString .= "&old={$old_data}";
    }

    header("location:../app/login.php?{$queryString}");

} else {
    session_start();
    $_SESSION['name'] = $auth[3];
    $_SESSION['email'] = $auth[1];
    $_SESSION['room'] = $auth[4];
    $_SESSION['img'] = $auth[5];
    header("location:../app/content.php");
}
