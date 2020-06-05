<?php
include("header.php");

$username=$_SESSION['userLoggedIn'];

$gname=$_GET['gname'];


?>



<form  id="create_group" action="_addevent.php" method="POST">
    
 
    
      <label for="validationServer01">Event name</label>
      <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Event name"  name="eventname" required>
      <div class="valid-feedback">
        Looks good!
      </div>


      <label for="validationServer02">Event Description</label>
      <input type="text" name="eventdes" class="form-control is-valid" id="validationServer02" placeholder="Event Description"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
           <label for="validationServer02">Event Venue</label>
      <input type="text" name="eventvenue" class="form-control is-valid" id="validationServer02" placeholder="Event Venue"  required>
      <div class="valid-feedback">
        Looks good!
      </div>

        
      

      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    
  
      <label for="validationServer05">Zip</label>
      <input type="text" class="form-control is-valid" id="validationServer05" name="zipcode" placeholder="Zip" required>
    
    <div class="form-check">
      <input class="form-control is-valid" type="checkbox" value="" id="invalidCheck3" required>
      <label class="form-check-label" for="validCheck3">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  <button class="btn btn-primary" name="formevent" type="submit">Submit form</button>
</form>



<?php
	include("footer.php");?>

