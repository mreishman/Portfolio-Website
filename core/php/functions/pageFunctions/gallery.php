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
		$arrayOfImagesCount = count($arrayOfImages);
		$arrayOfImagesCounter = 0;
		foreach ($arrayOfImages as $value)
		{
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
			$htmlToReturn .= "<a href=\"".$link."\" >";
			$htmlToReturn .= "<img src=\"".$thumb."\" width=\"".$imgWidth."\" height=\"".$imgHeight."\" >";
			$htmlToReturn .= "</a>";
			if($link === "#".$value["id"])
			{
				$htmlToReturn .= "<a href=\"#_\" class=\"lightbox\"  id=\"".$value["id"]."\">";
				$htmlToReturn .= "<img src=\"".$image."\">";
				$htmlToReturn .= "</a>";
			}
			$htmlToReturn .= "</".$tag.">";
			$arrayOfImagesCounter++;
		}
		return $htmlToReturn;
	}
}