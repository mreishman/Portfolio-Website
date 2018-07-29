<?php
require_once(dirname(__file__)."/core/php/functions/loader.php");
$page = "home";
if (!empty($_GET['page']))
{
	$page = $_GET["page"];
}
/* make sure page isn't bad*/

$baseXmlGen = $core->getPageXml($page, "core/xml/404.xml");

$layoutFileGen = $core->getTemplateXml($baseXmlGen->layout);

require_once($core->getContent($layoutFileGen));