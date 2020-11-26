<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $baseXmlGen->title; ?></title>
		<?php if(file_exists(BP . "/media/img/main/favicon.png")): ?>
			<link rel="shortcut icon" type="image/png" href="/media/img/main/favicon.png"/>
		<?php endif; ?>
	</head>
	<body>
		<?php require_once($core->getModule($layoutFileGen,"header")); ?>
		<div class="mainContent" >
			<!-- Default content -->
			<?php require_once($core->getContent($baseXmlGen)); ?>
		</div>
		<?php require_once($core->getModule($layoutFileGen,"footer")); ?>
	</body>
</html>