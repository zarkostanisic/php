<?php 

$errors = array();

if(isset($_POST["login"])){
	$email = trim($_POST["email"]);
	$password = trim($_POST["password"]);
	$password = md5($password);

	$user = User::verify($email, $password);

	if($user){
        $session->login($user);
    }else{
        $errors[] = "Wrong username or password";
    }
 }
?>
<h1>Login</h1>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
	Email:<input type="text" name="email"><br/>
	Password:<input type="password" name="password"><br/>
	<input type="submit" name="login" value="Login">
</form>
<?php include("errors.php"); ?>