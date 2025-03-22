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
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Result</h2>
        <div class="thank-you">
            Thanks <?php 
            if($_POST['gender'] === 'Male'){
                echo "Mr.";
            }else{
                echo "Miss ";
            }
            echo $_POST['first_name'];
            ?>!
        </div>
        <div class="result-section">
            <h3>Please Review Your Information</h3>
            <p><strong>Name:</strong> <?php 
                echo "{$_POST['first_name']} {$_POST['last_name']}"
            ?></p>
            <p><strong>Address:</strong> 
                <?php 
                    echo "{$_POST['address']}";
                ?>
            </p>
            <p><strong>Your Skills:</strong> 
                <?php 
                    foreach($_POST['skills'] as $skill){
                        echo "{$skill} ";
                    }
                ?>
            </p>
            <p><strong>Department:</strong> 
                <?php 
                    echo "{$_POST['department']}"
                ?>
            </p>
        </div>
    </div>
</body>
</html>