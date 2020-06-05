<?php
	include("header.php");?>

<!DOCTYPE html>
<html>

    



  
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  
<style>
    a {
    color: #000;
}</style>


  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">
       <div class="w3-col l3">
      <!-- About Card -->
      <div class="w3-white card w3-margin">
          <?php 
                  $username=$_SESSION['userLoggedIn'];

          
          $result = mysqli_query($con,"SELECT groups.group_id,groups.group_name, groups.description,groups.username from groups inner join group_members on groups.group_name=group_members.group_name WHERE group_members.username='$username'");
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($con));

            }
          echo "
          <br> <h2> &nbsp;Your Groups <span class='label label-default'></span></h2>";

              while ($row = $result->fetch_assoc()) { 

          
          echo " <div class='w3-white card w3-margin'>
              <div class='card-body'><a href=group-home.php?gname=".$row['group_name'].">".$row['group_name']."</a></div>

          
          </div>";
              }
          
          
          ?>
      </div>
  

    <!-- END About/Intro Menu -->
    </div>


      
      
      <div class='w3-col l6 s12'>

      <?php 

        
	$result = mysqli_query($con,"SELECT * FROM `post`");
            if (!$result) {
                  echo("Error description: " . mysqli_error($con));
            }
      
    while ($row = $result->fetch_assoc()) { 
        if($username==$row['username']){
            echo "  <div class='w3-container  card w3-white w3-margin w3-padding-large'>
        <div class='w3-center'>
          <h1><a href=group-home.php?gname=".$row['group_name'].">".$row['group_name']."</a></h1>
          <h5>".$row['username']."</h5>
        </div>
        <h6>".$row['post_caption']."</h6>


        <div class='w3-justify'>
          <img src=".$row['post_image_url'].$row['imgname']." alt='Girl Hat' style='width:100%' class='w3-padding-16'>
          <p> ".$row['post_description']."</p>
          <p class='w3-left'><button class='w3-button w3-white w3-border' ><b><i class='fa fa-thumbs-up'></i> Like</b></button></p>
          <p class='w3-right'><a href=_deletepost.php?groupname=".$row['group_name']."><button class='w3-button w3-black' onclick='myFunction('demo1')' id='myBtn'><b>Delete post  </b> <span class='w3-tag w3-white'>1</span></button></a></p>
          <p class='w3-clear'></p>
          <div class='w3-row w3-margin-botto' id='demo1' style='display:none'>
            <hr>
             
             
          </div>
        </div>
      </div>";
            
        }else{
        
        echo "  <div class='w3-container  card w3-white w3-margin w3-padding-large'>
        <div class='w3-center'>
          <h1><a href=group-home.php?gname=".$row['group_name'].">".$row['group_name']."</a></h1>
          <h5>".$row['username']."</h5>
        </div>
        <h6>".$row['post_caption']."</h6>


        <div class='w3-justify'>
          <img src=".$row['post_image_url'].$row['imgname']." alt='Girl Hat' style='width:100%' class='w3-padding-16'>
          <p> ".$row['post_description']."</p>
          <p class='w3-left'><button class='w3-button w3-white w3-border' onclick='likeFunction(this)'><b><i class='fa fa-thumbs-up'></i> Like</b></button></p>
          <p class='w3-right'><a href=group-home.php?gname=".$row['group_name']."><button class='w3-button w3-black' onclick='myFunction('demo1')' id='myBtn'><b>Replies  </b> <span class='w3-tag w3-white'>1</span></button></a></p>
          <p class='w3-clear'></p>
          <div class='w3-row w3-margin-botto' id='demo1' style='display:none'>
            <hr>
             
             
          </div>
        </div>
      </div>";
        }
        
        
        
    }



?>   
<hr>
</div>

      

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    <div class="w3-col l3">
      <!-- About Card -->
      <div class="w3-white w3-margin">
<?php 
          

    
     
	$result = mysqli_query($con,"SELECT * FROM events ");
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($con));

            }
 echo "<div class='container card'>
 <br>
 <h2>Your Events <span class='label label-default'></span></h2>";
    while ($row = $result->fetch_assoc()) { 
        
        echo "<br><div class='card bg-light text-white'>
    <div class='card-body'><a href=_rsvp.php?eid=".$row['event_id'].">".$row['title']."</a></div>
  </div>";
        
        
        
    }
echo "<br><div class='card bg-light text-black'>
    <div class='card-body'><a href=events.php>all events</a></div></div>
    <br>
    "
    ;


?>          
<!--
        <div class="card bg-light ">
          <h6>My Name</h6>
          <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
        </div>
-->
          <br>
      </div>
  

    <!-- END About/Intro Menu -->
    </div>

  <!-- END GRID -->
  </div>

<!-- END w3-content -->
</div>

<!-- Subscribe Modal -->
<div id="subscribe" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content" style="padding:32px">
    <div class="w3-container w3-white">
      <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-transparent w3-button w3-xlarge w3-right"></i>
      <h2 class="w3-wide">SUBSCRIBE</h2>
      <p>Join my mailing list to receive updates on the latest blog posts and other things.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<!-- Footer -->
<

<?php
	include("footer.php");?>

