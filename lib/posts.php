<?php

try{
    $pdo = new PDO('sqlite:'.DB_FILENAME);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

function get_all_posts(){
    try{
        global $pdo;
        $read_query = "SELECT * FROM posts";
        $stmt = $pdo->prepare($read_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}


function get_posts($user_id){
    try{
        global $pdo;
        $read_query = "SELECT * FROM posts WHERE user_id = :user_id";
        $stmt = $pdo->prepare($read_query);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function get_post_by_id($id){
    try{
        global $pdo;
        $read_query = "SELECT * FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($read_query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function add_post($post_data){
    try{
        
        global $pdo;
        $read_query = "INSERT INTO posts (content, user_id, publish_time) VALUES (:content,:user_id,:publish_time)";
        $stmt = $pdo->prepare($read_query);
        $stmt->execute(['content'=>$post_data['content'], 'user_id'=>$post_data['user_id'], 'publish_time'=>$post_data['publish_time']]);
        return true;
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function update_post($post_data){  
    try{
        global $pdo;
        $read_query = 'UPDATE posts SET content = :content, publish_time = :publish_time WHERE id = :id AND user_id = :user_id';
        $stmt = $pdo->prepare($read_query);
        $stmt->execute(['content'=>$post_data['content'], 'publish_time'=>$post_data['publish_time'] ,'id'=>$post_data['id'], 'user_id'=>$_SESSION['user_id']]);
        return $stmt->rowCount();
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }    
}

function delete_post($id){
    try{
        global $pdo;
        $read_query = "DELETE FROM posts WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($read_query);
        $stmt->execute(['id'=>$id, 'user_id'=>$_SESSION['user_id'] ]);
        return $stmt;
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }    
}

?>

