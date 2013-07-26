<?php require 'inc/secure.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Insert a Course Record</title>
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script></head>
<body>
<?php require 'inc/header.inc.htm'; ?>

    <form action="insertc.php" method="post" id = "customerentry" class="course">
    <fieldset>
    <legend>Please Complete the Details</legend>

        <div class ="fieldarea">
         <label for="customerid" class="fixedwidth">ID</label>
          <input type="text" name="customerid" id="ccode" size="9" maxlength="9" class = "numeric"/>
        </div>
        <div class ="fieldarea">
          <label for="name" class="fixedwidth">Name</label>
         <input type="text" name="name" id="title" size="35" class = "text"/>
        </div>
        <div class ="fieldarea">
          <label for="address" class="fixedwidth">Address</label>
         <input type="text" name="address" id="leader" size="20" class = "text"/>
          </div>
        <div class ="fieldarea">
          <label for="telephone" class="fixedwidth">Telephone</label>
         <input type="numeric" name="telephone" id="years" size="11" maxlength ="11" class = "numeric" />
        </div>
        <div class ="fieldarea">
          <label for="age" class="fixedwidth">Age</label></td>
          <input type="numeric" name="age" id="points" size="4" maxlength ="3" class = "numeric"/>
        </div>
</select>
	<div class="buttonarea">
    		<input type="submit" value="Insert Customer Record" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body></html>