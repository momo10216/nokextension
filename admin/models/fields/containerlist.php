﻿<?php
/**
* @version	$Id$
* @package	Joomla
* @subpackage	NoKWebDAV
* @copyright	Copyright (c) 2017 Norbert Kümin. All rights reserved.
* @license	http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE
* @author	Norbert Kuemin
* @authorEmail	momo_102@bluemail.ch
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
// The class name must always be the same as the filename (in camel case)
class JFormFieldExtensionList extends JFormField {
        //The field class must know its own type through the variable $type.
        protected $type = 'extensionlist';
 
        public function getInput() {
			$fields = array();
			$multiple = '';
			if (isset($this->element["multiple"]) && ($this->element['multiple'] == 'true')) {
				$multiple = 'multiple ';
			} else {
				if (isset($this->element["hide_none"]) && ($this->element["hide_none"] != "true")) {
					$fields[""] = JText::alt('COM_NOKEXTENSION_DO_NOT_USE', preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->fieldname));
				}
			}
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query
			->select(array('e.id', 'e.name'))
			->from($db->quoteName('#__nokWebDAV_containers','e'))
			->order('c.name');
			if (isset($this->element["type"])) {
				switch ($this->element["type"]) {
					case 'component':
						$query->where($db->quoteName('e.contains_components').' = '.$db->quote('1'));
						break;
					case 'module':
						$query->where($db->quoteName('e.contains_modules').' = '.$db->quote('1'));
						break;
					case 'plugin':
						$query->where($db->quoteName('e.contains_plugins').' = '.$db->quote('1'));
						break;
					case 'template':
						$query->where($db->quoteName('e.contains_templates').' = '.$db->quote('1'));
						break;
			}
			$db->setQuery($query);
			$results = $db->loadRowList();
			foreach($results as $result) {
				$fields[$result[0]] = $result[1];
			}
			if (is_array($this->value)) {
				$values = $this->value;
			} else {
				$values = array($this->value);
				if (!array_key_exists($this->value, $fields) && (empty($multiple) || !empty($this->value))) {
					$fields[$this->value] = $this->value;
				}
			}
			$option = "";
			foreach(array_keys($fields) as $key) {
				$option .= '<option value="'.$key.'"';
				if (array_search($key,$values) !== false)  {
					$option .= ' selected';
				}
				$option .= '>'.$fields[$key].'</option>';
			}
			return '<select '.$multiple.'id="'.$this->id.'" name="'.$this->name.'">'.$option.'</select>';
        }
}
?>