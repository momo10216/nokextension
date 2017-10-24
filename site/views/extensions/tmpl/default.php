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

function decodeType($type) {
	switch($type) {
		case 'files': return JText::_('COM_NOKEXTENSION_CONTAINER_FIELD_TYPE_FILES');
		case 'contacts': return JText::_('COM_NOKEXTENSION_CONTAINER_FIELD_TYPE_CONTACTS');
		case 'events': return JText::_('COM_NOKEXTENSION_CONTAINER_FIELD_TYPE_EVENTS');
		default: return $type;
	}
}

function decodeBoolean($value) {
	if ($value) { return JText::_('JYES'); }
	return JText::_('JNO');
}

$EOL = "\n";
$TAB = "\t";
$user = JFactory::getUser();

echo '<table border="1" style="border-style:solid; border-width:1px">'.$EOL;
echo $TAB.'<tr>';
echo '<th>'.JText::_('COM_NOKEXTENSION_CONTAINER_FIELD_NAME_LABEL').'</th>';
echo '<th>'.JText::_('COM_NOKEXTENSION_CONTAINER_FIELD_TYPE_LABEL').'</th>';
echo '<th>'.JText::_('COM_NOKEXTENSION_CONTAINER_FIELD_URL_LABEL').'</th>';
if ($this->paramsMenuEntry->get('show_access') == '1') {
	echo '<th>'.JText::_('COM_NOKEXTENSION_ACCESS_READ_CONTENT_LABEL').'</th>';
	echo '<th>'.JText::_('COM_NOKEXTENSION_ACCESS_CREATE_CONTENT_LABEL').'</th>';
	echo '<th>'.JText::_('COM_NOKEXTENSION_ACCESS_CHANGE_CONTENT_LABEL').'</th>';
	echo '<th>'.JText::_('COM_NOKEXTENSION_ACCESS_DELETE_CONTENT_LABEL').'</th>';
}
echo '</tr>'.$EOL;
if ($this->items) {
	foreach($this->items as $item) {
		$row = (array) $item;
		echo $TAB.'<tr>';
		echo '<td>'.$item->name.'</td>';
		echo '<td>'.decodeType($item->type).'</td>';
		echo '<td>'.$url.'</td>';
		echo '</tr>'.$EOL;
	}
}
echo '</table>'.$EOL;
?>
