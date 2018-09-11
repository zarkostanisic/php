<?php
  include("includes/header.php"); 
  if(empty($_GET["id"])){
    redirect("photos.php");
  }

  $photo = Photo::find_by_id($_GET["id"]);
  
  if(!$photo){
    redirect("photos.php");
  }

  if(isset($_POST["submit"])){
    $photo->title = $_POST["title"];
    $photo->description = $_POST["description"];

    if($photo->save()){
      $session->message("Photo " . $photo->id . " updated");

      redirect("photos.php");
    }
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
                            Edit photo
                            <small>page</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Edit photo
                            </li>
                        </ol>
                        <form method="POST" action="edit_photo.php?id=<?=$photo->id?>" enctype="multipart/form-data">
                        <div class="col-md-8">
                              <div class="form-group">
                                  <input type="text" name="title" placeholder="title" class="form-control" value="<?=$photo->title?>">
                              </div>
                              <div class="form-group">
                                  <textarea rows="20" name="description" placeholder="description" class="form-control"><?=$photo->description?></textarea>
                              </div>
                        </div>
                        
                          <div class="col-md-4" >
                              <div  class="photo-info-box">
                                  <div class="info-box-header">
                                     <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                  </div>
                              <div class="inside">
                                <div class="box-inner">
                                  <p class="text text-center">
                                    <img src="<?=$photo->photo_path() ?>">
                                  </p>
                                   <p class="text">
                                     <!-- <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26 -->
                                    </p>
                                    <p class="text ">
                                      Photo Id: <span class="data photo_id_box"><?=$photo->id?></span>
                                    </p>
                                    <p class="text">
                                      Filename: <span class="data"><?=$photo->filename?></span>
                                    </p>
                                   <p class="text">
                                    File Type: <span class="data"><?=$photo->type?></span>
                                   </p>
                                   <p class="text">
                                     File Size: <span class="data"><?=convertToReadableSize($photo->size)?></span>
                                   </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                  <div class="info-box-delete pull-left">
                                      <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
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
                              $(".photo-info-box .inside").toggle();
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
