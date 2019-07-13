<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css') ?>" >

    <style type="text/css">
        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
            min-width: 20rem;
            padding: 2rem;
            width: 40rem;
            float: center;
        }
    </style>

    <title>Raffle</title>
  </head>
  <body>

      <div class="row justify-content-center">
          <div id="container">
          	<!-- Redirects to Raffle List -->
          	<a href="<?php echo base_url("/") ?>" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 1rem;">Back to Dashboard</a>
            <form style="margin: 2rem;" action="" method="post">


                <!-- This is for the raffle even name -->
                <div class="form-row">
                  <div class="form-group col-md-10">
                    <label for="eventName" style="font-size: 24px;"> <strong>Event Name</strong></label>
                    <input type="text" class="form-control" required name="event_name" value="<?php echo $raffle['raffle_event_name'] ?>" placeholder="Event Name">
                  </div>
                </div>

                <!-- Mecahnics of the raffle will be saved here -->
                <div class="form-row">
                  <div class="form-group col-md-10">
                    <label for="mechanics" style="font-size: 24px;"> <strong>Mechanics </strong></label>
                    <textarea class="form-control rounded-0" required name="mechanics" rows="3"> <?php echo $raffle['raffle_mechanics'] ?></textarea>
                  </div>
                </div>

                <!-- Determines the deadline of raffle. When the raffle will end. Format: MM/DD/YYYY HR:MIN-->
                <!--please make this time and date picker work -->
               
			   <div class="form-row">
                  <div class="form-group col-md-10">
                    <label for="eventName" style="font-size: 24px;"> <strong>Deadline</strong></label><br>
                    <input id="datetimepicker2" data-format="MM/dd/yyyy HH:mm PP" name="deadline" required value="<?php echo date("m/d/Y H:i:P",strtotime($raffle['raffle_deadline'])) ?>" type="text" >
                  </div>
                </div>
				
             
			 
                <br>

                <!-- This is where the prizes will be. It should be a CRUD. -->
                <p> <button type="button" id="add" class="btn btn-info">+ Add Prizes </button></p>
				
				<div id="paste">
					<?php foreach($prizes as $prize) { ?>
						
						<div class="form-group" id="<?php echo $prize['prize_id'] ?>" >
					  
						<div class="form-row">
						  <div class="col-auto">
							<input type="text" name="prize[<?php echo $prize['prize_id'] ?>][name]" value="<?php echo $prize['prize_name'] ?>" class="form-control" id="prizetype">
						  </div>
						  <div class="col-auto">
							<input type="number" name="prize[<?php echo $prize['prize_id'] ?>][quantity]" value="<?php echo $prize['prize_quantitiy'] ?>" class="form-control" id="prizeqty">
						  </div>
						  <div class="col-auto">
							<button type="button" data-id="#<?php echo $prize['prize_id'] ?>" class="btn btn-danger remove">Remove</button>
						  </div>
						</div>
					 
					</div>
					
					
					<?php } ?>
				</div>
			   
			   <div id="copy" style="display:none">
					<div class="form-group" id="--id--" >
					  
						<div class="form-row">
						  <div class="col-auto">
							<input type="text" name="prize[--id--][name]" class="form-control" id="prizetype">
						  </div>
						  <div class="col-auto">
							<input type="number" name="prize[--id--][quantity]" class="form-control" id="prizeqty">
						  </div>
						  <div class="col-auto">
							<button type="button" data-id="#--id--" class="btn btn-danger remove">Remove</button>
						  </div>
						</div>
					 
					</div>
				</div>
							<br>
							<br>
			            <center>
			              <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 20rem;">SAVE RAFFLE</button>
			              </center>
			</form>
          </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js" ></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js') ?>" crossorigin="anonymous"></script>
	
	 <script type="text/javascript">
                  $('#add').click(function(){
					  var date = new Date();
					  var id= date.getTime();
					  
					  var _html = $('#copy').html();
					  _html = _html.replace(/--id--/g, 'id_' + id);
					  $('#paste').append(_html);
					  
				  });
				  
				  $('#paste').on('click','.remove', function(){
						var id = $(this).data('id');
						console.log(id);
						$(id).remove();	
				  });
				  
				  $(function() {
                     $('#datetimepicker2').datetimepicker();
                  });
				  
				  
                </script>

  </body>
</html>