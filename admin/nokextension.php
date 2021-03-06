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

JLoader::register('NoKExtensionHelper', __DIR__.'/helpers/nokextension.php', true);

// Get an instance of the controller prefixed by ClubManagement
$controller = JControllerLegacy::getInstance('NoKExtension');
 
// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->get('task'));
 
// Redirect if set by the controller
$controller->redirect();
?>
