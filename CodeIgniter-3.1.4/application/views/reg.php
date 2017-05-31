<!DOCTYPE html>
<html>
<head>
	<title>demo</title>
	<link href="<?php echo base_url();?>/assets/css/reg.css" rel="stylesheet">

</head>
<body>
<h1 align="center">Register Form</h1>
<h1><?php echo $this->session->flashdata('msg'); ?></h1>
<h3 align="right"><?php echo anchor("control/logged","Login here"); ?></h3>
<?php echo validation_errors(); ?>
<form method="post">
	<table border="0" align="center">
	<tr>
		<td>Username :</td>
		<td><input type="text" name="unm" value="<?php echo set_value('unm'); ?>"></td>
		<td><?php echo form_error('unm'); ?></td>
	</tr>
	<tr>
		<td>Password :</td>
		<td><input type="password" name="pass"></td>
		<td><?php echo form_error('pass'); ?></td>
	</tr>
	<tr>
		<td>Gender :</td>
		<td><input type="radio" name="gen" value="Male">Male
		<input type="radio" name="gen" value="Female">Female</td>
	</tr>
	<tr>
		<td>Hobby :</td>
		<td><input type="checkbox" name="ch[]" value="chess">chess
		<input type="checkbox" name="ch[]" value="cricket">cricket</td>
	</tr>
		<tr>
			<td>country :</td>
			<td><select name="ct" onchange="test(this.value)">
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
			<td><select name="st" id="stt">
				<option value="">---select state---</option>
				<?php
				foreach($stt as $st)
				{
					?>
					<option value="<?php echo $st->sid; ?>"><?php echo $st->sname; ?></option>
					<?php
				}
				?>
			</select></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="sub" value="Submit"></td>
		</tr>
	</table>
</form>

</body>
</html>