<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <?php echo APP_TITLE; ?>
        </a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo home_url(); ?>">صفحه اصلی</a></li>
          <li><a href="<?php echo home_url('dashboard'); ?>">صفحه کاربری</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if(is_user_logged_in()) { ?>
              <li><a href="<?php echo home_url('createpost'); ?>">ایجاد پست جدید</a></li>
              <li><a href="<?php echo home_url('logout'); ?>">خروج</a></li>
          <?php }
          else{ ?>
            <li><a href="<?php echo home_url('login'); ?>">ورود</a></li>
          <?php } ?>
        </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
     