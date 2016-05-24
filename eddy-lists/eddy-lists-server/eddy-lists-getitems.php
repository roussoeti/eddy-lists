<?php

include 'eddy-lists-config.php';

$accountname = mysqli_real_escape_string($link, $_POST['accountname']);
$pwd = mysqli_real_escape_string($link, $_POST['pwd']);
$idlist = mysqli_real_escape_string($link, $_POST['idlist']);


$fetch = mysqli_query($link, "SELECT it.itemname, it.iditem 
									     FROM items it
									     	 LEFT JOIN lists lt
									     	 	ON it.idlist = lt.idlist
											 LEFT JOIN accounts an
												ON an.accountname = lt.accountname
										  WHERE it.idlist = $idlist
										  	 AND an.accountname IS NOT NULL
										  	 AND an.pwd = '$pwd'"); 
if (mysqli_num_rows($fetch) > 0)
{
	while ($row = mysqli_fetch_assoc($fetch)) 
	{
	echo  '<li class="ui-li-static ui-body-inherit"><a id="list-'.$row["iditem"].'" href="#paListItems" data-icon="arrow-r" data-role="none" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-icon-carat-r">'; 
	echo utf8_encode($row['itemname']);
	echo  "</li>";
	}
}
else
{
	echo  '<li class="ui-li-static ui-body-inherit">'; 
	echo "Aucun item pour l'instant";
	echo  "</li>";	
}

?>