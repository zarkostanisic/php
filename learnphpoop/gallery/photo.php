<?php include("includes/header.php");

    $photo = Photo::find_by_id($_GET["id"]);

    $author = "";
    $body = "";

    if(isset($_POST["submit"])){
        $author = trim($_POST["author"]);
        $body = trim($_POST["body"]);

        $comment = Comment::create_comment($photo->id, $author, $body);
        $comment->save();
    }

    $comments = Comment::find_the_comments($_GET["id"]);
 ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?=$photo->title?></h1>

                <!-- Author -->
                <!-- <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p> -->

                <hr>

                <!-- Date/Time -->
                <!-- <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr> -->

                <!-- Preview Image -->
                <img class="img-responsive" src="<?=$photo->photo_path()?>" alt="" style="width: 100%; display: block;">
    
                <hr>

                <!-- Post Content -->
                <p><?=$photo->description?></p>

                <hr>

                 <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="POST" action="photo.php?id=<?=$photo->id?>">
                        <div class="form-group">
                           <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary">
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php if(count($comments)){ ?>
                    <?php foreach($comments as $comment){ ?>
                        <div class="media">
                            <!-- <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a> -->
                            <div class="media-body">
                                <h4 class="media-heading">Author: <strong><?=$comment->author?></strong>
                                    <!-- <small>August 25, 2014 at 9:30 PM</small>
         -->                        </h4>
                                <?=$comment->body?>
                            </div>
                        </div>
                    <?php } ?>
                <?php  } ?>
          
         

            </div>




            <!-- Blog Sidebar Widgets Column -->
           <!--  <div class="col-md-4"> -->

            
                 <?php //include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
