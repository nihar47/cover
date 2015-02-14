<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Hign Clean',
	'defaultController'=>'site/index',

	
	// preloading 'log' component
	'preload'=>array(),

	
	'behaviors' => array(

	),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.resize-image.resize',
                'application.extensions.MPDF56.mPDF',
		'application.modules.User.models.*',
		'application.modules.User.components.*',
		'application.modules.Group.models.*',
		'application.modules.Group.components.*',
		'application.modules.Settings.models.*',
		'application.modules.Settings.components.*',
		'application.modules.Service.models.*',
		'application.modules.Service.components.*',
		'application.modules.ListItems.models.*',
		'application.modules.ListItems.components.*',
		'application.modules.Company.models.*',
		'application.modules.Company.components.*',
		'application.modules.Contact.models.*',
		'application.modules.Contact.components.*',
		'application.modules.ContactsSite.models.*',
		'application.modules.ContactsSite.components.*',
		'application.modules.Buildings.models.*',
		'application.modules.Buildings.components.*',
		'application.modules.Quotes.models.*',
		'application.modules.Quotes.components.*',
		'application.modules.Swms.models.*',
		'application.modules.Swms.components.*',
		'application.modules.SwmsTask.models.*',
		'application.modules.SwmsTask.components.*',
		'application.modules.SwmsHzrdsConsqs.models.*',
		'application.modules.SwmsHzrdsConsqs.components.*',
		'application.modules.Calendar.models.*',
		'application.modules.Calendar.components.*',


	),
		
	'modules'=>array(
			
		'User',		 
		'Dashboard',
		'Group',
		'Settings',
		'Service',
		'ListItems',
		'Company',
		'Contact',
		'ContactsSite',
		'Buildings',
		'Quotes',
		'Swms',
		'SwmsTask',
		'SwmsHzrdsConsqs',
		'Calendar',
		
					 
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'edreamz',
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
		
		
	    'ePdf' => array(
            'class'         => 'ext.yii-pdf.EYiiPdf',
            'params'        => array(
            'mpdf'     => array(
                'librarySourcePath' => 'application.vendors.MPDF56.*',
                'constants'         => array(
                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                ),
                'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                 'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifies the mode of the new document.
                    'format'            => '', // format A4, A5, ...
                    'default_font_size' => 10, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 12.7, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 12.7, // margin_right
                    'mgt'               => 16, // margin_top
                    'mgb'               => 16, // margin_bottom
                    'mgh'               => 8, // margin_header
                    'mgf'               => 8, // margin_footer
                    'orientation'       => 'L', // landscape or portrait orientation
                )
            ),
      
           /* 'HTML2PDF' => array(
                'librarySourcePath' => 'application.vendors.html2pdf.*',
                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'P', // landscape or portrait orientation
                    'format'      => 'A4', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                )*/
            )
        ),
		
	 'session' => array(
        'timeout' => 86400,
    ),


		
/* 
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		), */
		// uncomment the following to use a MySQL database

	
	'db'=> array(
          'connectionString' => 'mysql:host=localhost;dbname=high_clean',
          'emulatePrepare' => true,
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          'tablePrefix' => 'hc_',
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
		'adminEmail'=>'admin@high_clean.com',
		'defaultPageSize'=>25,
		
	),

    
);