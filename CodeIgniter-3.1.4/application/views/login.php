<!DOCTYPE html>
<html>
<head>
	<title>Login demo</title>
</head>
<body>	

<h1 align="center">Login Form</h1>
<h1><?php echo $this->session->flashdata('logmsg'); ?></h1>
<form method="post">
	<table border="1" align="center">
	<tr>
		<td>Username :</td>
		<td><input type="text" name="unm"></td>
	</tr>
	<tr>
		<td>Password :</td>
		<td><input type="password" name="pass"></td>
	</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="log_sub" value="Submit"></td>
		</tr>
	</table>
</form>

</body>
</html>