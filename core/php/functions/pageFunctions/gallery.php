<?php

class gallery 
{
	public function generateGallery($arrayOfImages, $config = array())
	{
		$htmlToReturn = "";
		//Defaults
		$tag = "div";
		$imgWidth = "auto";
		$imgHeight = "auto";
		$arrows = true;
		//Check for custom settings
		if(isset($config["tag"]))
		{
			$tag = $config["tag"];
		}
		if(isset($config["imgWidth"]))
		{
			$imgWidth = $config["imgWidth"];
		}
		if(isset($config["imgHeight"]))
		{
			$imgHeight = $config["imgHeight"];
		}
		if(isset($config["arrows"]))
		{
			$arrows = $config["arrows"];
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
			$htmlToReturn .= "<".$tag.">";
			$link = "#".$value["id"];
			$image = $value["src"];
			$thumb = $value["src"];
			if(isset($value["link"]))
			{
				$link = $value["link"];
			}
			if(isset($value["thumb"]))
			{
				$thumb = $value["thumb"];
			}
			$htmlToReturn .= 	"
				<a href=\"".$link."\" >
					<img src=\"".$thumb."\" width=\"".$imgWidth."\" height=\"".$imgHeight."\" >
				</a>";
			if($link === "#".$value["id"])
			{
				$htmlToReturn .= "
				<span class=\"lightbox\"  id=\"".$value["id"]."\">
					<span class=\"lightboxForeground\">
						<a href=\"#_\" class=\"lightboxClose	\" >
							<span class=\"lightbox-icon-bar-top\"></span>
							<span class=\"lightbox-icon-bar-bot\"></span>
						</a>";
				if($arrows && $arrayOfImagesCounter !== 0)
				{
					$htmlToReturn .= "
						<a href=\"#".$arrayOfImagesGen[$arrayOfImagesCounter-1]["id"]."\" class=\"arrow left lightboxLeft\" ></a>";
				}
				$htmlToReturn .= "
						<img src=\"".$image."\">";
				if($arrows && ($arrayOfImagesCounter + 1) < $arrayOfImagesCount)
				{
					$htmlToReturn .= "
						<a href=\"#".$arrayOfImagesGen[($arrayOfImagesCounter+1)]["id"]."\" class=\"arrow right lightboxRight\" ></a>";
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