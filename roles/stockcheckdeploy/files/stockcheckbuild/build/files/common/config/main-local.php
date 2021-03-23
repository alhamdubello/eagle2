<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            //'dsn' => 'mysql:host=172.24.198.193;dbname=stockcheck;',
            'dsn' => getenv("DB_DSN"),
            'username' => getenv("DB_USER"),
            'password' => getenv("DB_PASSWORD"),
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
        'db_cart' => [
            'class' => 'yii\db\Connection',
            //'dsn' => 'mysql:host=172.24.198.193;dbname=stockcheck;',
            'dsn' => getenv("DB_DSN_STOCKCHECK_CART"),
            'username' => getenv("DB_USER"),
            'password' => getenv("DB_PASSWORD"),
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
        ],
        'mailer' => [
            //'class'            => 'zyx\phpmailer\Mailer',
            'class'            => 'yii\swiftmailer\Mailer',
            'viewPath'         => '@common/mail',
            'useFileTransport' => getenv("SMTP_USE_FILE_TRANSPORT"),
            'transport'           => [
                'class'     => 'Swift_SmtpTransport',
                'host'       => getenv("SMTP_HOST"),
                'port'       => getenv("SMTP_PORT"),
                'encryption' => getenv("SMTP_ENCRYPTION"),
                    
                'streamOptions' => [
                    'ssl' => [
                        'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],
                'username'   => getenv("SMTP_USER"),
                'password'   => getenv("SMTP_PASSWORD"),
            ],
            'htmlLayout' => 'layouts/html',
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => getenv("ES_NODE1")],
                //['http_address' => getenv("ES_NODE2")],
                //['http_address' => getenv("ES_NODE3")],
                // configure more hosts if you have a cluster
            ],
            // set autodetectCluster to false if you don't want to auto detect nodes
            'autodetectCluster' => false,
            'dslVersion' => 7
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => getenv("REDIS_NODE1"),
            'port' => getenv("REDIS_PORT"),
            'database' => 0,
            //'useSSL' => false,
            'password' => getenv("REDIS_PASSWORD"),
            'retries' => 5
        ],
        'cache' => [
            //'class' => 'yii\redis\Cache',
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
