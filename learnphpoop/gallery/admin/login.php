<?php 
    include("../config/init.php");

    if($session->is_signed_in()) redirect("index.php");

    $username = "";
    $password = "";
    $message = "";

    if(isset($_POST["submit"])){
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $password = md5($password);

        $user = User::verify_user($username, $password);
        //print_r($user);
        if($user){
            $session->login($user);
        }else{
            //$session->message("Wrong username or password");
            //$session->check_message();
            $message = "Wrong username or password";
        }

        //$message = $session->message;
    }
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="col-md-4 col-md-offset-4">

        <h4 class="bg-danger"><?php echo $message; ?></h4>
            
        <form id="login-id" action="" method="post">
            
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
            
        </div>


        <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


        </form>


    </div>
</body>
</html>