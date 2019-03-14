<?php

class HomePage extends Page {

	private static $db = [

	];

	private static $has_one = [
	];

	private static $has_many = [
	];

	private static $allowed_children = "none";

	private static $defaults = array(
		'PageName' => 'Home Page',
		'MenuTitle' => 'Home',
		'ShowInMenus' => true,
		'ShowInSearch' => true,
	);
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();


		/*
		* Remove by tab
		*/
		$fields->removeFieldFromTab('Root.Main', 'Content');

		return $fields;
	}

}

class HomePage_Controller extends Page_Controller {

	public function init() {
    	parent::init();
	}
}