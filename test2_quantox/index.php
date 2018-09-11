<?php
	include("./core/core.php");
	include("./class/user.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Index</title>

 	<?php include("./includes/head.php") ?>
 </head>
 <body>
 	<div id="header">
 	<?php include("./includes/menu.php") ?>
 	<?php include("./includes/search_form.php"); ?>
 	</div>
 	<?php  
 		if(!$session->is_signed_in()){
 			include("./includes/login_form.php");
 		} 
 	?>
 	<h1>Users</h1>
 	<?php 
 		$user = new User();
 		$users = (!isset($_GET["q"]) || empty($_GET["q"])) ? $user->find_all() : $user->find_by_string("name", $_GET["q"]);
 		if(count($users)){ 
 	?>
 		<table>
	 		<thead>
	 			<tr>
	 				<th>Id</th>
	 				<th>Name</th>
	 			</tr>
	 		</thead>
 		<?php
 			foreach($users as $user){
 		?>
			 		<tbody>
			 			<tr>
			 				<td><?=$user->id?></td>
			 				<td><?=$user->name?></td>
			 			</tr>
			 		</tbody>
 			<?php } ?>
 		</table>
 	<?php }else{ ?>
 		No results.
 	<?php } ?>
 </body>
 </html>