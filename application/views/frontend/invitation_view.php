<?php
//http://tarruda.github.io/bootstrap-datetimepicker/
echo validation_errors();
echo form_fieldset('Digital Invitation Tool');
echo form_open();

echo form_label('Name', 'name');
echo form_input('name');
echo form_label('Surname', 'surname');
echo form_input('surname');
echo form_label('Media', 'media');
echo form_input('media');
echo form_label('E-mail', 'email');
echo form_input('email');
echo form_hidden('vip', 'no');




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
	<input type="radio" value="NO, I am unfortunately not able to attend " class="syncTypes" checked="checked" name="attend"> NO, I am unfortunately not able to attend
	<br/>
	<br/>





<?php
echo form_submit('submit', 'Submit', 'class="btn btn-info"');
echo form_close();
echo form_fieldset_close(); 
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
        else if ($this == "groups") {
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