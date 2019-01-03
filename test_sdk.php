<?php
require_once 'vendor/autoload.php';


use ExinOne\MixinSDK\MixinSDK;
// Configuration file format
$config0 = array(
    'mixin_id'      => '7000101690',
    'client_id'     => '4d64a975-897f-4609-a67d-a1a976f3211a',
    'client_secret' => '08f78877b91dd76537db8e2beb13195be2c8394adcfdc17d7c6ee450a72789de',
    'pin'           => '563613',
    'pin_token'     => 'mQMvkCd4hJyQTZt2FVyQ/IiGQWt++Znp0ufsdhDrsE1u6jU0eZQGxXO56vqs67dVsGQ7boP7aJspoZ4aPYMvsC9yhyYx5XzhDS9jlTtM04Ww7rDEAyA9APmLt5a0CUZIozz0bUUXwlsFC3wS1tWgz3enkkOiYrgcJkX6KLvLJEE=',
    'session_id'    => 'ee0fcec8-01eb-44f4-b49d-24926d60fdc5',
    'private_key'   => '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQDhZj2zktkgRycLztfDmgTju4ZvzLxPnaAhVejltRyAs98GJnJC
+YoGPoBFFHUfFRcyPAzf6k4OzuoITFZAYYly9csmbZq4RtXb7Ww7SoBXD7xJ7wdS
osOWTODokRYAyaP2AhZAM3IHH3EXbOF93mkOFLJmmBvTDZz1me7cyw1y7wIDAQAB
AoGAHB6VNAHt9Ijr5h037b8ZPQ/4BZqVI5mWkJIXLBEcLTJDcJD7UD+xaHYDqpqS
wf3vluTG9mhUtKQ7ri1X1VBVxTXUEY+NHeh0EKlfP5/2ZFi5MNqOqUJVfi37GoJj
j/X76gEN3xeVg17jyGxP1yQZNMT+XjMW/RTSOG5MDzLKhoECQQDzLSB/5+ihf5xA
lhHH9Bg64RnZ0667V51pCOEs/QT8uWtsMlEr1CXkCixX8C5fGzAGZsizqvD3MWmt
H5A9BQXbAkEA7UkgXfWFU52abrfSXUl6+gF2mnooodMoX8u9Ux/seOGGK+/z3mRs
3f78nPM00nSqguzU9E9P7t1a0B0HdK31fQJAUlcSbRzqkVyzXM8zwB/v4Gf+J9rc
jITzQPCHxoL6IFTsgdtbztpr5hZnw3MJUJzVGyXMicG1DA6ION26Kl88BwJBAIaX
BOHmonJUIcWNRKgfRr7J17E1exiXAf6cPM4KfIHwQb9oQmYxhkLBIB4SITMCc7kB
hqTw28D8E0eaP6FiDq0CQFjYaLfRiZWE3y1vYpB9snbBMF+lqJ5cCjR+ScfVkUGN
xPbnCdMayTQm9jRVORgD/o/iGKaoPjvN+REqSg6zY+E=
-----END RSA PRIVATE KEY-----'
);


$mixinSdk = new \ExinOne\MixinSDK\MixinSDK();
// use setConfig method to save config
$mixinSdk->setConfig('myConfig-A',$config0);
//$mixinSdk->setConfig('myConfig-B',$config1);
// then you can
//echo json_encode($mixinSdk->use('myConfig-A')->user()->readProfile());
echo "Yeah!!! \n";
//$params = array(array('user_id' => '3c4c9673-2c0a-4547-bfd0-c1ea66e43634', 'role' => '', 'created_at' => '2018-12-20T21:31:33.534398765Z'));
//$resp = json_encode($mixinSdk->use('myConfig-A')->network()->createConversations("CONTACT", $params, null));
//$conv_id = json_decode($resp);
//echo $conv_id->conversation_id;

if (get_magic_quotes_gpc()) { echo "sosi"; }
if (get_magic_quotes_runtime()) { echo "sosay"; }

$mixinSdk->use('myConfig-A')->network()->createConversations('CONTACT', [
            [
                'action'  => 'ADD',
                'role'    => '',
                'user_id' => '3c4c9673-2c0a-4547-bfd0-c1ea66e43634',
            ],
        ]);


echo json_encode($mixinSdk->use('myConfig-A')->message()->sendBatchMessage(['3c4c9673-2c0a-4547-bfd0-c1ea66e43634',], ['Your unlock code is 11111111',]));//sendText('3c4c9673-2c0a-4547-bfd0-c1ea66e43634', '11111111'));

//-------
// Or more simple way, using the 'use' method , chained with other methods
//$mixinSdk->use('myConfig-A',$config)->user()->readProfile();
// then you can
//$mixinSdk->use('myConfig-A')->user()->readProfile();


?>
