<?php
  include("includes/header.php"); 
  if(empty($_GET["id"])){
    redirect("users.php");
  }

  $user = User::find_by_id($_GET["id"]);

  $message = "";
  
  if(!$user){
    redirect("users.php");
  }

  if(isset($_POST["submit"])){
    $method = "update";
    if(!empty($_FILES["file"]["name"])){
      $method = "save_user_and_image";

      $file = $_FILES["file"];
      $user->set_file($file);
    }

    $user->username = $_POST["username"];
    if(!empty($_POST["password"])) $user->password = md5($_POST["password"]);
    $user->first_name = $_POST["first_name"];
    $user->last_name= $_POST["last_name"];
    
    if($user->$method()){
      $session->message("User " . $user->id . " updated");
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
            <?php include("includes/photo_library_modal.php");  ?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit user
                            <small>page</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Edit user
                            </li>
                        </ol>
                        <form method="POST" action="edit_user.php?id=<?=$user->id?>" enctype="multipart/form-data">
                        <div class="col-md-8">
                              <h4 class="bg-danger"><?php echo $message; ?></h4>
                              <div class="form-group">
                                    <input type="text" name="username" placeholder="username" class="form-control" value="<?=$user->username?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="new password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="first_name" placeholder="first name" class="form-control" value="<?=$user->first_name?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" placeholder="last name" class="form-control" value="<?=$user->last_name?>">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file">
                                </div>
                        </div>
                        
                          <div class="col-md-4" >
                              <div  class="user-info-box">
                                  <div class="info-box-header">
                                     <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                  </div>
                              <div class="inside">
                                <div class="box-inner">
                                  <p class="text text-center">
                                    <a  data-toggle="modal" data-target="#photo-library" href=""><img src="<?=$user->photo_path() ?>" id="user-image"></a>
                                  </p>
                                   <p class="text">
                                     <!-- <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26 -->
                                    </p>
                                    <p class="text ">
                                      user Id: <span class="data user_id_box"><?=$user->id?></span>
                                    </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                  <div class="info-box-delete pull-left">
                                      <a id="user-id" data-id="<?=$user->id?>" href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                  </div>
                                  <div class="info-box-update pull-right ">
                                      <input type="submit" name="submit" value="update" class="btn btn-primary btn-lg ">
                                  </div>   
                                </div>
                              </div>          
                          </div>
                          <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
                          <script>tinymce.init({ selector:'textarea' });</script>
                          <script type="text/javascript">
                            $("#toggle").click(function(){
                              $(this).toggleClass("glyphicon-menu-down");
                              $(this).toggleClass("glyphicon-menu-up");
                              $(".user-info-box .inside").toggle();
                            });
                          </script>
                          </form>
                      </div>
                    </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
