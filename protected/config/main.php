<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'App name',
	'language'=>'ru',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.ext.*',
		'application.helpers.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter your password here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
					'request'=>array(
							'enableCsrfValidation'=>true,
							),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			//'urlSuffix' => '.html',
			'rules'=>array(
				array(
					'class' => 'application.components.UrlRule',
					'connectionID' => 'db',
				),
				'/category/<alias:\w+>'=>'news/category',
				'/tag/<name>'=>'news/tagpage',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
	
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => '',
			'emulatePrepare' => true,
			'username' => '',
			'password' => '',
			'charset' => 'utf8',
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
				
				/*array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),
		// Default properties for some widgets
		'widgetFactory' => array(
						'widgets' => array(
								'CListView' => array(
	'ajaxUpdate'=>false,
		'template'=>'{items}{pager}',
        'pager'=>array(
            'header'         => '',
            'htmlOptions' => array('class'=>'pagination hidden-xs clearfix'),
            'cssFile' => false,
            'firstPageLabel' => '&laquo;&laquo;',
            'prevPageLabel'  => '&laquo;',
            'nextPageLabel'  => '&raquo;',
                                                'lastPageLabel'  => '&raquo;&raquo;',
                                                'lastPageCssClass' => 'hidden',
                                                'firstPageCssClass' => 'hidden',	
                                                'selectedPageCssClass' => 'active',
                                                ),
                                'pagerCssClass' => 'text-left',
										),
								),
						),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@mail.ru',
	),
);
