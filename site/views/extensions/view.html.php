<?php
/**
* @version	$Id$
* @package	Joomla
* @subpackage	NoKExtensions
* @copyright	Copyright (c) 2017 Norbert Kümin. All rights reserved.
* @license	http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE
* @author	Norbert Kuemin
* @authorEmail	momo_102@bluemail.ch
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class NoKExtensionViewExtensions extends JViewLegacy {
	protected $items;
	protected $pageHeading = 'COM_NOKEXTENSION_PAGE_TITLE_DEFAULT';
	protected $paramsComponent;
	protected $paramsMenuEntry;
	protected $user;

	function display($tpl = null) {
		// Init variables
		NoKWebDAVHelper::addSubmenu('extensions');
		$this->user = JFactory::getUser();
		$app = JFactory::getApplication();
		$this->items = $this->get('Items');
//		$this->state = $this->get('State');
//		if ($this->state) { $this->paramsComponent = $this->state->get('params'); }
		$currentMenu = $app->getMenu()->getActive();
		if (is_object( $currentMenu )) {
			$this->paramsMenuEntry = $currentMenu->params;
		}
		// Init document
		JFactory::getDocument()->setMetaData('robots', 'noindex, nofollow');
		parent::display($tpl);
    }
}
