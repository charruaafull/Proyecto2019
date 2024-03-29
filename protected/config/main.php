<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'TiendaProductos.com',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(),
    // application components
    'components' => array(
        'user' => array(
            'loginUrl' => array('login'),
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/<view>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'contacto' => 'site/Contacto',
                'ViewProducts' => 'site/ViewProducts',
                'Cart' => 'site/Cart',
                'AddProduct' => 'site/AddProduct',
                'DeleteProductCart' => 'site/DeleteProductCart',
                'ChangeCantidad' => 'site/ChangeCantidad',
                'Register' => 'site/Register',
                'ValidaRegistro' => 'site/ValidaRegistro',
                'Login' => 'site/Login',
                'AjaxValidaLogin' => 'site/AjaxValidaLogin',
                'Logout' => 'site/Logout',
                'ViewProduct' => 'site/ViewProduct'
            ),
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => YII_DEBUG ? null : 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'mail@info.com',
    ),
    'language' => 'es',
    'sourceLanguage' => 'es',
    'timeZone' => 'America/Argentina/Buenos_Aires',
);
