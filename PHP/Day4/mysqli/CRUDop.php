<?php

require_once  "Connection.php";


function createTable(){
    try{
        $conn = connect_to_db_pdo();

        $create_query = "create table if not exists `users` 
            (`id` int AUTO_INCREMENT primary key, 
            `name` varchar(100) not null, 
            `email` varchar(100) unique ,
            `password` varchar(255), 
            `room` varchar(30) ,
            `image` varchar(255) );";


    
        $stmt = $conn->prepare($create_query);
        $res=$stmt->execute();

        $conn = null;


    }catch (Exception $e){
        echo $e->getMessage();

    }
}


function selectById($id){
    $data = [];

    try{
        $conn  = connect_to_db_pdo();
        if($conn){
            $select_query = "select * from `users` where `id` = :userid";
            $stmt = $conn->prepare($select_query); 
            $stmt->bindParam(':userid', $id, PDO::PARAM_INT);
            $res=$stmt->execute();
            
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }catch (Exception $e){
        echo $e->getMessage();
    }
    return $data;

}

function selectAll(){
    $data = [];

    try{
        $conn  = connect_to_db_pdo();
        if($conn){
            $select_query = "select * from `users`";
            $stmt = $conn->prepare($select_query);
            $res=$stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_NUM);
        }

    }catch (Exception $e){
        echo $e->getMessage();
    }
    return $data;

}

function insert($name,$email, $pass,$room,$image){
    try{
        $conn = connect_to_db_pdo();
        if($conn){
            $inst_query = "insert into `users`(`name`, `email`, `password`, `room`, `image`)
            values(:username, :useremail, :userpass, :userroom , :userimage); ";

            $stmt = $conn->prepare($inst_query);

            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':useremail', $email);
            $stmt->bindParam(':userpass', $pass);
            $stmt->bindParam(':userroom', $room);
            $stmt->bindParam(':userimage', $image);

            $res=$stmt->execute();
            if($res){
                $inserted_id   = $conn->lastInsertId();
                return $inserted_id;

            }

            $conn = null;
            return false;

        }

    }catch (Exception $e){
        echo $e->getMessage();

    }
}

function update($id,$name,$email,$room,$image){

    try{

        $conn = connect_to_db_pdo();
        if($conn){

            $fieldsToUpdate['name'] = $name;
            $fieldsToUpdate['email'] = $email;
            $fieldsToUpdate['room'] = $room;
            $fieldsToUpdate['image'] = $image;
            


            $setClause = [];
            foreach ($fieldsToUpdate as $column => $value) {
                $setClause[] = "`$column` = :$column";
            }

            $update_query = "update `users` set " . implode(", ", $setClause) . " where `id` = :id";


            $stmt = $conn->prepare($update_query);
            
            foreach ($fieldsToUpdate as $column => $value) {
                $stmt->bindValue(":$column", $value);
            }
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $res = $stmt->execute();

            if($res){
                $affected_rows = $stmt->rowCount();
            }
            $conn = null;

            if($affected_rows){
                return $affected_rows;
            }

        }
        return false;

    }catch (Exception $e){
        echo $e->getMessage();

    }

}


function delete($id){
    try{
        $conn = connect_to_db_pdo();
        if($conn){
            $delete_query = "delete from `users` where `id` = :userid";
            $stmt = $conn->prepare($delete_query);

            $stmt->bindParam(':userid', $id, PDO::PARAM_INT);

            $res = $stmt->execute();

            if($res){
                $affected_rows = $stmt->rowCount();
                if ($affected_rows > 0) 
                {
                    return $affected_rows;
                }
            }
            $conn = null;
        }
        return false;

    }catch (Exception $e){
        echo $e->getMessage();
    }
}
