<?php


include("header.php");


 

?>

<br><br>




<form  id="create_group"  enctype="multipart/form-data" action="_addgroup.php" method="POST">
    
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationServer01">Group name</label>
      <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Group name"  name="groupname" required>
     
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServer02">Group Description</label>
      <input type="textarea" name="groupdes" class="form-control is-valid" id="validationServer02" placeholder="Group Description"  required>
      
    </div>
      <div class="col-md-4 mb-3">
                <label for="validationServer02">select the group interests</label>

        <select id="interest" name="interest" class="form-control is-valid">
            <?php 
            $result = mysqli_query($con,'SELECT interest_name FROM interest');
            
if(!$result) {
                
                  echo("Error description: " . mysqli_error($this->con));

}
    while ($row = $result->fetch_assoc()) {
echo "<option value=".$row['interest_name'].">".$row['interest_name']."</option>
";

    }
?>
  
  </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationServer03">City</label>
      <input type="text" class="form-control is-valid" id="validationServer03" placeholder="City"  name="city"required>
      
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer04">State</label>
      <input type="text"class="form-control is-valid"  id="validationServer04" name="state" placeholder="State" required>
      
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer05">Zip</label>
      <input type="text" class="form-control is-valid" id="validationServer05" name="zipcode" placeholder="Zip" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>
      <div class="form-row">
          
<label for="message-text" class="col-form-label">Image</label>
                <input type="file"  accept="image/*"  name="myimage" onchange="loadFile(event)">
   
<img width="150" height="150" id="output"/>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
  <div class="form-group">
    <div class="form-check">
      <input class="form-control is-valid" type="checkbox" value="" id="invalidCheck3" required>
      <label class="form-check-label" for="invalidCheck3">
        Agree to terms and conditions
      </label>
     
    </div>
  </div>
    </div>
  <button class="btn btn-primary" name="formgroup" type="submit">Submit form</button>
</form>


<?php
	include("footer.php");?>