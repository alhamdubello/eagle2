<?php
return [
	'captcha' => [
		'sitekey' => '6LddQm0UAAAAAMWBvnrYXj3XQ3pw-CayxD0VLvUA' // sitekey from google here
	],
	
	'cdn' => [
		'baseUrl' => defined('YII2CDN_OFFLINE') ? '/cdn' : 'https://seocdn-e94c.kxcdn.com/cdn',
		'basePath' => '@frontend/web/cdn'
	],
	
	'user_settings_default' => [
		'timezone' => 'Africa/Lagos',
		'date_format' => 'd-m-Y',
	],
		
	'query_elasticsearch' => 1,
	
	'hide_addthis' => '1'
];
