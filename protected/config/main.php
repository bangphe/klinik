<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SIM-KLINIK',
	'theme'=>'metronic',
	'timeZone' => 'Asia/Jakarta',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'bismillah',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
		'admin',
	),

	// application components
	'components'=>array(
		'format'=>array(
			'class'=>'MyFormatter'
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
            'caseSensitive' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //biar bisa bikin url kayak gini => module/controller/action/parameter
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
			),
		),

		'clientScript' => array(
            // 'scriptMap' => array(
            //     // map scripts from assets to your favourite versions (maybe CDN)
            //     'jquery.js' => 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
            // ),
            'packages' => array(
                // here's a package named 'jquery'
                // it registers 3 JS and 2 css files, also note using scriptMap alias
                'jquery' => array(
                    'js' => array(
                        'jquery.js',
                    ),
                ),
            ),
        ),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
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
		'tahun'=>2016,
		'adminEmail'=>'webmaster@example.com',
	),
);
