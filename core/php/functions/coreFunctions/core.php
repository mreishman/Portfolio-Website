<?php
class core
{
	private function getFile($fileLookFor, $default = false)
	{
		$currentDir = realpath(__DIR__ . '/../../../..')."/";
		if(file_exists($currentDir."local/".$fileLookFor))
		{
			return $currentDir."local/".$fileLookFor;
		}
		if(file_exists($currentDir."core/".$fileLookFor))
		{
			return $currentDir."core/".$fileLookFor;
		}
		return $default;
	}

	public function getContent($layoutFileGen)
	{
		return $this->getFile("content/".$layoutFileGen->content->group."/".$layoutFileGen->content->file.".".$layoutFileGen->content->type);
	}

	public function getXml($page, $default = false)
	{
		return simplexml_load_file($this->getFile("xml/".$page.".xml", $default));
	}

	public function getModule($layoutFileGen, $module)
	{
		return $this->getFile("content/".$layoutFileGen->modules->$module->content->group."/".$layoutFileGen->modules->$module->content->file.".".$layoutFileGen->modules->$module->content->type);
	}

	public function getPageXml($page, $default = false)
	{
		return simplexml_load_file($this->getFile("xml/content/".$page.".xml", $default));
	}

	public function getTemplateXml($page, $default = false)
	{
		return simplexml_load_file($this->getFile("xml/templates/".$page.".xml", $default));
	}
}