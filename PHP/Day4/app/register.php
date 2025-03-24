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
        input, select {
            width: calc(100% - 20px);
            padding: 12px;
            margin-top: 10px;
            background: #2c2c2c;
            border: 1px solid #444;
            color: white;
            border-radius: 5px;
            transition: all 0.3s;
        }
        input:focus, select:focus {
            border-color: #6200ea;
            outline: none;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 10px;
        }
        input[type="submit"], input[type="reset"]{
            background: #6200ea;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
            width: 48%;
        }
        input[type="submit"]:hover, input[type="reset"]:hover{
            background: #3700b3;
        }
        label {
            display: block;
            margin-top: 15px;
        }

        .captcha-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        .captcha-container span {
            font-size: 18px;
            font-weight: bold;
            background: #2c2c2c;
            padding: 8px 12px;
            border-radius: 5px;
            border: 1px solid #444;
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
        <h2>Registration Form</h2>
        <form action="../handlers/registerHandler.php" method="post" enctype="multipart/form-data">

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $oldData['name'] ?? ''; ?>">
            <?php if (isset($errors['name'])): ?>
                <div class="error"><?php echo $errors['name']; ?></div>
            <?php endif; ?>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo $oldData['email'] ?? ''; ?>">
            <?php if (isset($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>

            <label for="room">Room No.</label>
            <select id="room" name="room">
                <option selected disabled>Select Room</option>
                <option value="room-1" <?php echo (isset($oldData['room']) && $oldData['room'] === 'room-1' ? 'selected' : ''); ?>>room-1</option>
                <option value="room-2" <?php echo (isset($oldData['room']) && $oldData['room'] === 'room-2' ? 'selected' : ''); ?>>room-2</option>
                <option value="room-3" <?php echo (isset($oldData['room']) && $oldData['room'] === 'room-3' ? 'selected' : ''); ?>>room-3</option>
            </select>
            <?php if (isset($errors['room'])): ?>
                <div class="error"><?php echo $errors['room']; ?></div>
            <?php endif; ?>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <?php if (isset($errors['password'])): ?>
                <div class="error"><?php echo $errors['password']; ?></div>
            <?php endif; ?>

            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" name="confirm">
            <?php if (isset($errors['confirm'])): ?>
                <div class="error"><?php echo $errors['confirm']; ?></div>
            <?php endif; ?>
            
            <label for="image">Profile Image</label>
            <input type="file" id="image" name="image" accept="image/*">
            <?php if (isset($errors['image'])): ?>
                <div class="error"><?php echo $errors['image']; ?></div>
            <?php endif; ?>

            <label for="captcha">CAPTCHA</label>
            <div class="captcha-container">
                <span id="captcha-text"></span>
                <input type="text" id="captcha" placeholder="Enter CAPTCHA" required>
            </div>

            <div class="buttons">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>

    <script>
        function generateCaptcha() {
            const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            let captcha = "";
            for (let i = 0; i < 6; i++) {
                captcha += chars[Math.floor(Math.random() * chars.length)];
            }
            return captcha;
        }

        const captchaText = document.getElementById("captcha-text");
        captchaText.textContent = generateCaptcha();

        const form = document.querySelector("form");
        form.addEventListener("submit", (e) => {
            const userInput = document.getElementById("captcha").value;
            if (userInput !== captchaText.textContent) {
                e.preventDefault();
                alert("CAPTCHA is incorrect. Please try again.");
                captchaText.textContent = generateCaptcha();
            }
        });

        form.addEventListener("reset", () => {
            captchaText.textContent = generateCaptcha();
        });
    </script>
</body>
</html>