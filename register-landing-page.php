<?php

	include("header.php");
		$username=$_SESSION['userLoggedIn'];





	$result = mysqli_query($con,'SELECT interest_name FROM interest');
            
if(!$result) {
                
                  echo("Error description: " . mysqli_error($this->con));

}

     


echo "
<form  class='ss' action='register-landing-page.php' method='POST'>
<h3>List available Interests</h3>
      <table>
        <tr>
          <td>";
  
    while ($row = $result->fetch_assoc()) {
echo " <input type='checkbox' name='selected[]' id='selected[]' value='".$row['interest_name']."'>".$row['interest_name']."<br>";

    }

echo" 
          </td> 
        </tr>
        <tr>
          <td>
            <br>
          
          <p><input class='btn btn-secondary' type='submit' name='process_selected'  role='button' value='Add'></p>

          </td>
        </tr>
      </table>
      
    </form>";
   





    




 //-----------------------------------------------------------------------------------
  if(isset($_POST['selected']))
  {  
    
      $items = array();
      echo $username."------------------------------------------";
      foreach($_POST['selected'] as $selected_val)
       {
                echo "<h1>".$selected_val."</h1>";
         
            $result = mysqli_query($con,"INSERT INTO interested_in VALUES ('$username','$selected_val')" ) ;
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($con));

}
      }
      
      
      		header("Location: groups.php");

      


  }
  
 
?>
<!-- Material unchecked -->
<style>
    .ss {
   width: Xu;
   height: Yu;
   position: absolute;
   top: 50%;
   left: 40%;
   margin-left: -(X/2)u;
   margin-top: -(Y/2)u;
}</style>
<br><br>
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
<br>
<br>
<br>
<br>
<br>
<br>

<?php
	include("footer.php");?>
