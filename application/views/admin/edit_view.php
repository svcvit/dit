<div class="modal-header">
    <h3><?php echo empty($users->id)? 'Add a new user' : 'Edit user ' .$users->name; ?></h3>
</div>

<div class="modal-body">
<?php echo validation_errors();?>
<?php echo form_open();?>
    <table class="table">
        <tr>
            <td>Name</td>
            <td><?php echo form_input('name', set_value('name', $users->name )); ?></td> 
           </tr>
             <tr>
           <td>Email</td>
             <td><?php echo form_input('email', set_value('email', $users->email )); ?></td> 
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo form_password('password'); ?></td> 
           </tr>
           <tr>
            <td>Confirm password</td>
            <td><?php echo form_password('password_confirm'); ?></td> 
           </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"');?></td>
        </tr>
    </table>    
    <?php echo form_close();?>
    
</div>