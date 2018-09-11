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
                            Users
                            <small>page</small>
                        </h1>
                        <p>
                            <a href="add_user.php" class="btn btn-primary">Add user</a>
                        </p>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Users
                            </li>
                        </ol>
                        <h4 class="bg-success"><?php echo $message; ?></h4>
                        <?php 
                            //create
                            // $user = new User();
                            // $user->username = "zarkostanisic";
                            // $user->password = md5("8panama8");
                            // $user->first_name = "zarko";
                            // $user->last_name = "stanisic";
                            // $user->create();
                            
                            //update
                            // $user = User::find_by_id(22);
                            // $user->first_name = "zarko";
                            // $user->last_name = "stanisic";
                            // //$user->update();
                            // $user->save();


                            //delete
                            // $user = User::find_by_id(22);
                            // $user->delete();

                            //find all
                            $users = User::find_all();


                            if(count($users)){ ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Photo</th>
                                            <th>Username</th>
                                            <th>First name</th>
                                            <th>Lastname</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach($users as $user){
                                                
                                                ?>
                                                <tr>
                                                    <td><?=$user->id?></td>
                                                    <td><img src="<?=$user->photo_path()?>" height="80"></td>
                                                     <td><?=$user->username?></td>
                                                      <td><?=$user->first_name?></td>
                                                       <td><?=$user->last_name?></td>
                                                       <td>
                                                           <a href="edit_user.php?id=<?=$user->id?>">Edit</a>
                                                           <br>
                                                           <a class="delete_button" href="delete_user.php?id=<?=$user->id?>">Delete</a>
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