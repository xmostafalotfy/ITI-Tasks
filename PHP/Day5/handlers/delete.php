<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../validations/validations.php";
require_once "../mysqli/CRUDop.php";
require_once "../mysqli/Connection.php";

$userManager = new UserManager();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $userManager->delete($id);

}

header("Location: ../app/allusers.php");
exit();
