<?php

class gallery 
{
	private function getDefaultId($data)
	{
		if(isset($data["id"]))
		{
			return $data["id"];
		}
		return preg_replace('/[^a-z0-9]+/', '_', strtolower($data["src"]));
	}

	public function generateGallery($arrayOfImages, $config = array())
	{
		$htmlToReturn = "";
		//Defaults
		$tag = "div";
		$imgWidth = "auto";
		$imgHeight = "auto";
		$arrows = true;
		$galleryThumbWidth = "50";
		$galleryThumbHeight = "auto";
		$galleryThumbs = true;
		$tagClass = "";
		//Check for custom settings
		$configChecks = ["tag","imgWidth","imgHeight","arrows","galleryThumbWidth","galleryThumbHeight","galleryThumbs"];
		foreach ($configChecks as $configVar)
		{
			if(isset($config[$configVar]))
			{
				$$configVar = $config[$configVar];
			}
		}
		if(isset($config["tagClass"]))
		{
			$tagClass = " class=\"".$config["tagClass"]."\" ";
		}
		$arrayOfImagesCount = count($arrayOfImages);
		$arrayOfImagesCounter = 0;
		if($arrayOfImagesCount === 1)
		{
			$arrows = false;
		}
		else
		{
			//build array
			$arrayOfImagesGen = array();
			foreach ($arrayOfImages as $value)
			{
				//easier to use number for key incase not used in main img
				$arrayOfImagesGen[$arrayOfImagesCounter] = $value;
				$arrayOfImagesCounter++;
			}

		}
		$arrayOfImagesCounter = 0;
		foreach ($arrayOfImages as $value)
		{
			if($arrayOfImagesCounter !== 0)
			{
				$htmlToReturn .= "
			";
			}
			$id = $this->getDefaultId($value);
			$htmlToReturn .= "<".$tag." ".$tagClass." >";
			$link = "#".$id;
			$image = $value["src"];
			$thumb = $value["src"];
			$configChecks = ["link","thumb"];
			$aClass = "";
			$imgClass = "";
			foreach ($configChecks as $configVar)
			{
				if(isset($value[$configVar]))
				{
					$$configVar = $value[$configVar];
				}
			}
			$target = "";
			if(isset($config["target"]))
			{
				$target = " target=\"".$config["target"]."\"";
			}
			if(isset($value["target"]))
			{
				$target = " target=\"".$value["target"]."\"";
			}
			$configChecks = ["aClass","imgClass"];
			foreach ($configChecks as $configVar)
			{
				if(isset($config[$configVar]))
				{
					$$configVar = " class=\"".$config[$configVar]."\" ";
				}
				if(isset($value[$configVar]))
				{
					$$configVar = " class=\"".$value[$configVar]."\" ";
				}
			}
			$htmlToReturn .= 	"
				<a href=\"".$link."\"".$target." ".$aClass.">
					<img src=\"".$thumb."\" width=\"".$imgWidth."\" height=\"".$imgHeight."\" ".$imgClass.">
				</a>";
			if($link === "#".$id)
			{
				$htmlToReturn .= "
				<span class=\"lightbox\"  id=\"".$id."\">
					<span class=\"lightboxForeground\">
						<a href=\"#_\" class=\"lightboxClose	\" >
							<span class=\"lightbox-icon-bar-top\"></span>
							<span class=\"lightbox-icon-bar-bot\"></span>
						</a>";
				if($arrows && $arrayOfImagesCounter !== 0)
				{
					$htmlToReturn .= "
						<a href=\"#".$this->getDefaultId($arrayOfImagesGen[$arrayOfImagesCounter-1])."\" class=\"arrow left lightboxLeft\" ></a>";
				}
				$htmlToReturn .= "
						<img src=\"".$image."\">";
				if($arrows && ($arrayOfImagesCounter + 1) < $arrayOfImagesCount)
				{
					$htmlToReturn .= "
						<a href=\"#".$this->getDefaultId($arrayOfImagesGen[$arrayOfImagesCounter+1])."\" class=\"arrow right lightboxRight\" ></a>";
				}
				if($galleryThumbs)
				{
					if($arrayOfImagesCounter !== 0)
					{
						$leftThumbHtml = "";
						$newCounter = 0;
						foreach ($arrayOfImages as $value2)
						{
							if($newCounter >= $arrayOfImagesCounter)
							{
								break;
							}
							$id = $this->getDefaultId($value2);
							if(isset($value2["id"]))
							{
								$id = $value2["id"];
							}
							$thumb2 = $value2["src"];
							$link2 = "#".$id;
							if(isset($value2["thumb"]))
							{
								$thumb2 = $value2["thumb"];
							}
							$leftThumbHtml .= "
							<a href=\"".$link2 ."\" >
								<img class=\"galleryFSThumb\" width=\"".$galleryThumbWidth."px\" height=\"".$galleryThumbHeight."\" src=\"".$thumb2."\">
							</a>
							";
							$newCounter++;

						}
						$htmlToReturn .= "<div style=\"margin-right: ".($galleryThumbWidth/2)."px; width:".(($galleryThumbWidth+20)*($newCounter))."px;\" class=\"galleryThumbsLeft\">";
						$htmlToReturn .= $leftThumbHtml;
						$htmlToReturn .= "</div>";
					}
					$htmlToReturn .= "
						<img style=\"margin-left:-".($galleryThumbWidth/2)."px\" class=\"galleryFullScreenThumbCenter galleryFSThumb currentThumb\" width=\"".$galleryThumbWidth."px\" height=\"".$galleryThumbHeight."\" src=\"".$thumb."\">";
					if(($arrayOfImagesCounter + 1) < $arrayOfImagesCount)
					{
						$leftThumbHtml = "";
						$newCounter = 0;
						$imageCounter = 0;
						foreach ($arrayOfImages as $value2)
						{
							$newCounter++;
							if(($newCounter - 1) <= $arrayOfImagesCounter)
							{
								continue;
							}
							$id = $this->getDefaultId($value2);
							$thumb2 = $value2["src"];
							$link2 = "#".$id;
							if(isset($value2["thumb"]))
							{
								$thumb2 = $value2["thumb"];
							}
							$leftThumbHtml .= "
							<a href=\"".$link2 ."\" >
								<img class=\"galleryFSThumb\" width=\"".$galleryThumbWidth."px\" height=\"".$galleryThumbHeight."\" src=\"".$thumb2."\">
							</a>
							";
							$imageCounter++;

						}
						$htmlToReturn .= "<div style=\"margin-left: ".(($galleryThumbWidth/1.5))."px; width:".(($galleryThumbWidth+20)*($imageCounter))."px;\" class=\"galleryThumbsRight\">";
						$htmlToReturn .= $leftThumbHtml;
						$htmlToReturn .= "</div>";
					}
				}
				$htmlToReturn .= "
					</span>";
				$htmlToReturn .= "
					<a class=\"lightboxBackground\" href=\"#_\" ></a>";
				$htmlToReturn .= "
				</span>";
			}
			$htmlToReturn .= "
			</".$tag.">";
			$arrayOfImagesCounter++;
		}
		$htmlToReturn .= "
";
		return $htmlToReturn;
	}
}