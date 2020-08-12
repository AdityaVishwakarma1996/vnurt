<?php
session_start()

?>



<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
	<?php include 'links.php' ?>
</head>
<body>
<?php
	include 'dbcon.php';

if (isset($_POST['submit'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$email_search = "select *from registration where email='$email' and status='active' ";

	$query = mysqli_query($con,$email_search);

	$email_count = mysqli_num_rows($query);

	if ($email_count) {
		$email_pass =mysqli_fetch_assoc($query);

		$db_pass = $email_pass['password'];

		$_SESSION['email'] = $email_pass['email'];
		$pass_decode = password_verify($password, $db_pass);
		if($pass_decode){
			echo "login success";
			?>
			<script>
				location.replace("home.php");
			</script>
			<?php
		}else{
			echo "password incorrect";
		}

		
		
		
	}
}
?>
 

	
	
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" name="form" action="" method="POST">
	<table align="center">

		<tr>
		<td>email address</td>
			<td><input type="text" placeholder="Email" name="email" required=""></td>
		</tr>
		<tr>
			<td>password</td>
			<td> <input type="text" placeholder="Password" name="password" required=""></td>
		</tr>
		<tr>
		<td>Sign in</td>
		<td><a href="#"> <input type="submit" name="submit" value="SignIN"></a></td>
		</tr>

	</form>
	</table>
	</body>
</html>