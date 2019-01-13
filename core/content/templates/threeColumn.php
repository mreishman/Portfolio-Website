<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $baseXmlGen->title; ?></title>
		<link rel="shortcut icon" type="image/png" href="/media/img/main/favicon.png"/>
	</head>
	<body>
		<?php require_once($core->getModule($layoutFileGen,"header")); ?>
		<div class="mainContentInline">
			<?php
				$contentClass = "30";
				if($core->ifCheckArray($layoutFileGen, array("settings","body","mainContent","content","columnWidth")))
				{
					$contentClass = $layoutFileGen->settings->body->mainContent->content->columnWidth;
				}
			?>
			<div class="column width<?php echo $contentClass; ?>">
				<!-- Default content -->
				<?php include($core->getContent($baseXmlGen)); ?>
			</div>
			<?php
				$contentClass = "40";
				if($core->ifCheckArray($layoutFileGen, array("settings","body","mainContent","contentTwo","columnWidth")))
				{
					$contentClass = $layoutFileGen->settings->body->mainContent->contentTwo->columnWidth;
				}
			?>
	  		<div class="column width<?php echo $contentClass; ?>">
	  			<!-- contentTwo -->
	  			<?php include($core->getContent($baseXmlGen, "contentTwo")); ?>
	  		</div>
	  		<?php
				$contentClass = "30";
				if($core->ifCheckArray($layoutFileGen, array("settings","body","mainContent","contentThree","columnWidth")))
				{
					$contentClass = $layoutFileGen->settings->body->mainContent->contentThree->columnWidth;
				}
			?>
	  		<div class="column width<?php echo $contentClass; ?>">
	  			<!-- contentThree -->
	  			<?php include($core->getContent($baseXmlGen, "contentThree")); ?>
	  		</div>
	  	</div>
		<?php require_once($core->getModule($layoutFileGen,"footer")); ?>
	</body>
</html>