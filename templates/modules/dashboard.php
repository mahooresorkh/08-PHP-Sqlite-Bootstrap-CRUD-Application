<?php

    function authentication_required(){
        return true;
    }
    function get_title(){
        return 'محیط کاربری';
    }
    
    function get_content(){
        if(isset($_SESSION['new_post'])){
            add_message('پست جدید با موفقیت انتشار یافت.','success');
            show_messages();
            unset($_SESSION['new_post']);
        }
        if(isset($_SESSION['edit_post'])){
            if($_SESSION['edit_post']){
                add_message('پست شما با موفقیت ویرایش گردید.','success');
                show_messages();
                unset($_SESSION['edit_post']);
            }
            else{
                add_message('اشکالی در ویرایش رخ داد!','error');
                show_messages();
                unset($_SESSION['edit_post']);
            }    
        }
        $all_my_posts =  get_posts($_SESSION['user_id']);
        if($all_my_posts){
            $code = 1;
            foreach ($all_my_posts as $post) {?>   
                <div class="jumbotron">
                    <p>
                        <h3><?php echo $post['content']; ?></h3>
                        <br>
                        <?php echo $post['publish_time'];?>
                    </p>
                    <p>
                        <form method="POST" action="<?php echo home_url('revision/editpost') ?>">  
                            <input id = "input_<?php echo $code; ?>" type="text" name = "post_id" value="<?php echo $post['id'];?>" style="display: none;">
                            <button type="submit" class="btn btn-info btn-lg">ویرایش پست</button>
                            <button id="submit_<?php echo $code; ?>" type="button" class="btn btn-danger btn-lg" onclick="deleteFunc(this)">حذف پست</button>
                        </form>  
                    </p>
                </div>
            <?php
                $code++;        
            }    
        }
    }
?>