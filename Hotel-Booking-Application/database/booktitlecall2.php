<?php require 'inc/secure.inc.php';?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Course By Code Query</title>
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script>

</head>
<body>
<?php

require_once 'inc/header.inc.htm';
require_once '../db3.inc.php';
?>


<form action="select22.php" method="post" id = "bookingidquery" class="course">
    <fieldset>
    <legend>Customer Records</legend>
        <div class ="fieldarea">
          <label for="code" class="fixedwidth">Customers</label>
	<input type = "text" name = "name" id ="code" size="5" maxlength="20" class = "required"/>
        </div>
	<div class="buttonarea">    
    		<input type="submit" value="Submit" /> 
    		<input type="reset" value="Clear" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body></html>