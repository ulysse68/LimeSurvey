<?php if (!class_exists('Yii', false)) die('No direct script access allowed in ' . __FILE__);

/**
 * This file contains configuration parameters for the Yii framework.
 * Do not change these unless you know what you are doing.
 * 
 */
$internalConfig = array(
	'basePath' => dirname(dirname(__FILE__)),
	'runtimePath' => dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'tmp'.DIRECTORY_SEPARATOR.'runtime',
	'name' => 'LimeSurvey',
	'defaultController' => 'survey',
	'theme' => 'default',
	'import' => array(
		'application.core.*',
		'application.models.*',
		'application.controllers.*',
		'application.modules.*',
	),
    'preload' => array(
        'limescript',
        'bootstrap'
    ),
	'components' => array(
        'limescript' => array(
            'class' => 'ext.LimeScript.LimeScript'
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => false,
            'jqueryCss' => false
        ),
		'urlManager' => array(
			'urlFormat' => 'get',
			'rules' => require('routes.php'),
			'showScriptName' => true,
		),
        
        'clientScript' => array(
            'packages' => require('third_party.php')
        ),
        'user' => array(
            'class' => 'LSWebUser',
        ),
        'viewRenderer' => array(
            'class' => 'ext.PolyViewRenderer.PolyViewRenderer',
            'renderers' => array(
                'twig' => array(
                    'class' => 'ext.TwigRenderer.ETwigViewRenderer',
                    'twigPathAlias' => 'application.third_party.Twig',
                    'options' => array(
                        'cache' => false
                    )
                )
            )

        ),
        'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
				),

			),
		),
        'messages' => array(
            'class' => 'CGettextMessageSource',
            'useMoFile' => true,
            'useBigEndian' => false,
            'language' => 'en'

            
        )
        
	)
);

$userConfig = require(dirname(__FILE__) . '/config.php');
return CMap::mergeArray($internalConfig, $userConfig);
/* End of file internal.php */
/* Location: ./application/config/internal.php */