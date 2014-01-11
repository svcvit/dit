<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap -->

    <link rel="stylesheet"  type="text/css" href="<?php echo site_url('css/bootstrap.min.css')?>"/>
    <link href="<?php echo site_url('css/bootstrap-responsive.css')?>" rel="stylesheet"/>
    <link rel="stylesheet"  type="text/css" href="<?php echo site_url('css/style.css') ?>"/>


    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

    </style>




</head>

<body>


<div class="container">

    <form method="post" action="<?php echo site_url('login'); ?>"class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="email" class="input-block-level" value="<?=set_value('email')?>" placeholder="Email address">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        <br/>
        <br/>
        <?php echo validation_errors();?>
    </form>

</div> <!-- /container -->

</body>
</html>