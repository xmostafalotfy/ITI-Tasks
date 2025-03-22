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
        input, select, textarea {
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
        .radio-group, .checkbox-group {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
            align-items: center;
        }
        .radio-group label, .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 10px;
        }
        input[type="submit"], input[type="reset"] {
            background: #6200ea;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
            width: 48%;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background: #3700b3;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input[type="radio"], input[type="checkbox"] {
            appearance: none;
            width: 16px;
            height: 16px;
            border: 2px solid #6200ea;
            border-radius: 50%;
            margin: 0;
            cursor: pointer;
        }
        input[type="checkbox"] {
            border-radius: 4px;
        }
        input[type="radio"]:checked, input[type="checkbox"]:checked {
            background: #6200ea;
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
        <form action="user.php" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $oldData['first_name'] ?? ''; ?>">
            <?php if (isset($errors['first_name'])): ?>
                <div class="error"><?php echo $errors['first_name']; ?></div>
            <?php endif; ?>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $oldData['last_name'] ?? ''; ?>">
            <?php if (isset($errors['last_name'])): ?>
                <div class="error"><?php echo $errors['last_name']; ?></div>
            <?php endif; ?>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4"><?php echo $oldData['address'] ?? ''; ?></textarea>
            <?php if (isset($errors['address'])): ?>
                <div class="error"><?php echo $errors['address']; ?></div>
            <?php endif; ?>

            <label for="country">Country:</label>
            <select id="country" name="country">
                <option selected disabled>Select Country</option>
                <option value="Egypt" <?php echo (isset($oldData['country']) && $oldData['country'] === 'Egypt' ? 'selected' : ''); ?>>Egypt</option>
                <option value="USA" <?php echo (isset($oldData['country']) && $oldData['country'] === 'USA' ? 'selected' : ''); ?>>USA</option>
                <option value="UK" <?php echo (isset($oldData['country']) && $oldData['country'] === 'UK' ? 'selected' : ''); ?>>UK</option>
            </select>
            <?php if (isset($errors['country'])): ?>
                <div class="error"><?php echo $errors['country']; ?></div>
            <?php endif; ?>

            <label>Gender:</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="Male" <?php echo (isset($oldData['gender']) && $oldData['gender'] === 'Male' ? 'checked' : ''); ?>> Male</label>
                <label><input type="radio" name="gender" value="Female" <?php echo (isset($oldData['gender']) && $oldData['gender'] === 'Female' ? 'checked' : ''); ?>> Female</label>
            </div>
            <?php if (isset($errors['gender'])): ?>
                <div class="error"><?php echo $errors['gender']; ?></div>
            <?php endif; ?>

            <label>Skills:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="skills[]" value="PHP" <?php echo (isset($oldData['skills']) && in_array('PHP', $oldData['skills']) ? 'checked' : ''); ?>> PHP</label>
                <label><input type="checkbox" name="skills[]" value="MySQL" <?php echo (isset($oldData['skills']) && in_array('MySQL', $oldData['skills']) ? 'checked' : ''); ?>> MySQL</label>
                <label><input type="checkbox" name="skills[]" value="J2SE" <?php echo (isset($oldData['skills']) && in_array('J2SE', $oldData['skills']) ? 'checked' : ''); ?>> J2SE</label>
            </div>
            <?php if (isset($errors['skills'])): ?>
                <div class="error"><?php echo $errors['skills']; ?></div>
            <?php endif; ?>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $oldData['username'] ?? ''; ?>">
            <?php if (isset($errors['username'])): ?>
                <div class="error"><?php echo $errors['username']; ?></div>
            <?php endif; ?>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <?php if (isset($errors['password'])): ?>
                <div class="error"><?php echo $errors['password']; ?></div>
            <?php endif; ?>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" value="<?php echo $oldData['department'] ?? ''; ?>">
            <?php if (isset($errors['department'])): ?>
                <div class="error"><?php echo $errors['department']; ?></div>
            <?php endif; ?>

            <label for="captcha">CAPTCHA:</label>
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