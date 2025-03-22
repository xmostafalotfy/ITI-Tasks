<?php

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
        
        return (int)$idLine[0]+1;
}
}


function appendDataTofile($filename, $data){

    $fileobject= fopen($filename, "a");

    if ($fileobject) {

        fwrite($fileobject, $data);
        fclose($fileobject);

        return true;

    }

    return false;

}


function validatePostData($postData){

    $errors = [];
    $valid_data = [];
    foreach ($postData as $key => $value) {

        if($value == ""){
            $errors[$key] = ucfirst("{$key} is required");

        }else{
            if (is_array($value)) 
                $valid_data[$key] = $value;
            else 
                $valid_data[$key] = trim($value);

        }
    }

    return ["errors" => $errors, "valid_data" => $valid_data];
}