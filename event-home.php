<?php
	include("header.php");?>

<br>
<style>


.s {
  position: absolute;
  left: 500px;
  top: 200px;
}</style>

<br>
<?php

$eid=$_GET['eid'];


echo "
<br><div class='s'>
<div class='card text-center' style='width: 25rem;'>";


$res = mysqli_query($con,"SELECT * from events WHERE event_id='$eid'" ) ;
            if (!$res) {
                
                  echo("Error description: ".mysqli_error($con));

            }

$res = $res->fetch_assoc();
echo "<div class='card-header'>
    ".$res['groupname']."
  </div>
  <div class='card-body' 	>
    <h5 class='card-title'>".$res['title']."</h5>
    <p class='card-text'>    ".$res['description']."
</p>
    <a href=_rsvp.php?eid=".$eid." ><Button   onclick='myFunction()' class='w3-button w3-block w3-padding-large w3-red w3-margin-bottom'>Attend</Button></a>
  </div>
  <div class='card-footer text-muted'>
   Send RSVP
  </div>
</div>
</div>";
    
    ?>

<script>
function myFunction() {
  alert("You\'ve Sent Confirmation");
    
}
</script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
	include("footer.php");?>