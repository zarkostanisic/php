<?php include("includes/header.php"); ?>

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
                            Photos
                            <small>page</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Photos
                            </li>
                        </ol>
                        <h4 class="bg-success"><?php echo $message; ?></h4>
                         <?php 
                            //create
                            // $photo = new Photo();
                            // $photo->title = "title 1";
                            // $photo->description = "description 1";
                            // $photo->filename = "test1.jpg";
                            // $photo->type = "jpg";
                            // $photo->size = "123";
                            // $photo->create();
                            
                            //update
                            // $photo = Photo::find_by_id(4);
                            // $photo->title = "title 1 test";
                            // $photo->description = "description 1 test";
                            // //$photo->update();
                            // $photo->save();


                            //delete
                            // $photo = Photo::find_by_id(4);
                            // $photo->delete();

                            //find all
                            $photos = Photo::find_all();


                            if(count($photos)){ ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Photo</th>
                                            <th>Type</th>
                                            <th>Size</th>
                                            <th>Comments</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach($photos as $photo){
                                                
                                                ?>
                                                <tr>
                                                    <td><?=$photo->id?></td>
                                                     <td><?=$photo->title?></td>
                                                       <td><img src="<?=$photo->photo_path()?>" height="50"></td>
                                                       <td><?=$photo->type?></td>
                                                       <td><?=convertToReadableSize($photo->size)?></td>
                                                       <td>
                                                           <a href="comments.php?photo_id=<?=$photo->id?>"><?=count(Comment::find_the_comments($photo->id))?></a>
                                                       </td>
                                                       <td>
                                                           <a href="../photo.php?id=<?=$photo->id?>" target="_blank">Show</a>
                                                           <br>
                                                           <a href="edit_photo.php?id=<?=$photo->id?>">Edit</a>
                                                           <br>
                                                           <a href="delete_photo.php?id=<?=$photo->id?>">Delete</a>
                                                       </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
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