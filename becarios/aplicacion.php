
<?php
require_once('facebook.php');
$facebook = new Facebook(array(
'appId' => '179650645430306',
'secret' => '49ff5ba46555e9796da81466fcc2c381',
));
var_dump($facebook);
$user = $facebook->getUser();
var_dump($user);
if ($user) {
	try{
		
	
	} catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl();
}

?>


<html>
<body>
<h1>Hola</h1>
</body>
</html>