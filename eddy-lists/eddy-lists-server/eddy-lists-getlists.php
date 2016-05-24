<?php

include 'eddy-lists-config.php';

$accountname = mysqli_real_escape_string($link, $_POST['accountname']);
$pwd = mysqli_real_escape_string($link, $_POST['pwd']);
$listtype = mysqli_real_escape_string($link, $_POST['listtype']);


if ($listtype == 'personal')
	{
	$fetch = mysqli_query($link, "SELECT lt.listname, lt.idlist 
										     FROM lists lt
												 LEFT JOIN accounts an
													ON an.accountname = lt.accountname
											  WHERE lt.accountname = '$accountname'
											  	 AND an.accountname IS NOT NULL
											  	 AND an.pwd = '$pwd'"); 
	if (mysqli_num_rows($fetch) > 0)
	{
		while ($row = mysqli_fetch_assoc($fetch)) 
		{
		echo  '<li class="ui-li-static ui-body-inherit"><a id="list-'.$row["idlist"].'" href="#paListItems" data-icon="arrow-r" data-role="none" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-icon-carat-r" data-transition="flip">'; 
		echo utf8_encode($row['listname']);
		echo  "</li>";
		}
	}
	else
	{
		echo  '<li class="ui-li-static ui-body-inherit">'; 
		echo "Aucune liste pour l'instant";
		echo  "</li>";	
	}

}
else if ($listtype == 'shared')
{

	$fetch = mysqli_query($link, "SELECT lt.listname, lt.idlist 
										     FROM sharedlists sl
										       LEFT JOIN lists lt
										       	ON lt.idlist = sl.idlist
												 LEFT JOIN accounts an
													ON an.accountname = sl.sharedaccountname												
											  WHERE sl.sharedaccountname = '$accountname'
											  	 AND an.accountname IS NOT NULL
											  	 AND an.pwd = '$pwd'"); 

	if (mysqli_num_rows($fetch) > 0)
	{
		while ($row = mysqli_fetch_assoc($fetch)) 
		{
		echo  '<li class="ui-li-static ui-body-inherit"><a id="list-'.$row["idlist"].'" href="#paListItems" data-icon="arrow-r" data-role="none" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-icon-carat-r" data-transition="flip">'; 
		echo utf8_encode($row['listname']);
		echo  "</li>";
		}
	}
	else
	{
		echo  '<li class="ui-li-static ui-body-inherit">'; 
		echo "Aucune liste partagée pour l'instant";
		echo  "</li>";
	}	
}


?>