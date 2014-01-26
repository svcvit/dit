<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Singnup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap -->

    <link rel="stylesheet"  type="text/css" href="<?php echo site_url('css/bootstrap.min.css')?>"/>
    <link href="<?php echo site_url('css/bootstrap-responsive.css')?>" rel="stylesheet"/>
    <link rel="stylesheet"  type="text/css" href="<?php echo site_url('css/style_admin.css') ?>"/>


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
<?php
$name = array(
              'name'        => 'name',
              'id'          => 'name',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'class'       => 'input-block-level',
              'placeholder' => 'Name'
            );

$country = array(
              'name'        => 'country',
              'id'          => 'country',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'class'       => 'input-block-level',
              'placeholder' => 'Country'
            );
$email = array(
              'name'        => 'email',
              'id'          => 'email',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'class'       => 'input-block-level',
              'placeholder' => 'E-mail'
            );

$password = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'class'       => 'input-block-level',
              'placeholder' => 'Password'
            );

$password_confirm = array(
              'name'        => 'password_confirm',
              'id'          => 'password_confirm',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'class'       => 'input-block-level',
              'placeholder' => 'Confirm password'
            );

echo form_open('login/singnup','class="form-signin"');

echo '<span class="label label-important">';        

echo "</span>";
echo heading('Please Sign Up', 2, 'class="form-signin-heading"');
echo form_input($name);
echo form_error('name');
echo form_input($country);
echo form_error('country');
echo form_input($email);
echo form_error('email');
echo form_password($password);
echo form_error('password');
echo form_password($password_confirm);
echo form_error('password_confirm');
echo br(2);
echo form_submit('submit', 'Sign Up', 'class="btn btn-large btn-primary"');

echo form_close();




?>
</body>
</html>