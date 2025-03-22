<?php
// Open the file in read mode
$filename = 'users.txt';
$file = fopen($filename, 'r');

// Check if the file was opened successfully
if ($file) {
    // Read the file line by line
    while (($line = fgets($file)) !== false) {
        // Process each line
        var_dump($line);
        $test = explode(":",$line);
        print_r( $test); // Print the line (you can process it as needed)
    }

    // Close the file
    fclose($file);
} else {
    // Handle error if the file cannot be opened
    echo "Error: Unable to open the file.";
}
?>