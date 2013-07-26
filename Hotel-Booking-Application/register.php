<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Insert a Course Record</title>
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
<script type = "text/Javascript" src = "scripts/courseinput.js"></script>
</head>
<body>
<?php require_once 'inc/header.inc.htm'; ?>
    <form action="registerrec.php" method="post" id = "courseentry" class="course">
    <fieldset>
    <legend>Please Complete the Details</legend>

        <div class ="fieldarea">
         <label for="first_name" class="fixedwidth">First Name</label>
          <input type="text" id = "first_name" name="first_name" size="15" maxlength="20" class = "required" />
        </div>
        <div class ="fieldarea">
          <label for="last_name" class="fixedwidth">Last Name</label>
         <input type="text" id="last_name" name="last_name" size="15" maxlength="40"  class = "required"/>
        </div>
        <div class ="fieldarea">
          <label for="email" class="fixedwidth">Email Address</label>
         <input type="text" id="email" name="email" size="20" maxlength="80" class = "required email"/>
          </div>
	        <div class ="fieldarea">
	          <label for="priv" class="fixedwidth">Privilege</label>
		<select name="priv" id= "priv">
		<option  value = "admin">Administrator</option>
		<option value ="general user">General user</option>
		</select>
	        </div>
        <div class ="fieldarea">
          <label for="pass1" class="fixedwidth">Password</label></td>
          <input type="password" id="pass1" name="pass1" size="10" maxlength="20" class = "required"/>
        </div>

       <div class ="fieldarea">
		   <label for="pass2" class="fixedwidth">Confirm Password</label></td>
		    <input type="password" id="pass2" name="pass2" size="10" maxlength="20" class = "required"/>
		</div>

	<div class="buttonarea">
    		<input type="submit" value="Register User" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>
</div>
</div>
</body></html>