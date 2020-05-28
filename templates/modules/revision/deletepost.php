<?php
if($_SERVER['REQUEST_METHOD']=='DELETE'){ 
    session_start();
    $fetch_data = json_decode(file_get_contents("php://input"));
    $_SESSION['user_id'];

    try{
        $pdo = new PDO('sqlite:'.'../../../myapp.data');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $read_query = "DELETE FROM posts WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($read_query);
        $stmt->execute(['id'=>$fetch_data->id, 'user_id'=>$_SESSION['user_id']]);
        if($stmt->rowCount()){
            echo 'پست مورد نظر با موفقیت حذف گردید.';
        }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}
else{
    function get_title(){
    }
    
    function get_content(){
        
    }
}
?>