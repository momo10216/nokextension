<?php
/**
* @version	$Id$
* @package	Joomla
* @subpackage	NoKExtension
* @copyright	Copyright (c) 2017 Norbert Kümin. All rights reserved.
* @license	http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE
* @author	Norbert Kuemin
* @authorEmail	momo_102@bluemail.ch
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class NoKExtensionHelper extends JHelperContent {
	public static function addSubmenu($vName) {
		JHtmlSidebar::addEntry(
			JText::_('COM_NOKEXTENSION_MENU_ENTRIES'),
			'index.php?option=com_nokextension&view=extensions',
			$vName == 'extensions'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_NOKEXTENSION_MENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_nokextension',
			$vName == 'categories'
		);
	}
}
?>
