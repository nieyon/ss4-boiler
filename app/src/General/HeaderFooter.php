<?php

namespace {
	use SilverStripe\CMS\Model\SiteTree;

	use Page;  
	use PageController;
	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\Forms\TextField;
	use SilverStripe\Forms\TextareaField;

	class HeaderFooter extends Page {

		private static $db = [

			'SEO' => 'Text',
			'Description' => 'Text',

		];

		private static $has_one = [

			'HeaderLogo' => Image::class,
			'Favicon' => Image::class,

		];

		private static $owns = [
	        'HeaderLogo',
	        'Favicon'
	    ];

		private static $defaults = array(
			'PageName' => 'Header & Footer',
			'MenuTitle' => 'Header & Footer',
			'ShowInMenus' => false,
			'ShowInSearch' => false,
		);

		public function getCMSFields() {
			$fields = parent::getCMSFields();

			$fields->addFieldToTab('Root.Header', $upload = UploadField::create('Favicon','Favicon'));
			$fields->addFieldToTab('Root.Header', $upload1 = UploadField::create('HeaderLogo','Logo'));

			$fields->addFieldToTab('Root.SEO Keywords', $desc = TextareaField::create('SEO', 'SEO Keywords'));
			$fields->addFieldToTab('Root.Description', TextareaField::create('Description', 'Site Description'));

			#Description
			$desc->setDescription('Separate each descriptions with comma (,)');
			$upload->setDescription('Max file size: 2MB');
			$upload1->setDescription('Max file size: 2MB');
			$upload->setFolderName('headerfooter/');
			$upload1->setFolderName('headerfooter/');
			
			/*
			* Remove by tab
			*/
			$fields->removeFieldFromTab('Root.Main', 'Content');

			return $fields;
		}
	}

	class HeaderFooterController extends PageController {

	}
}
