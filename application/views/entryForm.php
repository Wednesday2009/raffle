<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>
        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
            min-width: 20rem;
            width: 60rem;
            padding: 3rem;
        }
	</style>
</head>
<body>
<div class="row justify-content-center">
<div id ="container">

<!-- Should be responsive to which this Event belongs to -->
<h1 style="margin-bottom: 1.5rem;">Event Name</h1>

	<form style="margin: 2rem;" enctype="multipart/form-data" action="" method="post">
	<!-- The photo to be shown here is the photo uploaded by the person who joins. -->
	<img id="profile-img-tag" width="200" height="200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16bd824232e%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16bd824232e%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2275.59375%22%20y%3D%22104.5609375%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="rounded float-right" alt="...">
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Email</label>
	      <input type="email" class="form-control" name="email" required placeholder="Email" style="width: 20rem;">
	    </div>
	  </div>

	  <!-- One raffle entry per phone number. Doesn't matter if a person has 2-3 cellphone numbers, as long as it is one entry per phone number -->
	  <div class="form-group">
	    <label for="cell_nos">Cellphone Number</label>
	    <input type="tel" class="form-control" name="phone_no" pattern='09\d{9}'  title="09XXXXXXXXX" required placeholder="09XXXXXXXXX" style="width: 20rem;">
	  </div>

	  <div class="form-group">
	    <label for="inputAddress2">First Name</label>
	    <input type="text" class="form-control" id="inputAddress2" required name="first_name" placeholder="First Name" style="width: 20rem;">
	    <br>
	    <label for="inputAddress2">Last Name</label>
	    <input type="text" class="form-control" placeholder="Last Name" required name="last_name" style="width: 20rem;">
	  </div>

		<div class="custom-file">
		  <input type="file" class="custom-file-input" id="customFile" name="image" required style="width: 20rem;">
		  <label class="custom-file-label" for="customFile">Choose file</label>
		</div>
		<br><br>
	<center>
		<!-- Once this button is clicked, it shoud redirect to a thank you page if all the deatils are successfully saved to database. -->
	  <button type="submit" class="btn btn-primary" style="width: 20rem;">Enter Raffle</button>
	</center>
	</form>
	
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#customFile").change(function(){
        readURL(this);
    });
</script>
</div>
</div>
</body>
</html>