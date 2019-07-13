<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
            min-width: 30rem;
            width: 60rem;
            padding: 3rem;
        }
    </style>

    <title>Raffle</title>
  </head>
  <body>

<div class="row justify-content-center">
    <div id="container">
      <!-- If this button is clicked it should go to the page newRaffle -->
        <a href="<?php echo base_url("admin/newRaffle") ?>"  class="btn btn-primary btn-lg btn-block" style="width: 20rem;" >Create New Raffle Event</a>
       

        <!-- These are raffle event cards that are all created whenever a new raffle event is created. The card title is the raffle event name. If check raffle button is clicked it should go to the raffle's respective raffleCreated.php-->
        <div class="card" style="margin: 2rem; margin-left: 0;">
          <div class="card-header">Raffles</div>
          <div class="card-body">
            <?php foreach($raffles as $raffle): ?>
			<h5 class="card-title"><?php echo $raffle['raffle_event_name'] ?></h5>
				
				<a href="<?php echo base_url('admin/raffleCreated/'.$raffle['raffle_event_id']) ?>" class="btn btn-primary">Check Raffle</a>
				<a href="<?php echo base_url('admin/newRaffle/'.$raffle['raffle_event_id']) ?>" class="btn btn-success">Edit Raffle</a>
				<a href="<?php echo base_url('admin/removeRaffle/'.$raffle['raffle_event_id']) ?>" class="btn btn-danger">Remove Raffle</a>
			</a>
			<hr>
			<?php endforeach; ?>
			
          </div>
        </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>