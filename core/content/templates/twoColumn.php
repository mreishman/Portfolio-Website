<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $baseXmlGen->title; ?></title>
		<link rel="shortcut icon" type="image/png" href="/media/img/main/favicon.png"/>
	</head>
	<body>
		<?php require_once($core->getModule($layoutFileGen,"header")); ?>
		<div class="mainContent" >
			<?php
				$contentClass = "50";
				//@TODO move to if check layer function (pass array, return bool)
				if($layoutFileGen->settings && $layoutFileGen->settings->body && $layoutFileGen->settings->body->mainContent && $layoutFileGen->settings->body->mainContent->content)
				{
					$possibleContentClass = $layoutFileGen->settings->body->mainContent->content->columnWidth;
					if($possibleContentClass)
					{
						$contentClass = $possibleContentClass;
					}
				}
			?>
			<div class="column width<?php echo $contentClass; ?>">
				<!-- Default content -->
				<?php include($core->getContent($baseXmlGen)); ?>
			</div>
			<?php
				$contentClass = "50";
				if($layoutFileGen->settings && $layoutFileGen->settings->body && $layoutFileGen->settings->body->mainContent && $layoutFileGen->settings->body->mainContent->content)
				{
					$possibleContentClass = $layoutFileGen->settings->body->mainContent->content->columnWidth;
					if($possibleContentClass)
					{
						$contentClass = $possibleContentClass;
					}
				}
			?>
	  		<div class="column width<?php echo $contentClass; ?>">
	  			<!-- contentTwo -->
	  			<?php include($core->getContent($baseXmlGen, "contentTwo")); ?>
	  		</div>
	  	</div>
		<?php require_once($core->getModule($layoutFileGen,"footer")); ?>
	</body>
</html>