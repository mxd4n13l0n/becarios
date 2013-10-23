<html>
<body>
<pre>
<?php
require_once('facebook.php');
$facebook = new Facebook(array(
'appId' => '179650645430306',
'secret' => '49ff5ba46555e9796da81466fcc2c381',
));
//var_dump($facebook);
$user = $facebook->getUser();
//var_dump($user);
if ($user) {
	try{
	$user_friends = $facebook->api('/me','GET',array('fields'=>'friends'));
	//print_r($user_friends);
	foreach ($user_friends['friends']['data'] as $amigo) {
	//echo '<br/>'.$amigo['id'];
		echo "<img src='http://graph.facebook.com/".$amigo['id']."/picture' />";
	}
	} catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl(array('scope'=>'read_stream', 'redirect_uri'=>'http://apps.facebook.com/mxdanielon/'));
  var_dump($statusUrl);
  var_dump($loginUrl);
  ?>
  <script type="text/javascript">
  	//alert("hola");
  	window.top.location.href = "<?php echo $loginUrl ; ?>"; 
  </script>
<?php  
}
?>
</pre>
</body>
<h1>index</h1>
</html>