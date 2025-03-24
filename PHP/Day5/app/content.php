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
            display:flex;
            flex-direction:column;
            align-items:center;
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
        img{
            width: 300px;
            height: 300px;
            border-radius: 100%;
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

    session_start();

    if (! count($_SESSION)) {
        session_destroy();
        header("location:../app/login.php");
    }
    ?>

    <div class="container">
        <h2>Hello <?php echo $_SESSION['name'] ?></h2>
        <img src="<?php echo "../uploads/".$_SESSION['img'] ?>" alt="profile">
        <div class="result-section">
            <h3>Please Review Your Information</h3>
            <p><strong>Name:</strong> 
                <?php 
                    echo $_SESSION['name']
                ?>
            </p>
            <p><strong>Email:</strong> 
                <?php 
                    echo $_SESSION['email'] 
                ?>
            </p>
            <p><strong>Room:</strong> 
                <?php 
                    echo $_SESSION['room'] 
                ?>
            </p>
            <div class="back-button">
            <a href="../handlers/logout.php">logout</a>
            <a href="allusers.php">List all Users</a>
            </div>
        </div>
    </div>

</body>
</html>