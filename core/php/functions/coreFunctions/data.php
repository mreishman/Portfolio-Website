<?php

class data
{
	private $core;
	private $defaultConfig;
	private $customConfig;

	public function __construct()
	{
		$this->core = new Core();

		$this->customConfig = new SimpleXMLElement("<config></config>");
		if(file_exists(BP."local/xml/config.xml"))
		{
			$this->customConfig = simplexml_load_file(BP."local/xml/config.xml");
		}

		$this->defaultConfig = simplexml_load_file(BP."core/xml/config.xml");
	}

	public function getValue($key)
	{
		return $this->core->getSetting(
			$this->customConfig, 
			$key,
			$this->core->getSetting(
				$this->defaultConfig, 
				$key,
				false
			)
		);
	}
}