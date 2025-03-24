<?php

require_once "../mysqli/CRUDop.php";
require_once "../mysqli/Connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
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
            width: 100%; 
            max-width: 1200px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow-x: auto; 
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            white-space: nowrap;
        }
        table th, table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #444;
        }
        table th {
            background-color: #2c2c2c;
            color: rgb(133, 50, 250);
        }
        table tr:hover {
            background-color: #2c2c2c;
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
        .delete-button {
            background: #ff4444;
            text-decoration: none;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .delete-button:hover {
            background: #cc0000;
        }
        .update-button {
            background:rgb(0, 0, 140);
            text-decoration: none;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .update-button:hover {
            background:rgb(0, 0, 255);
        }
        img {
            width: 60px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registered Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Room</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = selectAll();

                if (!empty($users)) {
                    foreach ($users as $user) {
                        echo "<tr>
                            <td>{$user[0]}</td>
                            <td>{$user[1]}</td>
                            <td>{$user[2]}</td>
                            <td>{$user[4]}</td>
                            <td><img src='../uploads/{$user[5]}' alt='User Image'></td>
                            <td><a class='delete-button' href='../handlers/delete.php?id={$user[0]}'>Delete</a>
                                <a class='update-button' href='edituser.php?id={$user[0]}'>Update</a>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>There are no users at the moment.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="back-button">
            <a href="../handlers/logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
