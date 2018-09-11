<!DOCTYPE html>
<html>
<head>
	<?php require_once('../views/includes/head.php'); ?>
</head>
<body>
	<?php require_once('../views/includes/menu.php'); ?>

	<hr>

	<?php if(Session::isLogged()){ ?>
		<?php if(count($users)){ ?>
		<table>
			<tr>
				<th>Name</th>
				<th>Email</th>
			</tr>
			<?php foreach($users as $user){ ?>
				<tr>
					<td><?=$user['name']?></td>
					<td><?=$user['email']?></td>
				</tr>
			<?php } ?>
		</table>
		<?php }else{ ?>
			<p>No result</p>
		<?php } ?>
	<?php }else{ ?>
		<p>To see result you must be logged:</p>
		<?php require_once('login_form.php'); ?>
	<?php } ?>
</body>
</html>