<?php

namespace {
	use SilverStripe\CMS\Model\SiteTree;

	use Page;  
	use PageController;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;
	use SilverStripe\Forms\HTMLEditorField;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Forms\TabSet;
	use SilverStripe\Forms\Tab;

	class HomePage extends Page {

		private static $db = [
		
			'EmailRecipient' => 'Text',
		];

		private static $has_one = [

		];

		private static $owns = [
	
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

			#Remove by tab
			$fields->removeFieldFromTab('Root.Main', 'Content');
			

			/**
			* EMAIL RECEIPIENT : Text Field
			* - Flexibility purpose; to change email with ease.
			*/
			$fields->addFieldsToTab('Root.Email Recipient', array(
				$desc = new TextField('EmailRecipient', 'Email Address'),
			));

			# SET FIELD DESCRIPTION 
			// $uploadf1->setDescription('Max file size: 2MB | Dimension: 1366px x 768px');
			$desc->setDescription('Sample format: email@sample.com, email_2@sample.com');
			
			# Set destination path for the uploaded images.
			// $uploadf1->setFolderName('homepage/frame-1');

			return $fields;
		}
	}

	class HomePageController extends PageController {
		
	}
}
