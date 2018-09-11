<?php include("includes/header.php");

    $current_page = !empty($_GET["page"]) ? (int)$_GET["page"] : 1;
    $items_per_page = 3;
    $items_total_count = Photo::count()->count;

    $paginate = new Paginate($current_page, $items_per_page, $items_total_count);
    //$paginate->class = "pager";

    // $photos = Photo::find_by_query("SELECT * 
    //     FROM photos 
    //     LIMIT " . $items_per_page . "
    //     OFFSET " . $paginate->offset()
    // );

    // $photos = Photo::find_all();
    $photos = Photo::find_all_with_paginate($items_per_page, $paginate->offset());
 ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
            <?php 
                if(count($photos)){
                    foreach($photos as $photo){
                    ?>
                        <div class="col-md-4">
                            <a href="photo.php?id=<?=$photo->id?>">
                                <img class="img-thumbnail img-responsive" src="<?=$photo->photo_path()?>" style="width: 100%; height:225px; display: block;">
                            </a>
                        </div>
                    <?php
                    }
                }
             ?>
    
            
          
            

            </div>

            <div class="col-md-12">
                <?php 
                    echo $paginate->render();

                ?>
            </div>




            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4"> -->

            
                 <?php //include("includes/sidebar.php"); ?>





        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
