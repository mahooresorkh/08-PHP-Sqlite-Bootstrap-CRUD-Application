<?php
    if(isset($_POST['edit_accomplished'])){
        $publish_time = date("Y/m/d-h:i:sa");
        $post_data = array(
                        'id' => $_POST['edited_post_id'],
                        'content' => $_POST['edit_accomplished'],
                        'user_id' => $_SESSION['user_id'],
                        'publish_time'=> $publish_time
        ); 
        if(update_post($post_data)){
            $_SESSION['edit_post'] = true;
            redirect_to(home_url('dashboard'));
        }
        else{
            $_SESSION['edit_post'] = false;
            redirect_to(home_url('dashboard'));
        }
            
    }
    else if(isset($_POST['post_id'])){
        function get_title(){
            return 'ویرایش پست موجود';
        }
        function get_content(){
            ?>
                <form method="POST">
                    <div class="form-group">
                        <textarea class="form-control" id="fancytextarea" name="edit_accomplished" rows="3"> 
                            <?php echo get_post_by_id($_POST['post_id'])['content']; ?> 
                        </textarea>
                        <input type="text" style="display: none;" value="<?php echo $_POST['post_id'] ?>" name= "edited_post_id">
                        <br>
                        <button type="submit" class="btn btn-success" name="submit_post">اعمال ویرایش</button>
                    </div>    
                </form>
            <?php    
        }
        
    }

    else{
        function get_title(){
        }
        
        function get_content(){
            
        }
    }
        
    
    
?>