<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            padding: 0.8em;
            background-color: #121212;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #1e1e1e;
            padding: 30px;
            border-radius: 10px;
            width: 500px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .result-section {
            margin-bottom: 20px;
        }
        .result-section h3 {
            margin-bottom: 10px;
            color: #6200ea;
        }
        .result-section p {
            background: #2c2c2c;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #444;
            margin: 0;
        }
        .thank-you {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .back-button a {
            background: #6200ea;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .back-button a:hover {
            background: #3700b3;
        }
    </style>
</head>
<body>
    <?php 

        require_once "helpers.php";

        $validData = validatePostData($_POST);

        $formErrors = $validData["errors"];
        $oldData= $validData["valid_data"];

        if(count($formErrors)) {

            $errors = json_encode($formErrors);

            $queryString ="errors={$errors}";
            $old_data = json_encode($oldData);

            if($old_data){
                $queryString .= "&old={$old_data}";
            }
    
            header("location:register.php?{$queryString}");
        }else {

            $id = getID("users.txt");
            $txt = "\n{$id}";
            
            $name = "{$_POST['first_name']} {$_POST['last_name']}";
            $txt = $txt.":".$_POST['first_name'].":".$_POST['last_name'];
            
            $address = $_POST['address'];
            $txt = $txt.":".$address;

            $txt = $txt.":".$_POST['country'];

            $gender = $_POST['gender'];
            $txt = $txt.":".$gender;


            $skills = "";
            foreach($_POST['skills'] as $skill){
                $skills = $skills." ".$skill;
            }
            $txt = $txt.":".$skills;

            $txt = $txt.":".$_POST['username'];


            $dep = $_POST['department'];
            $txt = $txt.":".$dep;


            $file = fopen("users.txt","a");

            
            fwrite($file, $txt);
            fclose($file);
    }
    ?>
    <div class="container">
        <h2>Registration Result</h2>
        <div class="thank-you">
            Thanks <?php 

            if( $gender=== 'Male')
                echo "Mr.";
            else
                echo "Miss ";

            echo $name;

            ?>!
        </div>
        <div class="result-section">
            <h3>Please Review Your Information</h3>
            <p><strong>Name:</strong> 
                <?php 
                    echo $name
                ?>
            </p>
            <p><strong>Address:</strong> 
                <?php 
                    echo $address;
                ?>
            </p>
            <p><strong>Your Skills:</strong> 
                <?php 
                    echo $skills
                ?>
            </p>
            <p><strong>Department:</strong> 
                <?php 
                    echo $dep
                ?>
            </p>
            <div class="back-button">
            <a href="allusers.php">All Usesrs</a>
            </div>
        </div>
    </div>

</body>
</html>