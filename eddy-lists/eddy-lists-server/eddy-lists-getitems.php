<?php

include 'eddy-lists-config.php';

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
	while ($row = mysqli_fetch_assoc($fetch)) 
	{
	echo  '<li class="mylist">'; 
	echo '<span class="mylistname">'; 
	echo utf8_encode($row['itemname']);
	echo '</span>';
	echo '<span class="mylistdateadded">';
	echo utf8_encode($row['dateadded']);
	echo '</span>';
  echo '<span class="checkitem"></span>';
	echo  "</li>";
	}
}
else
{
	echo  '<li class="mylist">'; 
	echo "Aucun item pour l'instant";
	echo  "</li>";	
}

?>