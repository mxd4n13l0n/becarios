<?php

foreach ($_GET as $valor){
	//echo '<br />'.$valor;
	echo "
<img src='http://httpcats.herokuapp.com/$valor'
width='30px'/>
<br />";
}