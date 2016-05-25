<?php

include 'eddy-lists-config.php';

$accountname = mysqli_real_escape_string($link, $_POST['accountname']);
$pwd = mysqli_real_escape_string($link, $_POST['pwd']);

$fetch = mysqli_query($link, "SELECT *
									     FROM accounts
										  WHERE accountname = '$accountname'
										  	 AND pwd = SHA1('$pwd')"); 
if (mysqli_num_rows($fetch) > 0)
{
	echo "100";
}
else
{
	echo "200";
}

?>