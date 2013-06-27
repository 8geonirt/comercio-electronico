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

/**
 * beezDivision chrome.
 *
 * @since	1.6
 */

function modChrome_jfnone($module, &$params, &$attribs)
{ 
?>
	<div class="jf-moduletable moduletable<?php echo $params->get('moduleclass_sfx'); ?>" id="Mod<?php echo $module->id; ?>">
		<?php if ($module->showtitle != 0) : ?>
		<h3><span><?php echo $module->title; ?></span></h3>
		<?php endif; ?>
		<div class="jf-box-ct clear">
		<?php echo $module->content; ?>
		</div>
    </div>
	<?php
}

/*
 * Module chrome that allows for rounded corners by wrapping in nested div tags
 */
function modChrome_jfcustom($module, &$params, &$attribs)
{
?>
	<div class="jf-moduletable moduletable<?php echo $params->get('moduleclass_sfx'); ?>" id="Mod<?php echo $module->id; ?>">
	<div class="jf-box">
		<?php if ($module->showtitle != 0) : ?>
		<h3><span><?php echo $module->title; ?></span></h3>
		<?php endif; ?>
		<div class="ja-box-ct clear">
		<?php echo $module->content; ?>
		</div>
	</div>
	</div>
	<?php
}

