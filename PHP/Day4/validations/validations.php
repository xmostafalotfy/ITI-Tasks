<?php

require_once  "../mysqli/Connection.php";
require_once  "../mysqli/CRUDop.php";



function validatePostData($postData){

    $errors = [];
    $valid_data = [];
    foreach ($postData as $key => $value) {

        if(! isset($value) && $value == ""){
            $errors[$key] = ucfirst("{$key} is required");
        }else{
            if (is_array($value)) 
                $valid_data[$key] = $value;
            else{ 
                if ($key === 'email' and ! filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = "Invalid Email Format";
                    continue;
                }
                if($key === 'password') {
                    if (strlen($value) < 8){
                        $errors['password'] = "8 Character or more";
                        continue;
                    }
                    if(! preg_match('/^[a-z0-9_]+$/', $value)){
                        $errors['password'] = "Only small characters, digits and underscores are available";
                        continue;
                    }
                    continue;
                }
                $valid_data[$key] = trim($value);
            }
        }
    }
    return ["errors" => $errors, "valid_data" => $valid_data];
}


function validIMG($fileInfo,&$formErrors){

    $imageName = $fileInfo['image']['name'];
    $imageTmp = $fileInfo['image']['tmp_name'];
    
    if(empty($imageName) and empty($imageTmp)) {

        $formErrors['image'] = "Please upload a valid image";
        return;

    }
    else{

        if (count($formErrors)){
            return;
        }

        $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];

        if (!in_array($ext, $allowed)) {
            $formErrors['image'] = "Invalid image format";
            return;
        }
        else {
            $newName = uniqid() . "." . $ext;
            move_uploaded_file($imageTmp, "../uploads/{$newName}");
        }
    }
    return $newName;
}

function emailExistence($email){
    try {
        $conn = connect_to_db_pdo();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE LOWER(email) = LOWER(:email)");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}



function authenticate($email, $pass, &$formErrors){
    try {
        $conn = connect_to_db_pdo();
        $stmt = $conn->prepare("SELECT * FROM users WHERE LOWER(email) = LOWER(:email)");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($pass, $user['password'])) {
                return $user;
            } else {
                $formErrors['error'] = "Wrong Password";
                return null;
            }
        } else {
            $formErrors['error'] = "The email address you entered isn't connected to an account.";
            return null;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        return null;
    }
}
