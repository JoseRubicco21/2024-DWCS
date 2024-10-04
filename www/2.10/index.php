<?php declare(strict_types=1);
// Require will throw an error when the file defined is not found. In the other hand, Include won't
// do such thing.
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Web Portal - Includes and requires</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="header" class="container">
	<?php 
		include('./logo.php');
		include('./menu.php');
		?>
</div>
<?php include('./pictures.php')?>;
<div id="page">
	<div id="bg1">
		<div id="bg2">
			<div id="bg3">
				<?php 
					include('./content.php');
					include('./sidebar.php');
				?>
			</div>
		</div>
	</div>
</div>
<?php include('./footer.php'); ?>
</body>
</html>
