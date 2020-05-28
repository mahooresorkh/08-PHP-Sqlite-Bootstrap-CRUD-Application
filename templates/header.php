<!DOCTYPE html>
<html lang="fa">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <?php
      if(!function_exists('get_title')){
          function get_title(){
            return APP_TITLE;
          }
      }
    ?>

    <title><?php  echo get_title(); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo SITE_URL; ?>includes/bootstrap/css/bootstrap-rtl.css" rel="stylesheet">
    <link href="<?php echo SITE_URL; ?>includes/bootstrap/css/bootstrap-rtl-theme.css" rel="stylesheet">


    <!-- Additional CSS And javascript  -->
    <link href="<?php echo SITE_URL; ?>styles.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo SITE_URL; ?>index.js"></script> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<!-- this is for createpost page from here-->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#fancytextarea'
      });
    </script>
    <!-- to here -->
  </head>
  <body>
      
    <?php require_once('nav.php'); ?>  
    <div class="container">
