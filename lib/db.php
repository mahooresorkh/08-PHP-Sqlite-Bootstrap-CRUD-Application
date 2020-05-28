<?php
    global $db;
    $db = new SQLite3(DB_FILENAME);

    function create_db_tables(){
        global $db;

        $db->query("
            CREATE TABLE IF NOT EXISTS options(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                option_name TEXT NOT NULL,
                option_value TEXT NOT NULL
            );
        ");
        

        $db->query("
            CREATE TABLE IF NOT EXISTS users(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT NOT NULL,
                password TEXT NOT NULL,
                first_name TEXT NOT NULL,
                last_name TEXT NOT NULL,
                age TEXT NOT NULL,
                phone_no NOT NULL
            );
        ");
        $db->query("
          CREATE TABLE IF NOT EXISTS posts(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            content TEXT NOT NULL,
            publish_time TEXT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users (id)
                                                        
        );
    ");
    }

    create_db_tables();
?>