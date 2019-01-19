<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $baseXmlGen->title; ?></title>
		<link rel="shortcut icon" type="image/png" href="/media/img/main/favicon.png"/>
	</head>
	<body>
		<?php
			$headerModules = $core->getModules($layoutFileGen,"header");
			foreach ($headerModules as $module)
			{
				require_once($module);
			}
		?>
		<div class="mainContent" >
			<!-- Default content -->
			<?php require_once($core->getContent($baseXmlGen)); ?>
		</div>
		<?php
			$headerModules = $core->getModules($layoutFileGen,"footer");
			foreach ($headerModules as $module)
			{
				require_once($module);
			}
		?>
	</body>
</html>