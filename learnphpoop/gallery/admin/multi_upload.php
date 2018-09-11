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
                            Multi Upload
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
                            <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
                            <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
                            <form action="./includes/multi_upload.php" class="dropzone"></form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>