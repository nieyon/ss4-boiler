<?php

class HeaderFooter extends Page {

	private static $db = [

	];

	private static $has_one = [

		'Logo' => 'Image',
		'Favicon' => 'Image',

	];

	private static $has_many = [
	];

	private static $allowed_children = "none";

	private static $defaults = array(
		'PageName' => 'Header and Footer',
		'MenuTitle' => 'Header and Footer',
		'ShowInMenus' => true,
		'ShowInSearch' => true,
	);
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		/*
		* Header
		*/
		$fields->addFieldsToTab('Root.Header', array(
			$upload = new UploadField('Logo', 'Image (Max size: 2MB)'),
			$upload = new UploadField('Favicon', 'Image (Max size: 2MB)'),
		));

		/*
		* Folders
		*/
		$upload->setFolderName('header');

		/*
		* Remove by tab
		*/
		$fields->removeFieldFromTab('Root.Main', 'Content');

		return $fields;
	}

}

class HeaderFooter_Controller extends Page_Controller {

	public function init() {
    	parent::init();
	}
}