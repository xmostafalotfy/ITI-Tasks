<?php

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

function getID($filename) {

    $line = '';
    $file = fopen($filename, 'r');

    if (! $file) return 0;
    else{

        fseek($file, -1, SEEK_END);  
        while (($char = fgetc($file)) !== false) {

            if ($char === "\n") {
                break;
            }

            fseek($file, -2, SEEK_CUR);
            $line = $char . $line;
        }

        fclose($file);
        $idLine = explode(":",$line)[0];
        
        return (int)$idLine+1;
    }
}

function emailExistence($filename,$email){

    $file = fopen($filename, 'r');
    while (($line = fgets($file)) !== false) {

        $data = explode(":",$line);
        if(strtolower($data[1]) === strtolower($email)){
            return true;
        }
    }
    return false;

}

function authenticate($filename, $email, $pass, &$formErrors){

    $file = fopen($filename, 'r');
    while (($line = fgets($file)) !== false) {

        $data = explode(":",$line);
        if(strtolower($data[1]) === strtolower($email)){
            if (password_verify($pass, $data[2])) return $data;

            $formErrors['error'] = "Wrong Password";
            print_r($formErrors);
            return;
        }
    }
    $formErrors['error'] = "The email address you entered isn't connected to an account.";
    return;
}