<?php
    if(isset($_POST['username'])){
        if($_POST['username']=="" || $_POST['password']==""){
            add_message("لطفا نام کاربری و رمز عبور را وارد کنید","info");
        }
        else{
            do_authentication();
        } 
    }  

    function get_title(){
        return 'فرم ورود به برنامه ';
    }
    function get_content(){
        ?>
            <div class="row" id = 'dv-row'>
                <div class="col-md-3" id = "dv-row-firstchild"></div>
                <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title">ورود به سیستم</h3>
                        </div>
                        <div class="panel-body">
                        <form class="form-horizontal" method="POST" onsubmit="submitFunc(event)">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">نام کاربری</label>
                                <div class="col-sm-10">
                                <input class="form-control" autocomplete="off" id="username" placeholder="نام کاربری" name = "username" value="<?php 
                                if(isset($_POST['username'])){ 
                                    echo htmlentities($_POST['username']); 
                                }     
                                ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Password" class="col-sm-2 control-label">رمز عبور</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" autocomplete="off"  id="password" placeholder="رمز عبور" name = "password" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">ورود</button>
                                <a class="btn btn-success" href="<?php echo home_url('register'); ?>" role="button">ثبت نام</a>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        <?php    
    }
?>

