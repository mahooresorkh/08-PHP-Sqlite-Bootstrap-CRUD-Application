<?php
    if(isset($_POST['username'])){
        if($_POST['username']=="" || $_POST['password']=="" || $_POST['repassword']=="" || $_POST['age']=="" || $_POST['phone_no']=='' || $_POST['first_name']==''|| $_POST['last_name']=='' ){
            add_message("لطفا تمام جعبه های متن را پر کنید","info");
        }
        else if($_POST['password'] != $_POST['repassword']){
            add_message("رمز عبور و تکرار آن یکسان نیست","info");
        } 
        else{
            if(user_exists($_POST['username'])){
                add_message("نام کاربری  شما تکراری است","warning");
                $_POST['username']= '';
            }
            else{

                add_users($_POST);
                do_authentication();

            }
        }
    }  

    function get_title(){
        return 'فرم ثبت نام';
    }
    function get_content(){
        ?>
            <div class="row" id = 'dv-row'>
                <div class="col-md-3" id = "dv-row-firstchild"></div>
                <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title">ثبت نام</h3>
                        </div>
                        <div class="panel-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="first_name" class="col-sm-2 control-label">نام</label>
                                <div class="col-sm-10">
                                <input class="form-control" autocomplete="off" id="first_name" placeholder="نام " name = "first_name" value="<?php 
                                if(isset($_POST['first_name'])){ 
                                    echo htmlentities($_POST['first_name']); 
                                }     
                                ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="col-sm-2 control-label">نام خانوادگی</label>
                                <div class="col-sm-10">
                                <input class="form-control" autocomplete="off" id="last_name" placeholder="نام خانوادگی" name = "last_name" value="<?php 
                                if(isset($_POST['last_name'])){ 
                                    echo htmlentities($_POST['last_name']); 
                                }     
                                ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="age" class="col-sm-2 control-label">سن</label>
                                <div class="col-sm-10">
                                <input class="form-control" autocomplete="off" id="age" placeholder="سن" name = "age" value="<?php 
                                if(isset($_POST['age'])){ 
                                    echo htmlentities($_POST['age']); 
                                }     
                                ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_no" class="col-sm-2 control-label">شماره تلفن</label>
                                <div class="col-sm-10">
                                <input class="form-control" autocomplete="off" id="phone_no" placeholder="شماره تلفن" name = "phone_no" value="<?php 
                                if(isset($_POST['phone_no'])){ 
                                    echo htmlentities($_POST['phone_no']); 
                                }     
                                ?>">
                                </div>
                            </div>
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
                                <label for="rePassword" class="col-sm-2 control-label">تکرار رمز عبور</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" autocomplete="off"  id="repassword" placeholder="تکرار رمز عبور" name = "repassword" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">تایید</button>
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