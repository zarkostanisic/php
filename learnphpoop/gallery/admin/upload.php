<?php 
    include("includes/header.php");

    $title = "";
    $description = "";
    $message = "";

    if(isset($_POST["submit"])){
        $file = $_FILES["file"];

        $photo = new Photo();
        $photo->title = $_POST["title"];
        $photo->description = $_POST["description"];
        $photo->set_file($file);
        
        if($photo->save()){
            $session->message("Photo " . $photo->id . " created");

            redirect("photos.php");
        }
        else $message = join("<br/>", $photo->errors);
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
                            Upload
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
                            <form method="POST" action="upload.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="title" placeholder="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file">
                                </div>
                                <div class="form-group">
                                    <textarea name="description" placeholder="description" class="form-control"></textarea>
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