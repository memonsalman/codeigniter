<!DOCTYPE html>
<html>
<head>
	<title>demo</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>bvalidator/jquery.bvalidator.min.js"></script>


<script src="<?php echo base_url();?>bvalidator/themes/presenters/default.min.js"></script>
<script src="<?php echo base_url();?>bvalidator/themes/gray/gray.js"></script>
  <script src="<?php echo base_url();?>datepicker-master/dist/datepicker.js"></script>
<link href="<?php echo base_url();?>/bvalidator/themes/gray/gray.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url();?>datepicker-master/dist/datepicker.css">
</head>
<body>	

<h1 align="center">Update Form</h1>
<form method="post">
	
	<table border="1" align="center">
	
		<tr>
		<td>Username :</td>
		<td><input type="text" name="ename" data-bvalidator="required"  value="<?php echo $ed[0]->ename; ?>"></td>
		
	</tr>
	<tr>
		<td>Email :</td>
		<td><input type="text" name="eemail" data-bvalidator="required,email" value="<?php echo $ed[0]->eemail; ?>"></td>
		
	</tr>


	<tr>
		<td>Gender :</td>
		<td><input type="radio" name="gender" data-bvalidator="required" value="Male" 
		<?php
			if($ed[0]->gender=="Male")
			{
				echo "checked='checked'";
			}
		?>
		>Male
		<input type="radio" name="gender" value="Female"
			<?php
			if($ed[0]->gender=="Female")
			{
				echo "checked='checked'";
			}
		?>
		>Female</td>
	</tr>


	<tr>
		<td>Marital Status :</td>
		<td><input type="radio" name="marsta" data-bvalidator="required" value="Married" 
		<?php
			if($ed[0]->marsta=="Married")
			{
				echo "checked='checked'";
			}
		?>
		>Married
		<input type="radio" name="marsta" value="Female"
			<?php
			if($ed[0]->marsta=="UnMarried")
			{
				echo "checked='checked'";
			}
		?>
		>Un Married</td>
	</tr>
	<tr id="textboxes" style="display: none">
		<td>Marriage date :</td>
	<td><input type="text" name="marridate" id="datepicker" data-bvalidator="required" value="<?php echo $ed[0]->marridate; ?>"></td>
		</td>
	</tr>

<tr>
		<td>Salaray :</td>
		<td><input type="text" name="salary"  data-bvalidator="required,number"value="<?php echo $ed[0]->salary; ?>"></td>
		

	</tr>


		<tr>
			<td>country :</td>
			<td><select name="country" id="country_details" data-bvalidator="required" onchange="test(this.value)">
				<option value="">---select country---</option>
				<?php
				foreach($cou as $co)
				{
					if($ed[0]->country==$co->cid)
					{
					?>
					<option selected value="<?php echo $co->cid; ?>"><?php echo $co->cname; ?></option>
					<?php
					}
					else
					{
						?>
						<option value="<?php echo $co->cid; ?>"><?php echo $co->cname; ?></option>
						<?php
					}
				}
				
				?>
			</select></td>
		</tr>
		<tr>
			<td>state :</td>
			<td><select name="state" data-bvalidator="required" id="old_state">
				<option value="">---select state---</option>
				<?php
				foreach($stt as $st)
				{
					if($ed[0]->state==$st->sid)
					{
					?>
					<option selected value="<?php echo $st->sid; ?>"><?php echo $st->sname; ?></option>
					<?php
					}
					else
					{
						?>
						<!-- <option value="<?php echo $st->sid; ?>"><?php echo $st->sname; ?></option> -->
						<?php
					}
				}
				?>
			</select></td>
		</tr>

		<tr>
		<td>About :</td>
		<td><textarea name="about" data-bvalidator="required"><?php echo $ed[0]->about ?></textarea>
		
		</td>
	</tr>

	<tr>
		<td>Hobby :</td>
		<?php
		$h=$ed[0]->hobbies;
		$focus=explode(",",$h);

		?>
		<td>
		<?php
		foreach ($hob as $ch) 
		{
		   $checked = '';
		    if (in_array($ch->hid,$focus))
		    {
			$checked = 'checked'; 
		    }
		    	?>
		<input <?php echo $checked; ?> type="checkbox" name="ch[]" data-bvalidator="required" value="<?php echo $ch->hid;?>"><?php echo $ch->hname;?>



		<?php
		}

		 ?>
		</td>
		
	</tr>

	<tr>
		<td>Stauts :</td>
		<td><input type="radio" data-bvalidator="required" name="satauts" value="Active" 
		<?php
			if($ed[0]->satauts=="Active")
			{
				echo "checked='checked'";
			}
		?>
		>Active
		<input type="radio" name="satauts" value="InActive"
			<?php
			if($ed[0]->satauts=="InActive")
			{
				echo "checked='checked'";
			}
		?>
		>InActive</td>
	</tr>




		<tr>
			<td align="center" colspan="2"><input type="submit" name="updsub" value="Submit"></td>
		</tr>
	</table>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('form').bValidator();
    });
</script>

 <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<script type="text/javascript">
  $(function() {
    $('input[name="marsta"]').on('click', function() {
        if ($(this).val() == 'Married') {
            $('#textboxes').show();
        }
        else {
            $('#textboxes').hide();
        }
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#country_details').on('change',function(){

            country_details=$(this).val();

              //alert(country_details);
             if(country_details=='')
             {
                 $('#old_state').prop('disabled',true);
             }
             else
             {
                 $('#old_state').prop('disabled',false);
                 $.ajax({
                      type: "POST",
                      url: "<?php echo base_url();?>welcome/ajaxa",
                     data: {'country_details':country_details},
                     dataType:'json',
                      success: function(data){
                 $('#old_state').html(data);
            },
          error:function(){
              alert('ok ofdaf');  
          }
});
            

         }
         });
     });

</script>


<script type="text/javascript">
	$(function(){
    $(':radio').click(function() {
        $('#' + $(this).attr('class')).fadeIn().siblings('div').hide();
    })
    .filter(':checked').click();
});
</script>



</body>
</html>