<?php


include("header.php");

$username=$_SESSION['userLoggedIn'];


echo "
<br>
<a href=register-landing-page.php>
<button class='btn btn-primary btn-lg'>Find New Groups </button></a>";




     
	$result = mysqli_query($con,"SELECT groups.imgname,groups.imgpath,groups.group_id,groups.group_name, groups.description,groups.username from groups inner join group_members on groups.group_name=group_members.group_name WHERE group_members.username='$username'");
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($con));

            }
echo "<div class='w3-light-grey' id='tour'>
    <div class='w3-container w3-content w3-padding-64' style='max-width:800px'>
  
        <h1>Your Groups</h1>

      <div class='w3-row-padding w3-padding-32' style='margin:0 -16px'>";

     while($group_row=$result->fetch_assoc()){
         
         $img=$group_row['imgpath'].$group_row['imgname'];

            echo  "<div class='w3-third w3-margin-bottom'>
          <img src= \"".$img."\"   height='200' alt='New York' style='width:100%' class='w3-hover-opacity'>
          <div class='w3-container w3-white'>
            <p><b><h6>".$group_row['group_name']."</h6></b></p>
            <p c>".$group_row['username']."</p>
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

