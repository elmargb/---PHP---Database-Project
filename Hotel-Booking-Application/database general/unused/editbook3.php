$leader=trim($_POST['room']);
$years=$_POST['datetime'];
$points=$_POST['length'];
$code=$_POST['bookingid'];

$sql ="update course set
       courseleader = '$leader',//courseleader
       years = $years,//years,points,coursecode
       points = $points
       where coursecode='$code'";

    if (@mysqli_query($link, $sql)) {
      echo 'Your course record has been updated.';
    } else {
      echo 'Error updating submitted course record: ' .
          mysqli_error($link) ;
    } 
