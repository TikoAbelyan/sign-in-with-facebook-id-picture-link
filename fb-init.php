<?php
if (!session_id()) {
    session_start();
}
require "./vendor/autoload.php";

$fb = new Facebook\Facebook([
    'app_id' => '***your id***',
    'app_secret' => '***your app secret code***',
    'default_graph_version' => 'v3.3'
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/fb-login/");

try{
    $accessToken = $helper->getAccessToken();
    if(isset($accessToken)){
        $_SESSION['access_token'] = (string) $accessToken;
        header("Location:index.php");
    }
} catch(Exception $exc){
    echo $exc->getTraceAsString();
}

if(isset($_SESSION['access_token'])){
    try{
        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('/me?locale=en_US&fields=name,picture,id,link');
        $user = $res->getGraphUser();
        echo "hello ",$user->getField('name') ."<br>";
        echo  "<div class='hidden'>".$user->getField('link'). "</div>";
        echo "<img src=".$user->getField('picture')['url'].">";

    } catch(Exception $exc){
        echo $exc->getTraceAsString();
    }
}
