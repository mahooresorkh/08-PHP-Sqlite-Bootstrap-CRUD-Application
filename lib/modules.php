<?php

    function render_page(){
        include_once('templates/header.php');
        show_messages();
        get_content();
        include_once('templates/footer.php');
    }
    
    function load_module(){
        $module = get_module_name();
        if(empty($module)){
            $module = 'home';
        }

        check_for_previous_login();

        if(is_user_logged_in() && ($module == 'login' || $module == 'register')){
            redirect_to(home_url());
        }


        if(!is_user_logged_in() && ($module == 'logout'|| $module == 'createpost')){
            redirect_to(home_url());
        }

        $module_file = "templates/modules/$module.php";
        if(file_exists($module_file)){    
            require_once($module_file);
            check_for_authentication_requirement();
        } 
        else{
            add_message('پیام خطا: <b>آدرس وارد شده اشتباه است</b>.', 'error');
            require_once('templates/modules/home.php');
        }

        render_page();
    }

    function is_authentication_required(){
        if(function_exists('authentication_required')){
            return authentication_required();
        }
        return false;
    }


    $messages = array();

    function add_message($message = null, $type = 'error'){
        if(!$message){
            return;
        }
        global $messages;
        $messages[] = array(
            'message' => $message,
            'type'=> $type,

        );
    }

    function show_messages(){
        global $messages;
        if(empty($messages)){
            return;
        }
        
        foreach ($messages as $item) {
            $message = $item['message'];
            $type = $item['type'];
            if($type == 'error'){
                $type = 'danger';
            }
            ?> 
                <div class="alert alert-<?php echo $type; ?>" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $message; ?>
                </div>
            <?php 
        }    

    }

    function check_for_authentication_requirement(){
        if(is_authentication_required() && !is_user_logged_in()){
            $login_url = home_url('login');
            redirect_to($login_url);
        }
    }
?>