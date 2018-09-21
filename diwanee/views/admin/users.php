<!DOCTYPE html>
<html>
<head>
	<?php 
		require 'includes/head.php';
	 ?>
</head>
<body>
	<?php 
		require 'includes/menu.php';
	 ?>
	<table>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>Time created</th>
		</tr>
		<?php 
			foreach($users as $user){
				?>
				<tr>
					<td><?php echo $user["id"]?></td>
					<td><?php echo $user["email"]?></td>
					<td><?php echo $user["time_created"]?></td>
				</tr>
				<?php
			}
		 ?>
	</table>
</body>
</html>