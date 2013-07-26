<?php
$link = @mysqli_connect('localhost', 'root', 'root');
if (!$link)
{
	echo 'Unable to connect to the database server.';
	exit();
}

 if (!@mysqli_select_db($link,'hotel')){
	exit('Unable to locate the bookshop database.');

}
?>