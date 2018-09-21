<?php 
	if(isset($errors) && count($errors)){
		?>
		<ul>
			<?php
				foreach($errors as $error){
			?>
				<li><?php echo $error; ?></li>
			<?php
				}
			?>
		</ul>
		<?php
	}
?>