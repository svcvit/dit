<?php
//http://tarruda.github.io/bootstrap-datetimepicker/
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
echo form_hidden('vip', 'yes');
?>
<div id="myContent">
	    
	<input type="radio" value="ja ich komme" class="syncTypes" name="answer"> ja ich komme<br>

	            
	<div id="contacts" style="display:none;padding:3px;top:15px;position:relative">     
	<label class="checkbox">
	<input type="checkbox" name="interview" value="ja, ich würde gerne eine interview führen">ja, ich würde gerne eine interview führen<br/>
	</label>

	<label class="checkbox">
	<input type="checkbox" name="tour" value="ja, ich würde gerne ein Standrundführung bekommen">ja, ich würde gerne ein Standrundführung bekommen
	</label>
	<label class="checkbox">
	<input type="checkbox" >andere </label>

	    <input type="text" name="other" placeholder="Text input">
	    
	    <label class="control-label" for="">am gewünschten datum</label>
	  
	<input class="datepicker" name="date" type="text">
	<span class="add-on"><i class="icon-calendar"></i></span>

	</div>


	</div>
	<br/>
	<br/>
	<input type="radio" value="groups" class="syncTypes" name="answer"> Nein, ich komme nicht
	<br/>
	<br/>





<?php
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
        if ($this == "ja ich komme") {
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

<script type="text/javascript" language="javascript">
 $(document).ready(function() {
     $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
 });
	 </script>