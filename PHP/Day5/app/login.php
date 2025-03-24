<?php
$errors = [];
$oldData = [];

if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors'], true);
}

if (isset($_GET['old'])) {
    $oldData = json_decode($_GET['old'], true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            padding: 2em;
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
        input {
            width: calc(100% - 20px);
            padding: 12px;
            margin-top: 10px;
            background: #2c2c2c;
            border: 1px solid #444;
            color: white;
            border-radius: 5px;
            transition: all 0.3s;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #6200ea;
            outline: none;
        }
        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }
        input[type="submit"]{
            background: #6200ea;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
            width: 48%;
        }
        input[type="submit"]:hover{
            background: #3700b3;
        }
        a{
            color:#6200ea;
            text-decoration:none;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        .error {
            color: #ff4444;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <form action="../handlers/loginHandler.php" method="post" enctype="multipart/form-data">

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo $oldData['email'] ?? ''; ?>">
            <?php if (isset($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <?php if (isset($errors['password'])): ?>
                <div class="error"><?php echo $errors['password']; ?></div>
            <?php endif; ?>
                
            <?php if (isset($errors['error'])): ?>
                <div class="error"><?php echo $errors['error']; ?></div>
            <?php endif; ?>

            <br>
            <a href="register.php">don't have account? Click Here</a>

            <div class="buttons">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>