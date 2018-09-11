<div id="menu">
	<ul>
		<li><a href="index.php">Home</a></li>
		<?php if(!$session->is_signed_in()){ ?>
		<li><a href="registration.php">Registration</a></li>
		<?php }else{ ?>
		<li><a href="logout.php">Logout</a></li>
		<?php } ?>
	</ul>
</div>