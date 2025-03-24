<?php

require_once "Connection.php";

class UserManager {

    public function createTable() {
        try {
            $conn = connect_to_db_pdo();

            $create_query = "CREATE TABLE IF NOT EXISTS `users` (
                `id` INT AUTO_INCREMENT PRIMARY KEY, 
                `name` VARCHAR(100) NOT NULL, 
                `email` VARCHAR(100) UNIQUE,
                `password` VARCHAR(255), 
                `room` VARCHAR(30),
                `image` VARCHAR(255)
            );";

            $stmt = $conn->prepare($create_query);
            $stmt->execute();

            $conn = null;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function selectById($id) {
        $data = [];
        try {
            $conn = connect_to_db_pdo();
            if ($conn) {
                $stmt = $conn->prepare("SELECT * FROM `users` WHERE `id` = :userid");
                $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $data;
    }

    public function selectAll() {
        $data = [];
        try {
            $conn = connect_to_db_pdo();
            if ($conn) {
                $stmt = $conn->prepare("SELECT * FROM `users`");
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_NUM);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $data;
    }

    public function insert($name, $email, $pass, $room, $image) {
        try {
            $conn = connect_to_db_pdo();
            if ($conn) {
                $stmt = $conn->prepare("INSERT INTO `users` (`name`, `email`, `password`, `room`, `image`)
                                        VALUES (:username, :useremail, :userpass, :userroom, :userimage)");

                $stmt->bindParam(':username', $name);
                $stmt->bindParam(':useremail', $email);
                $stmt->bindParam(':userpass', $pass);
                $stmt->bindParam(':userroom', $room);
                $stmt->bindParam(':userimage', $image);

                $res = $stmt->execute();
                if ($res) {
                    return $conn->lastInsertId();
                }
                $conn = null;
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($id, $name, $email, $room, $image) {
        try {
            $conn = connect_to_db_pdo();
            if ($conn) {
                $fieldsToUpdate = [
                    'name' => $name,
                    'email' => $email,
                    'room' => $room,
                    'image' => $image
                ];

                $setClause = [];
                foreach ($fieldsToUpdate as $column => $value) {
                    $setClause[] = "`$column` = :$column";
                }

                $update_query = "UPDATE `users` SET " . implode(", ", $setClause) . " WHERE `id` = :id";
                $stmt = $conn->prepare($update_query);

                foreach ($fieldsToUpdate as $column => $value) {
                    $stmt->bindValue(":$column", $value);
                }
                $stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $res = $stmt->execute();
                if ($res) {
                    $affected_rows = $stmt->rowCount();
                    $conn = null;
                    return $affected_rows > 0 ? $affected_rows : false;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function delete($id) {
        try {
            $conn = connect_to_db_pdo();
            if ($conn) {
                $stmt = $conn->prepare("DELETE FROM `users` WHERE `id` = :userid");
                $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
                $res = $stmt->execute();

                if ($res) {
                    $affected_rows = $stmt->rowCount();
                    $conn = null;
                    return $affected_rows > 0 ? $affected_rows : false;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }
}
