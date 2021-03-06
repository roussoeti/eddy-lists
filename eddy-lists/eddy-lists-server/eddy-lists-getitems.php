<?php

include 'eddy-lists-config.php';


header('Content-Type: application/json; charset=utf-8');

$accountname = mysqli_real_escape_string($link, $_POST['accountname']);
$pwd = mysqli_real_escape_string($link, $_POST['pwd']);
$idlist = mysqli_real_escape_string($link, $_POST['idlist']);

$fetch = mysqli_query($link, "SELECT it.itemname, it.iditem, it.dateadded 
									     FROM items it
									     	 LEFT JOIN lists lt
									     	 	ON it.idlist = lt.idlist
											 LEFT JOIN accounts an
												ON an.accountname = lt.accountname
										  WHERE it.idlist = $idlist
										  	 AND an.accountname IS NOT NULL
										  	 AND an.pwd = SHA1('$pwd')"); 
if (mysqli_num_rows($fetch) > 0)
{
  $itemarray = array();

	while ($row = mysqli_fetch_assoc($fetch)) 
	{
	  $itemarray[] = $row;
	}  
  print json_encode(utf8ize($itemarray));
}
else
{
	echo  '<li class="mylist">'; 
	echo "Aucun item pour l'instant";
	echo  "</li>";	
}

?>