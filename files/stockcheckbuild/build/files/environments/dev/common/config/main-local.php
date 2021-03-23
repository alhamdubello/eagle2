<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=172.31.150.17;dbname=stockcheck;',
            'username' => 'root_host',
            'password' => 'root_host',
            'charset' => 'utf8',
            'tablePrefix' => 'sc_',
        		
        	//enable schema
        	'enableSchemaCache' => true,
        	// Duration of schema cache.
        	'schemaCacheDuration' => 3600,
        	//'schemaCacheDuration' => 432000, //5 days
        	// Name of the cache component used to store schema information
        	'schemaCache' => 'cache',
        		
	        /*
        	'on afterOpen' => function($event) { 
				$event->sender->createCommand("SET time_zone='+00:00';")->execute(); 
	        },
	        */
        ],
        'mailer' => [
            //'class'            => 'zyx\phpmailer\Mailer',
            'class'            => 'yii\swiftmailer\Mailer',
            'viewPath'         => '@common/mail',
            'useFileTransport' => true,
            'transport'           => [
                'class'     => 'Swift_SmtpTransport',
                'host'       => 'mail.stockcheck.com',
                'port'       => '587',
            	'encryption' => 'tls',
            		
            	'streamOptions' => [
					'ssl' => [
            			'allow_self_signed' => true,
            			'verify_peer' => false,
            			'verify_peer_name' => false,
            		],
            	],
                'username'   => 'test@stockcheck.com',
                'password'   => '',
            ],
        	'htmlLayout' => 'layouts/html',
        ],
    	'elasticsearch' => [
    		'class' => 'yii\elasticsearch\Connection',
    		'nodes' => [
    			['http_address' => '110.2.20.9:9200'],
    			['http_address' => '110.2.20.39:9200'],
    			['http_address' => '110.2.20.40:9200'],
    			// configure more hosts if you have a cluster
    		],
    	],
        'authManager' => [
        	'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
