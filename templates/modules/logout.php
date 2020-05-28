<?php
    if(function_exists('user_logout')&&function_exists('redirect_to')&&function_exists('home_url')){
        user_logout();
        redirect_to(home_url());
    }
?>