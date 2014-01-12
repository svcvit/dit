<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="author" content="">
    
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <!-- Bootstrap -->
    <link href="<?php echo site_url('css/bootstrap.css') ?>" rel="stylesheet">
     <link href="<?php echo site_url('css/style.css') ?>" rel="stylesheet">

  </head>
  <body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#">DIT</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="<?php base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo site_url('users'); ?>">Users</a></li>
                    <li><a href="<?php echo site_url('login/logout'); ?>">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

      <div class="container"> <?php echo $content_for_layout ?></div>


      
  </body>
</html>