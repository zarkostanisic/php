<?php 
    include("includes/header.php");

    $message = "";

    if(isset($_POST["submit"])){
        $file = $_FILES["file"];

        $user = new User();
        $user->username = $_POST["username"];
        $user->password = md5($_POST["password"]);
        $user->first_name = $_POST["first_name"];
        $user->last_name= $_POST["last_name"];
        $user->set_file($file);
        
        if($user->save_user_and_image()){
            $session->message("User " . $user->id . " created");

            redirect("users.php");
        }
        else $message = join("<br/>", $user->errors);
    }
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include("includes/top_nav.php"); ?>
            <?php include("includes/side_nav.php"); ?>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add user
                            <small>page</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Upload
                            </li>
                        </ol>
                        <div class="col-md-4">
                            <h4 class="bg-danger"><?php echo $message; ?></h4>
                            <form method="POST" action="add_user.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="first_name" placeholder="first name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" placeholder="last name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file">
                                </div>
                                 <div class="form-group">
                                    <input type="submit" name="submit" value="upload" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>