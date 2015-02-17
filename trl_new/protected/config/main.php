<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Top Rated Local',
	'defaultController'=>'site/index',

	
	// preloading 'log' component
	'preload'=>array('log'),

	
	'behaviors' => array(
    'runEnd' => array(
       'class' => 'application.components.WebApplicationEndBehavior',
    ),
	),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.UserAdmin.components.*',
        'application.modules.UserAdmin.models.*',
		'application.modules.page.components.*',
        'application.modules.page.models.*',
		'application.modules.locations.components.*',
        'application.modules.locations.models.*',
		'application.modules.faq.components.*',
        'application.modules.faq.models.*',
		'application.modules.emailFormat.components.*',
        'application.modules.emailFormat.models.*',
		'application.modules.category.components.*',
        'application.modules.category.models.*',
		'application.modules.business.components.*',
        'application.modules.business.models.*',
		'application.modules.businessBenefits.components.*',
        'application.modules.businessBenefits.models.*',
		'application.modules.businessRatingBenefits.components.*',
        'application.modules.businessRatingBenefits.models.*',
		'application.modules.common.components.*',
        'application.modules.common.models.*',	
		'application.modules.Customer.components.*',
        'application.modules.Customer.models.*',			
		'application.modules.Setting.components.*',
        'application.modules.Setting.models.*',	
	),

	'modules'=>array(
				// 'UserAdmin',
				 'page',
				 'faq',
				 'businessBenefits',
				 'businessRatingBenefits',
				 'locations',
				 'category',
				 'listing',
				 'business',
				 'emailFormat',
				 'common',
				 'businessAddress',
				 'businessLocation',
				 'businessCategory',
				 'dashboard',
				 'AdminUser',	
				 'BusinessUser',
				 'Customer',
				 'Setting',
				
				 
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'MnXqnbSqGR5ZJUnB',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1',$_SERVER['REMOTE_ADDR']),
		),
		
		 'UserAdmin' => array(
               'cache_time' => 3600,
       ),
		
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		
	/*	'user'=>array(
                'class'=>'UWebUser',
                'allowAutoLogin'=>true,
                'loginUrl'=>array('/site/login'),
        ),
		*/
		
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				admin/'       =>'admin/index/index',
                                'admin/login'       =>'admin/index/login',
                                'admin/logout'      =>'admin/index/logout',
                                'admin/<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',
			),
		),
		*/
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=trl_rohit',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'trl_'
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);