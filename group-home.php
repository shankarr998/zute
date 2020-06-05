<?php
	include("header.php");
$gname=$_GET['gname'];
$_SESSION['gname']=$gname;



echo "      <br>
<div class='container'>
  <div class='row'>
    
   
   
  ";


?>

<?php
$gname=$_SESSION['gname'];
        $username=$_SESSION['userLoggedIn'];

$result = mysqli_query($con,"SELECT * FROM `group_members` WHERE group_name='$gname' AND username='$username'
" ) ;
            if (!$result) {
                
                  echo("Error description: ".mysqli_error($con));

            }
  if (mysqli_num_rows($result) == 0){
      echo" <div class='col-'>
      
<p><a href=_joingroup.php?groupname=$gname>
<Button  class='btn btn-primary btn-lg' value=join>join</Button></a></p>
</div>";
        
     }else{
      
      echo "   
      
      <div class='col-s'>
<p><a href=create_event.php?gname=$gname>
<button class='btn btn-primary btn-lg'>create event</button></a><p>    </div><div class='col-s'>
<p> <button type='button'  class='btn btn-primary btn-lg' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'>Create a group post</button></p>    </div>
 <div class='col-'>
<p><a href=_Leavegroup.php?gname=$gname>
<Button  class='btn btn-primary btn-lg' value=join>Leave</Button></a></p>    </div>
";
      
  }




?>

 </div>
</div>

<div class="w3-content" style="max-width:1600px">
    <div class="w2-row w2-padding w2-border">
   

<style>
 
        .modal {
   position: absolute;
   top: 0px;
   right: 100px;
   bottom: 0;
   left: 0;
   z-index: 10040;
   overflow: auto;
   overflow-y: auto;
}
        </style>
        
<form method="POST" action="_addpost.php" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" name="caption "class="col-form-label">Caption</label>
            <input type="text" class="form-control" name="caption" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" name="postdes" class="col-form-label">Description</label>
            <textarea class="form-control"  name="postdes" id="message-text"></textarea>
          </div>
            <div class="form-group">
            <label for="message-text" class="col-form-label">Image</label>
                <input type="file"  accept="image/*"  name="myimage" onchange="loadFile(event)">
   
<img width="150" height="150" id="output"/>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="postupload" >post</button>
      </div>
    </div>
  </div>
</div>
            
        </form>
    
    
    </div>

</div>

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  



  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">
       <div class="w3-col l3">
      <!-- About Card -->
      <div class="w3-white card w3-margin">
          <br>
                    <h4>&nbsp;About Groups</h4>

        <div class="w3-container card ">
        <?php  
              $gname=$_GET['gname'];


	$result = mysqli_query($con,"SELECT * FROM `groups` WHERE group_name='$gname'");
            if (!$result) {
                  echo("Error description: " . mysqli_error($con));
           
            
            }
            
            
            $row=$row = $result->fetch_assoc();
            
            echo "<p>".$row['description']."</p>";
            ?>
            
            
        </div>
          <br>
      </div>
  

    <!-- END About/Intro Menu -->
    </div>

    <!-- Blog entries -->
 <div class='w3-col l6 s12'>

      <?php 

        $gname=$_GET['gname'];
                       $username=$_SESSION['userLoggedIn'];


	$result = mysqli_query($con,"SELECT * FROM `post` WHERE group_name='$gname'");
            if (!$result) {
                  echo("Error description: " . mysqli_error($con));
            }
      
    while ($row = $result->fetch_assoc()) { 
        if($username==$row['username']){
            echo "  <div class='w3-container  card w3-white w3-margin w3-padding-large'>
        <div class='w3-center'>
          <h1><a href=group-home.php?gname=$gname>".$row['group_name']."</a></h1>
          <h5>".$row['username']." <span class='w3-opacity'>".$row['post_datetime']."</span></h5>
        </div>
        <h6>".$row['post_caption']."</h6>


        <div class='w3-justify'>
          <img src=".$row['post_image_url'].$row['imgname']." alt='Girl Hat' style='width:100%' class='w3-padding-16'>
          <p> ".$row['post_description']."</p>
          <p class='w3-left'><button class='w3-button w3-white w3-border' ><b><i class='fa fa-thumbs-up'></i> Like</b></button></p>
          <p class='w3-right'><a href=_deletepost.php?groupname=$gname><button class='w3-button w3-black' onclick='myFunction('demo1')' id='myBtn'><b>Delete post  </b> <span class='w3-tag w3-white'>1</span></button></a></p>
          <p class='w3-clear'></p>
          <div class='w3-row w3-margin-botto' id='demo1' style='display:none'>
            <hr>
             
             
          </div>
        </div>
      </div>";
            
        }else{
        
        echo "  <div class='w3-container  card w3-white w3-margin w3-padding-large'>
        <div class='w3-center'>
          <h1><a href=group-home.php?gname=$gname>".$row['group_name']."</a></h1>
          <h5>".$row['username']." <span class='w3-opacity'>".$row['post_datetime']."</span></h5>
        </div>
        <h6>".$row['post_caption']."</h6>


        <div class='w3-justify'>
          <img src=".$row['post_image_url'].$row['imgname']." alt='Girl Hat' style='width:100%' class='w3-padding-16'>
          <p> ".$row['post_description']."</p>
          <p class='w3-left'><button class='w3-button w3-white w3-border' onclick='likeFunction(this)'><b><i class='fa fa-thumbs-up'></i> Like</b></button></p>
          <p class='w3-right'><a href=group-home.php?gname=$gname><button class='w3-button w3-black' onclick='myFunction('demo1')' id='myBtn'><b>Replies  </b> <span class='w3-tag w3-white'>1</span></button></a></p>
          <p class='w3-clear'></p>
          <div class='w3-row w3-margin-botto' id='demo1' style='display:none'>
            <hr>
             
             
          </div>
        </div>
      </div>";
        }
        
        
        
    }
     
if (mysqli_num_rows($result) == 0){
         echo"<h1>No Posts Yet In The Group</h1><br>   <button type='button'  class='btn btn-primary btn-lg' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'>Create a group post</button>";
     }




?>   
<hr>
</div>

      
      
      
      
    <div class="w3-col l3">
      <!-- About Card -->
      <div class="w3-white w3-margin">
<?php 
          

        $gname=$_GET['gname'];

     
	$result = mysqli_query($con,"SELECT * FROM events Where groupname='$gname'");
            if (!$result) {
                
                  echo("Error description: " . mysqli_error($con));

            }
          if (mysqli_num_rows($result) == 0){
         echo"
         <div class='container card'><h1>No Events Yet</h1><br><a href=create_event.php?gname=$gname >  <button type='button'  class='btn btn-primary btn-lg' >create event</button></a>
         <br></div>";
     }else{
              
          
 echo "<div class='container card'>
 <br>
 <h2>Your Events <span class='label label-default'></span></h2>";
    while ($row = $result->fetch_assoc()) { 
        
        echo "<br><div class='card bg-light text-white'>
    <div class='card-body'><a href=_rsvp.php?eid=".$row['event_id'].">".$row['title']."</a></div>
  </div>";
        
        
        
    }
echo "<br><div class='card bg-light text-black'>
    <div class='card-body'><a href=events.php>All Events</a></div></div>
    <br>
    "
    ;
          }


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
<footer class="w3-container w3-dark-grey" style="padding:32px">
  <a href="#" class="w3-button w3-black w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<?php
	include("footer.php");?>