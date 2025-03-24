<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../mysqli/CRUDop.php";
require_once "../mysqli/Connection.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    die("User ID is missing.");
}

$user = selectById($id);
if (!$user) {
    die("User not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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
        input[type="submit"]:hover {
            background: #3700b3;
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
    <h2>Edit User</h2>
    <form action="../handlers/update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <label for="room">Room No.</label>
        <select name="room" required>
            <option value="room-1" <?php if ($user['room'] === 'room-1') echo 'selected'; ?>>room-1</option>
            <option value="room-2" <?php if ($user['room'] === 'room-2') echo 'selected'; ?>>room-2</option>
            <option value="room-3" <?php if ($user['room'] === 'room-3') echo 'selected'; ?>>room-3</option>
        </select>

        <label>Current Image:</label><br>
        <img src="../uploads/<?php echo $user['image']; ?>" width="100"><br><br>

        <label for="image">Change Image (optional):</label>
        <input type="file" name="image" accept="image/*">

        <div class="buttons">
            <input type="submit" value="Update">
            <input type="reset" value="Reset">
        </div>
    </form>
</div>
</body>
</html>
