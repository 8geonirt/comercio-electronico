<?php
/**
 * @package	HikaShop for Joomla!
 * @version	2.1.3
 * @author	hikashop.com
 * @copyright	(C) 2010-2013 HIKARI SOFTWARE. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?><div class="hikashop_amazon_end" id="hikashop_amazon_end">
	<span id="hikashop_amazon_end_message" class="hikashop_amazon_end_message">
		<?php echo JText::sprintf('PLEASE_WAIT_BEFORE_REDIRECTION_TO_X',$method->payment_name).'<br/>'. JText::_('CLICK_ON_BUTTON_IF_NOT_REDIRECTED');?>
	</span>
	<span id="hikashop_amazon_end_spinner" class="hikashop_amazon_end_spinner hikashop_checkout_end_spinner">
	</span>
	<br/>

	<form id="hikashop_amazon_form" name="hikashop_amazon_form" action="<?php echo $PayUrl;?>" method="post">
		<div id="hikashop_amazon_end_image" class="hikashop_amazon_end_image">
			<input id="hikashop_amazon_button" type="submit" value="<?php echo JText::_('PAY_NOW');?>" name="" alt="<?php echo JText::_('PAY_NOW');?>" />
		</div>
		<?php
			foreach( $vars as $name => $value ) {
				echo '<input type="hidden" name="'.$name.'" value="'.htmlspecialchars((string)$value).'" />';
			}
			JRequest::setVar('noform',1); ?>
		</form>
		<script type="text/javascript">
			<!--
			document.getElementById('hikashop_amazon_form').submit();
			//-->
		</script>
</div>
