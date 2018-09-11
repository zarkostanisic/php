<form method="POST" action="<?=route('/user/check')?>">
	<input type="email" name="email" placeholder="email">
	<input type="password" name="password" placeholder="password">
	<input type="submit" value="Login">
</form>
<?php 
	if(Session::get('errors')){
		$errors = Session::get('errors');
		foreach($errors as $error){
			echo $error . '<br/>';
		}

		Session::unset('errors');
	}
 ?>