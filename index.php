<?php
define('BP', dirname(realpath(__FILE__)).'/');
require_once(BP."core/php/functions/loader.php");
$page = "home";
if (!empty($_GET['page']))
{
	$page = $_GET["page"];
}
$page = rtrim($page, '/');
/* make sure page isn't bad*/

$baseXmlGen = $core->getPageXml($page, "core/xml/errors/404.xml");

$layoutFileGen = $core->getTemplateXml($baseXmlGen->layout);

require_once($core->getContent($layoutFileGen));