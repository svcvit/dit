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
     <link href="<?php echo site_url('css/style_admin.css') ?>" rel="stylesheet">

  </head>
  <body>
    <?php if($_SESSION) {?>  
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#">DIT</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <?php if($admin == 'admin'){ ?><li><a href="<?php echo site_url('users'); ?>">Users</a></li><?php }else{ ?><li><a href="<?php echo site_url('dashboard/links'); ?>">Links</a></li><?php } ?>
                    <li><a href="<?php echo site_url('login/logout'); ?>">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
    <?php }?>
      <div class="container"> <?php echo $content_for_layout ?></div>


      
  </body>
</html>