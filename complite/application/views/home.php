<!DOCTYPE html>
<html>
<head>
	<title>Demo Homepage</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>bvalidator/jquery.bvalidator.min.js"></script>


<script src="<?php echo base_url();?>bvalidator/themes/presenters/default.min.js"></script>
<script src="<?php echo base_url();?>bvalidator/themes/gray/gray.js"></script>
  <script src="<?php echo base_url();?>datepicker-master/dist/datepicker.js"></script>
<link href="<?php echo base_url();?>/bvalidator/themes/gray/gray.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url();?>datepicker-master/dist/datepicker.css">
</head>
<body>
<h1 align="center">Homepage</h1>
<?php
	if($this->session->userdata('user'))
	{
?>
<h2 align="center">Welcome <?php echo $this->session->userdata('user'); ?></h2>
<?php
	}
	
?>
<?php 
 if($this->session->flashdata('success')) { 
 	
 	$a=$this->session->flashdata('success'); 
    ?>
    <h3 style="text-align: center; color: green"><?php echo $a; ?></h3> 
    <?php
    }
    ?>


<?php 
 if($this->session->flashdata('Update')) { 
 	
 	$a=$this->session->flashdata('Update'); 
    ?>
    <h3 style="text-align: center; color: green"><?php echo $a; ?></h3> 
    <?php
    }
    ?>

    <?php 
 if($this->session->flashdata('delete')) { 
 	
 	$a=$this->session->flashdata('delete'); 
    ?>
    <h3 style="text-align: center; color: green"><?php echo $a; ?></h3> 
    <?php
    }
    ?>





<h1><?php echo $this->session->flashdata('allredy'); ?></h1>
<h4><a href="<?php echo base_url('welcome/index');?>">Add New</a></h4>
<h1><?php echo $this->session->flashdata('serchero'); ?></h1>
<!-- 	<table border="1" align="center">
		<tr>
			<td>id</td>
			<td>Name</td>
			<td>Email</td>
			<td>Gender</td>
			<td>Country</td>
			<td>State</td>
			<td>Status</td>
			<td colspan="2" align="center">Action</td>
		</tr>
		<?php
		$i=1;
		foreach($hom as $hm)
		{
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $hm->ename; ?></td>
			<td><?php echo $hm->eemail; ?></td>
			<td><?php echo $hm->gender; ?></td>
			<td><?php echo $hm->cname; ?></td>
			<td><?php echo $hm->sname; ?></td>
			<td><?php echo $hm->satauts; ?></td>

			<td><?php echo anchor("Welcome/del/".$hm->eid,"Delete"); ?></td>
			<td><?php echo anchor("Welcome/edt/".$hm->eid,"Edit"); ?></td>
		</tr>
		<?php
		$i++;
			}
		?>
	</table> -->


<div>
	<form method="post" action="<?php echo base_url('Welcome/serch'); ?>">
		 Name: <input type="text" placeholder="Name" class="form-control" id="title" name="title">
		 Email: <input type="text" placeholder="Email" class="form-control" id="title" name="title2" data-bvalidator="email"> 
		 Gender:
		 		<input type="radio" name="title3" value="">All
		 		<input type="radio" name="title3" value="Male">Male
		 		<input type="radio" name="title3" value="Female">Female
		country : <select name="title4" id="country_details">
		<option value="">---select country---</option>
				<?php
				foreach($cou as $co)
				{
					?>
					<option value="<?php echo $co->cid; ?>"><?php echo $co->cname; ?></option>
					<?php
				}
				?>
			</select>
		State : <select name="title5" id="old_state">
		<option value="">---select State---</option>
				<?php
				foreach($stt as $st)
				{
					?>
					<option value="<?php echo $st->sid; ?>"><?php echo $st->sname; ?></option>
					<?php
				}
				?>
			</select>	
			Status:<input type="radio" name="title6" value="Active">Active
		 		<input type="radio" name="title6" value="InActive">InActive




		<input type="submit" name="serch" class="btn btn-primary"  >
	</form>
</div>

                


	
	
	<?php 

	if(!empty($data))
	{
		echo "string";
	}
	else
	{
		?>
	<div class="paging"><?php echo $pagination; ?></div>
	<div class="data"><?php echo $table; ?></div>		
	<div class="paging"><?php echo $pagination; ?></div>
	<?php
	}
	?>



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
    $(document).ready(function () {
        $('form').bValidator();
    });
</script>

</body>
</html>