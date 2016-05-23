<?php


$link = mysqli_connect("localhost", "eddySoft", "eddy$1511", "eddylists");	 
$fetch = mysqli_query($link, "SELECT listname FROM lists"); 

while ($row = mysqli_fetch_assoc($fetch)) {
echo  '<li class="ui-li-static ui-body-inherit"><a href="#" data-icon="arrow-r" data-role="none" data-iconpos="right" class="ui-btn ui-btn-icon-right ui-icon-carat-r">'; 
echo $row['listname'];
echo  "</li>";
}


?>