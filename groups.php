<?php


include("header.php");

$username=$_SESSION['userLoggedIn'];

echo "<a href=register-landing-page.php>
<button class='btn btn-primary btn-lg'>find new groups </button></a>";




     
	$result = mysqli_query($con,"SELECT * FROM groups");
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($con));

            }
echo "<div class='w3-light-grey' id='tour'>
    <div class='w3-container w3-content w3-padding-64' style='max-width:800px'>
  
        <h1>Your Groups</h1>

      <div class='w3-row-padding w3-padding-32' style='margin:0 -16px'>";


     while($group_row=$result->fetch_assoc()){
            $groupid=(int)$group_row['group_id'];
            echo  "<div class='w3-third w3-margin-bottom'>
          <img src='1.jpg' alt='New York' style='width:100%' class='w3-hover-opacity'>
          <div class='w3-container w3-white'>
            <p><b>".$group_row['group_name']."</b></p>
            <p class='w3-opacity'>".$group_row['username']."</p>
            <p>".$group_row['description'].".</p>
            <a href=group-home.php?gname=".$group_row['group_name'].">
            <button class='w3-button w3-light-grey w3-margin-bottom' onclick='group-home.php'>open</button>
            </a>
          </div>
        </div>";


 
  

     }
    



      
        echo "
      </div>
    </div>
  </div>

";



?>


<?php
	include("footer.php");?>
