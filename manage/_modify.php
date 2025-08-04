<?php
	if(stristr($_SERVER['PHP_SELF'],"add"))
		{echo date("Y/m/d")." -- ".$_SESSION["Login_ID"];}
	else
		{echo Date_EN($dtUDate,1)." -- ".$UserID;}
?>
