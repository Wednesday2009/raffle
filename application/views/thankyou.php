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

<CENTER>
<!-- Should be responsive to which this Event belongs to -->
<h2 style="margin-bottom: 1.5rem;">THANK YOU FOR JOINING OUR RAFFLE!</h1>

   <a href="<?php echo base_url("/admin/raffleCreated/".$id) ?>" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 1rem;">Back to raffleCreated</a>
   
</CENTER>
</div>
</div>
</body>
</html>