<!DOCTYPE html>
<html>
<head>
	<title>demo</title>
</head>
<body>	

<h1 align="center">Update Form</h1>
<form method="post">
	<table border="1" align="center">
	<tr>
		<td>Username :</td>
		<td><input type="text" name="unm" value="<?php echo $ed[0]->unm; ?>"></td>
	</tr>
	<tr>
		<td>Password :</td>
		<td><input type="password" name="pass"  value="<?php echo $ed[0]->pass; ?>"></td>
	</tr>
	<tr>
		<td>Gender :</td>
		<td><input type="radio" name="gen" value="Male" 
		<?php
			if($ed[0]->gender=="Male")
			{
				echo "checked='checked'";
			}
		?>
		>Male
		<input type="radio" name="gen" value="Female"
			<?php
			if($ed[0]->gender=="Female")
			{
				echo "checked='checked'";
			}
		?>
		>Female</td>
	</tr>
	<tr>
		<td>Hobby :</td>
		<?php
		$h=$ed[0]->hobby;
		$hh=explode(",",$h);
		?>
		<td><input type="checkbox" name="ch[]" value="chess"
		<?php
			if(in_array("chess",$hh))
			{
				echo "checked='checked'";
			}
		?>
		>chess
		<input type="checkbox" name="ch[]" value="cricket"
		<?php
			if(in_array("cricket",$hh))
			{
				echo "checked='checked'";
			}
		?>
		>cricket</td>
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
					if($ed[0]->state==$st->sid)
					{
					?>
					<option selected value="<?php echo $st->sid; ?>"><?php echo $st->sname; ?></option>
					<?php
					}
					else
					{
						?>
						<option value="<?php echo $st->sid; ?>"><?php echo $st->sname; ?></option>
						<?php
					}
				}
				?>
			</select></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="updsub" value="Submit"></td>
		</tr>
	</table>
</form>

</body>
</html>