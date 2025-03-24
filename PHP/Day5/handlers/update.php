<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../validations/validations.php";
require_once "../mysqli/CRUDop.php";
require_once "../mysqli/Connection.php";

$userManager = new UserManager();


$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$room = $_POST['room'];

if (!$id) {
    die("User ID is missing.");
}


$validData = validatePostData($_POST);

$formErrors = $validData["errors"];
$oldData = $validData["valid_data"];


if (! isset($room)){

    $formErrors['room'] = "Room must be selected";
}




$user = $userManager->selectById($id);
if (!$user) {
    die("User not found.");
}

$imageName = $user['image']; 
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES['image']['tmp_name'];
    $originalName = basename($_FILES['image']['name']);
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $newImageName = uniqid() . '.' . $extension;
    $destination = "../uploads/" . $newImageName;

    if (move_uploaded_file($tmpName, $destination)) {
        $oldImagePath = "../uploads/" . $user['image'];
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
        $imageName = $newImageName; 
    } else {
        die("Failed to upload new image.");
    }
}


if (count($formErrors)) {

    foreach($formErrors as $error){
        echo $error;
    }
    exit;

}

$result = $userManager->update($id, $name, $email, $room, $imageName);


if ($result) {
    header("Location: ../app/allusers.php"); 
    exit();
} else {
    echo "Failed to update user.";
}
