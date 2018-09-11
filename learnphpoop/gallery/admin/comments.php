<?php 
    include("includes/header.php"); 
    if(empty($_GET["photo_id"])){
        $comments = Comment::find_all();
    }else{
        $photo = Photo::find_by_id($_GET["photo_id"]);
        $comments = Comment::find_the_comments($photo->id);
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
                            Comments
                            <small>page</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Comments
                            </li>
                        </ol>
                        <h4 class="bg-success"><?php echo $message; ?></h4>
                        <?php if(!empty($photo->id)){ ?>
                            <div class="col-md-4">
                                <p>Photo id: <strong><?=$photo->id?></strong></p>
                                <img class="img-responsive" src="<?=$photo->photo_path()?>">
                            </div>
                        <?php } ?>
                         <?php 


                            if(count($comments)){ ?>
                                <div class="col-md-<?=empty($photo->id) ? 12 : 8?>">
                                <div class="table-responsive">
                                    
                                    
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Photo id</th>
                                            <th>Author</th>
                                            <th>Body</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach($comments as $comment){
                                                
                                                ?>
                                                <tr>
                                                    <td><?=$comment->id?></td>
                                                     <td><?=$comment->photo_id?></td>
                                                       <td><?=$comment->author?></td>
                                                       <td><?=$comment->body?></td>
                                                       <td>
                                                           <a href="delete_comment.php?id=<?=$comment->id?><?=!empty($photo->id) ? "&photo_id=" . $photo->id : ""?>">Delete</a>
                                                       </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            <?php }else{ ?>
                                <p>No results</p>
                            <?php }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>