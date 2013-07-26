<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Insert a Course Record Result</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require 'inc/header.inc.htm';
?>

<h2>Insert a Book</h2>
<p>
<?php  
require_once 'inc/header.inc.htm';
require_once '../db3.inc.php';

$code = $_GET['ISBN'];
$query="select * from book where ISBN = '$code'";
$course = @mysqli_query($link, $query);
if (!$course) {
     exit('Error fetching course details: '. mysqli_error($link));
}
$row = mysqli_fetch_array($course);
$ISBN = $row['ISBN'];
$title = $row['Title'];
$leader= $row['Author'];
$years = $row['Publisher'];
$points = $row['Price']; 



<form action = "editcourse3.php" method = "post" id = "bookupdate" class="course">
    <fieldset>
        <div class ="fieldarea">
         <label for="ccode" class="fixedwidth">ISBN</label>
         <input type="text" name="ccode" id="ccode" size="5" maxlength="5" disabled = "disabled" value = "<?php echo $code; ?>" />
        </div>
        <div class ="fieldarea">
          <label for="title" class="fixedwidth">Title</label>
         <input type="text" name="title" id="title" size="35" disabled = "disabled" value = "<?php echo $title; ?>" />
        </div>
       <div class ="fieldarea">
          <label for="leader" class="fixedwidth">Author</label>
         <input type="text" name="leader" id="leader" size="20" class = "required" value = "<?php echo $leader; ?>" />
         </div>
       <div class ="fieldarea">
          <label for="years" class="fixedwidth">Publisher</label>
	<select name="years" id = "years">
        <?php
        for ($i= 1; $i<=4; $i++)
        {
        if ($i == $years)
        {
          echo"<option selected = 'selected' value ='$years'>" . "$years</option>\n";
         }
         else {
          echo"<option value = '$i'>$i</option>\n";
         }
        }
        ?>
	</select>
      </div>
       <div class ="fieldarea">
          <label for="points" class="fixedwidth">Points</label></td>
          <td><input type="text" name="points" id="points" size="4" maxlength ="3" class = "numeric inrange" value = "<?php echo $points; ?>" />
                </td></tr>
        </div>
         <div class ="fieldarea">
         <input type="hidden" name="code" id="code" size="5" maxlength="5" value = "<?php echo $code; ?>" />
        </div>
	<div class="buttonarea">
    		<input type="submit" value="Update Course Record" />
    		<input type="reset" value="Clear the Info" />
	</div>
    </fieldset>
    </form>


echo '</table>';
?>
</p>
</body>
</html>