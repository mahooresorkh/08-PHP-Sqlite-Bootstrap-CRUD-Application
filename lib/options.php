<?php

function get_option($option_name, $full_row = false) {

    if(!$option_name) {
        return null;
    }
    
    global $db;
    $result = $db->query("
        SELECT *
        FROM options
        WHERE option_name = '$option_name'
    ");
    
    $row = $result->fetchArray(SQLITE3_ASSOC);
    if($row) {
        if($full_row) {
            return $row;
        } else {
            return $row['option_value'];
        }
    } else {
        return null;
    }
}



function option_exists($option_name) {
    $row = get_option($option_name, true);
    return isset($row['id']);
}




function add_option($option_name, $option_value = null) {
    
    if(!$option_name) {
       return null;
    }
    
    if(!$option_value) {
        $option_value = '0';
    }
    
    global $db;
    
    if(!option_exists($option_name)) {
        $db->query("
            INSERT INTO options (option_name, option_value) VALUES
            ('$option_name', '$option_value');
        ");
    } else {
        $db->query("
            UPDATE options
            SET option_value = '$option_value'
            WHERE option_name = '$option_name';
        ");
    }
    
}




function update_option($option_name, $option_value = null) {
    add_option($option_name, $option_value);
}




function delete_option($option_name) {
    if(option_exists($option_name)) {
        global $db;
        $db->query("
            DELETE FROM options
            WHERE option_name = '$option_name';
        ");
    }
}
