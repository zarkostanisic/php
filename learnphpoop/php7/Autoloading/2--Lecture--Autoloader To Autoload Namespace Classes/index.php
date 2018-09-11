<?php
	include 'Psr4Autoloader.php';

	$userObj = new  \MyProject\MyNamespace\User();
	$dbTableObj = new  \MyProject\MyNamespace\SubNS\Db_Table();
	$fWObj = new  \MyProject\MyNamespace\SubNS\File_Writer();
	$proObj = new  \MyProject\MyNamespace\SubNS\SubSubNS\Product();
	$reqObj = new  \MyProject\MyNamespace\SubNS\SubSubNS\Request();
?>

