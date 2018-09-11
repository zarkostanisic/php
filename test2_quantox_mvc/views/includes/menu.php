<ul class="nav">
	<li><a href="<?=route('/')?>">Home</a></li>
	<?php if(Session::isLogged()){ ?>
		<li><?=Session::get('email')?></li>
		<li><a href="<?=route('/user/logout')?>">Logout</a></li>
		<?php } ?>
	<?php if(!Session::isLogged()){ ?>
	<li><a href="<?=route('/user/login')?>">Login</a></li>
	<li><a href="<?=route('/user/register')?>">Register</a></li>
	<?php } ?>
	<li>
		<?php require_once('search_form.php'); ?>
	</li>
</ul>