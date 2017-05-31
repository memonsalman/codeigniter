<!DOCTYPE html>
<html>
<head>
	<title>Demo Homepage</title>
	
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
	else
	{
		redirect("control/logged");
	}
?>
<h3 align="right"><?php echo anchor("control/logt","Logout"); ?></h3>
<h1><?php echo $this->session->flashdata('msg'); ?></h1>
	<table border="1" align="center">
		<tr>
			<td>id</td>
			<td>username</td>
			<td>password</td>
			<td>gender</td>
			<td>hobby</td>
			<td>state</td>
			<td colspan="2" align="center">Action</td>
		</tr>
		<?php
		$i=1;
		foreach($hom as $hm)
		{
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $hm->unm; ?></td>
			<td><?php echo $hm->pass; ?></td>
			<td><?php echo $hm->gender; ?></td>
			<td><?php echo $hm->hobby; ?></td>
			<td><?php echo $hm->sname; ?></td>
			<td><?php echo anchor("control/del/".$hm->rid,"Delete"); ?></td>
			<td><?php echo anchor("control/edt/".$hm->rid,"Edit"); ?></td>
		</tr>
		<?php
		$i++;
			}
		?>
	</table>
</body>
</html>