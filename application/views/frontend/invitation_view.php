<?php
//http://tarruda.github.io/bootstrap-datetimepicker/
$name = array(
              'name'        => 'name',
              'id'          => 'username',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
              'placeholder' => 'Name'
            );
			
$surname = array(
              'name'        => 'surname',
              'id'          => '',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
              'placeholder' => 'Surname'
            );	
$media = array(
              'name'        => 'media',
              'id'          => '',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
              'placeholder' => 'Media'
            );	
$country = array(
              'name'        => 'country',
              'id'          => '',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
              'placeholder' => 'Country'
            );

$email = array(
              'name'        => 'email',
              'id'          => '',
              'value'       => '',
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
              'placeholder' => 'E-mail'
            );			

	$attributes = array(
    'class' => 'invitation',
    'style' => 'color: #fff;',
    'style' => 'font-size: 33px;',
);
echo form_open();


echo form_label('Invitation','inv',$attributes);
echo br(2);
echo form_input($name).'<br/>';
echo form_error('name');
echo form_input($surname).'<br/>';
echo form_error('surname');
echo form_input($media).'<br/>';
echo form_error('media');
echo form_input($country).'<br/>';
echo form_error('country');
echo form_input($email).'<br/>';
echo form_error('email');
echo form_hidden('vip', 'No');



?>
<div id="myContent">
	    
    <input type="radio" value="YES, I will attend" class="syncTypes" name="attend"> YES, I will attend for a press collection presentation<br><small>Swarovski Jewelry & Watches, Swarovski Crystals, Swarovski Gemstones, Atelier Swarovski and Lola & Grace</small>

	            
	<div id="contacts" style="display:none;padding:3px;top:15px;position:relative">     
	

	    
	<label class="control-label" for="">Preferred day and time:</label>
	  
	<div class="well">
        <div id="datetimepicker1" class="input-append date">
         <input data-format="yyyy-MM-dd hh:mm" name="date"  type="text"></input>
            <span class="add-on">
             <i data-time-icon="icon-time" data-date-icon="icon-calendar">
              </i>
                </span>
              </div>
            </div>
	</div>


	</div>
	<br/>
	<br/>
	<input type="radio" value="NO, I am unfortunately not able to attend" class="syncTypes" checked="checked" name="attend"> NO, I am unfortunately not able to attend
	<br/>
	<br/>





<?php
echo form_submit('submit', 'Submit');
echo form_close();
 
?>

<script>
$(function() {
    $types = $('.syncTypes');
    $contacts = $('#contacts');
    $groups = $('#groups');
    $types.change(function() {
        $this = $(this).val();
        if ($this == "YES, I will attend") {
            $groups.slideUp(200);
            $contacts.delay(200).slideDown(200);
        }
        else if ($this == "NO, I am unfortunately not able to attend") {
            $contacts.slideUp(200);
            $groups.delay(200).slideDown(200);
        }
    });
});
</script>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'en',
      pickSeconds: false
    });
  });
</script>