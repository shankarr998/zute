<?php


include("header.php");

$username=$_SESSION['userLoggedIn'];


    
     
	$result = mysqli_query($con,"SELECT * FROM events ");
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($con));

            }
 echo "<div class='container'>";
;
    while ($row = $result->fetch_assoc()) { 
        
        echo "<div class='card bg-secondary text-white'>
    <div class='card-body'><a href=_rsvp.php?eid=".$row['event_id']."><Button value=join>attend</button></a>".$row['title']."</div>
    
  </div>";
        
        
        
    }
echo "</div>";






?>

<?php
	include("footer.php");?>


