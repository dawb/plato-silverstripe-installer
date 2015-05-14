<?php

class CustomSiteConfig extends DataExtension {

	private static $db = array(
		'GoogleAnalytics' => 'HTMLText',
		'GoogleTagManager' => 'HTMLText'
	);

	private static $has_one = array(
	);

	private static $has_many = array(
	);

	public function updateCMSFields(FieldList $fields) {
		// $fields->removeByName('Theme');
		
		$fields->addFieldsToTab('Root.GoogleAnalytics', array(
			LiteralField::create('', '<p>NOTE: if Google Tag Manager code is entered it will overwrite the analytics.</p>'),
			TextareaField::create('GoogleAnalytics', 'Google Analytics Code'),
			TextareaField::create('GoogleTagManager', 'Google Tag Manager Code')
		));
						
		return $fields;
	}

	public function LatestBlogPosts($limit=1) {
		return class_exists('BlogEntry') ? BlogEntry::get()->sort('Date DESC')->limit($limit) : null;
	}

}
