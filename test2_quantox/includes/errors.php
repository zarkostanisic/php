<?php 
if(count($errors)){ ?>
	<ul class="errors">
		<?php foreach($errors as $error){
		?>
			<li><?=$error?></li>
		<?php
		} ?>
	</ul>
<?php }
?>