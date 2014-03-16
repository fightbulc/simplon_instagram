<?php

    require __DIR__ . '/../vendor/autoload.php';

    $userAccessToken = 'CAADDTZC7V0TEBAH1OoGIFmoV1fejPE2PqB8QiGEaQNbmx2ttYZCEE7zNzUHmqsJyZBHspXOg3DEwBxN5lv6MsZABl8jyADNAUE8xPyxyydd9Nd7awHJUz0zzfI24DeauDJD2NEfXhO9JBHq8AYlcZAoBqIBpX4AtFVrNmOsdbDvlaN7DWd8i8Imew5pSkDaUrCDgdOp1P7gZDZD';
    $pageAccessToken = 'CAADDTZC7V0TEBAPXG960A7AF1TSwbJVUK77NBYRAON7ohZChUejsbHtQ1eFJyZAATRqxAW2d8ONLdJweFOiO6v6RaaBCrE3hLUZCihVGe2saeCLNZAI325GdRpQRQZBnKnbPGqL5xnIcPU9WnezwXpImZBxRBFQYdFiil3rpSUCIHryJ6EZCh05uQ2lnR3Lb3eYZD';
    
    // ##########################################

    $facebookAuthVo = (new \Simplon\Facebook\Core\Vo\FacebookAuthVo())
        ->setAppId('214748345258289')
        ->setAppSecret('d65b884a39f4d5f574a54f8676c2184d');

    $facebook = (new \Simplon\Facebook\Core\Facebook($facebookAuthVo))
        ->setUserAccessToken($userAccessToken)
        ->setPageAccessToken($pageAccessToken);

    // ##########################################

//    var_dump($facebook->getFacebookDebugTokenVo($facebook->getAppAccessToken())->getTokenType());
//    var_dump($facebook->getFacebookDebugTokenVo($facebook->getUserAccessToken())->getTokenType());
//    var_dump($facebook->getFacebookDebugTokenVo($facebook->getPageAccessToken())->getTokenType());    
    exit;
    
    $facebookUser = new \Simplon\Facebook\User\FacebookUsers($facebook);
    var_dump($facebookUser->getAccountsData());