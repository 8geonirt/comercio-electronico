<?php
/*------------------------------------------------------------------------
# JF_VIHREA!! - JOOMFREAK.COM JOOMLA 2.5 TEMPLATE 
# March 2013
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2013 JOOMFREAK.COM / KREATIF MULTIMEDIA GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE: http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL: info@joomfreak.com
-------------------------------------------------------------------------*/

// No direct access.
defined('_JEXEC') or die;

$doc = JFactory::getDocument();

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/fonts/stylesheet.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />

<!--[if IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 8]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie8only.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body class="contentpane">
	<div id="all">
		<div id="main">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
	</div>
</body>
</html>
