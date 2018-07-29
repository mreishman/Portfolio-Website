<?php
require_once(dirname(__file__)."/core/php/functions/coreFunctions/core.php");
$core = new Core();
$page = "home";
if (!empty($_GET['page']))
{
	$page = $_GET["page"];
}
/* make sure page isn't bad*/

$baseXmlGen = $core->getXml($page, "core/xml/404.xml");

$layoutFileGen = $core->getXml($baseXmlGen->layout);

require_once($core->getContent($layoutFileGen));