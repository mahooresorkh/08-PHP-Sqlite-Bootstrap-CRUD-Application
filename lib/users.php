<?php

    function user_count(){
        global $db;
        $result = $db->query("
            SELECT * 
            FROM users
        ");

        $counter = 0;
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $counter++;
        }

        return $counter;
    }

    function initialize_users(){
        if(user_count()==0){
            global $db;
            $default_pw_hash = sha1('1234');
            $db->query("
                INSERT INTO users
                (username,password,first_name,last_name,age,phone_no) VALUES
                ('admin','$default_pw_hash','admin','admini','50','00000000000');
            ");
        }
    }


    function get_user($username){

        global $db;
        $result = $db->query("
                    SELECT * 
                    FROM users 
                    WHERE username = '$username'
                  ");
        $row = $result->fetchArray(SQLITE3_ASSOC);

        if(!$row){
            return null;
        }
        return $row;
    }




    function user_exists($username){

        $row = get_user($username);
        return isset($row['id']);
    }



    function add_users($userdata){
        $username   = htmlentities($userdata['username']);
        $hashed_pass = sha1($userdata['password']);
        $first_name = htmlentities($userdata['first_name']);
        $last_name  = htmlentities($userdata['last_name']);
        $age  = htmlentities($userdata['age']);
        $phone_no  = htmlentities($userdata['phone_no']);
        
        global $db;
        if(!user_exists($username)){
                
                $db->query("
                    INSERT INTO users
                    (username,password,first_name,last_name,age,phone_no) VALUES
                    ('$username','$hashed_pass','$first_name','$last_name','$age','$phone_no');
                ");
        }

        else{
            $db->query("
                UPDATE users 
                SET password = '$hashed_pass',
                first_name = '$first_name',
                last_name = '$last_name',
                age = '$age',
                phone_no = '$phone_no'
                WHERE username = '$username';
            ");
        }
    }


    function update_user($userdata){
        add_users($userdata);
    }

    function delete_user($username){
        if(user_exists($username)){
            global $db;
            $db->query("
                DELETE FROM users 
                WHERE username = '$username';
            ");
        }
    }

    function get_user_by_id($id){

        global $db;
        $result = $db->query("
                    SELECT * 
                    FROM users 
                    WHERE id = '$id'
                  ");
        $row = $result->fetchArray(SQLITE3_ASSOC);

        if(!$row){
            return null;
        }
        return $row;
    }



    initialize_users();

?>