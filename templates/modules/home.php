<?php
    function get_title(){
        return 'صفحه اصلی';
    }
    
    function get_content(){
        ?>
        <p>تعداد کاربران این سیستم <?php echo user_count(); ?> نفر است.</p>
        <?php     
            $all_posts =  get_all_posts();
            if($all_posts){
                foreach ($all_posts as $post) {?>
                    <div class="alert alert-warning" role="alert">
                            <h3><?php echo $post['content']; ?></h3>
                            <br>
                            <p><?php echo $post['publish_time'];
                                echo '&nbsp&nbsp&nbsp&nbsp&nbsp';
                                echo 'نوشته شده توسط: ' . get_user_by_id($post['user_id'])['first_name']; 
                                ?>
                            </p>
                        </div>
                <?php        
                }    
            }
    }
?>