<?php 
    if(isset($_POST['textarea_post'])){
        if($_POST['textarea_post']!=""){
            $publish_time = date("Y/m/d-h:i:sa");
            $post_data = array(
                            'content' => $_POST['textarea_post'],
                            'user_id' => $_SESSION['user_id'],
                            'publish_time'=> $publish_time
            ); 
            if(add_post($post_data)){
                $_SESSION['new_post'] = true;
                redirect_to(home_url('dashboard'));
            }
        }
    }
    

    function get_title(){
        return 'ایجاد پست جدید';
    }
    function get_content(){
        ?>
            <form method="POST">
                <div class="form-group">
                    <textarea class="form-control" id="fancytextarea" name="textarea_post" rows="3"></textarea>
                    <br>
                    <button type="submit" class="btn btn-success" name="submit_post">انتشار</button>
                </div>    
            </form>
        <?php    
    }
    
    
?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
