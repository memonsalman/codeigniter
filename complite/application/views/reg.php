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
<h1 align="center">Register Form</h1>

 <?php 
 if($this->session->flashdata('allredy')) { 
 	
 	$a=$this->session->flashdata('allredy'); 
    
    echo "<script>alert('$a')
			window.history.back();
    </script>"; 

    }
    ?>




<!-- <h1><?php echo $this->session->flashdata('allredy'); ?></h1> -->
	
<?php echo validation_errors(); ?>
<form method="post" data-bvalidator-validate>
	<table border="0" align="center">
	<tr>
		<td>Name :</td>
		<td><input type="text" name="ename" data-bvalidator="required" value="<?php echo set_value('ename'); ?>"></td>
		<td><?php echo form_error('ename'); ?></td>
	</tr>
	<tr>
		<td>Email :</td>
		<td><input type="text" name="eemail" data-bvalidator="required,email"></td>
		<td><?php echo form_error('eemail'); ?></td>
	</tr>
	<tr>
		<td>Gender :</td>
		<td><input type="radio" name="gender" value="Male" data-bvalidator="required">Male
		<input type="radio" name="gender" value="Female">Female</td>
				<td><?php echo form_error('gender'); ?></td>
	</tr>

	<tr>
		<td>Marital Status :</td>
		<td><input type="radio" name="marsta" value="Married" data-bvalidator="required">Married
		<input type="radio" name="marsta" value="UnMarried">Un Married</td>
		<td><?php echo form_error('marsta'); ?></td>
	</tr>
	 
	<tr id="textboxes" style="display: none">
		<td>Marriage daate :</td>
	<td><input type="text" name="marridate" id="datepicker" data-bvalidator="required" value="<?php echo set_value('marridate'); ?>"></td>
		<td><?php echo form_error('marridate'); ?></td>
	</tr>
	</div>

	<tr>
		<td>Salaray :</td>
		<td><input type="text" name="salary" data-bvalidator="required,number" value="<?php echo set_value('salary'); ?>"></td>
		<td><?php echo form_error('salary'); ?></td>

	</tr>
	


	
		<tr>
			<td>country :</td>
			<td><select name="country" id="country_details" data-bvalidator="required" onchange="test(this.value)">
				<option value="">---select country---</option>
				<?php
				foreach($cou as $co)
				{
					?>
					<option value="<?php echo $co->cid; ?>"><?php echo $co->cname; ?></option>
					<?php
				}
				?>
			</select></td>
		</tr>
		<tr>
			<td>state :</td>


			 <td><select name="state" data-bvalidator="required"  id="old_state">
				<option value="">---select state---</option>
				
			</select></td>
		</tr>


		<tr>
		<td>About :</td>
		<td><textarea name="about" data-bvalidator="required" ><?php echo set_value('about'); ?></textarea>
		
		<td><?php echo form_error('about'); ?></td>
	</tr>

	<tr>
		<td>Hobby :</td>
		<td>
		<?php foreach($hob as $ch) 
		{
		?>
		<input type="checkbox" name="ch[]" value="<?php echo $ch->hid;?>"><?php echo $ch->hname;?>
		<?php
		}
		?>
		</td>
	</tr>

	<tr>
		<td>Status :</td>
		<td><input type="radio" name="satauts" data-bvalidator="required" value="Active">Acitve
		<input type="radio" name="satauts" value="InActive">In Acitve</td>
	</tr>
	


		<tr>
			<td align="center" colspan="2"><input type="submit" name="sub" value="Submit"></td>
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



</body>
</html>