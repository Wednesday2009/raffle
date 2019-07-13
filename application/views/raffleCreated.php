<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">

  .roulette_wrap{position:relative; float:left; overflow:hidden; width:30px; height:40px!important;  top:-120px;    margin: 0 2px;}
  .roulette img{width:22px;}
  .random{position:relative;}
  .roulette_wrap.digit0{margin-left:108px;}
  .winner-list p{font-size:20px}
        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
            min-width: 20rem;
            padding: 2rem;
            width: 50rem;
            float: center;
        }
        #contain{
           float: center;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
          }

          .container {
            color: #333;
            text-align: center;
          }

          h1 {
            font-weight: 2px;
          }

          h2 {
            font-weight: normal;
          }

          li {
            display: inline-block;
            font-size: 1.5em;
            list-style-type: none;
            padding: 1em;
            text-transform: uppercase;
          }

          li span {
            display: block;
            font-size: 4rem;
          }
          p{
            font-size: 2rem;
            font-weight: 5px;
          }
    </style>

    <title>Raffle</title>
  </head>
  <body>

      <div class="row justify-content-center">
          <div id="container">
            
            <!-- Redirects to Raffle List -->
            <a href="<?php echo base_url("/") ?>" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 1rem;">Back to Dashboard</a>

                <center>
                <br><br>
				
                <h1 style="margin-bottom: 1.5rem;"><?php echo $raffle['raffle_event_name'] ?></h1>

                <!-- This is the countdown timer based on deadline input on newRaffle -->
                <div class="contain">
                  <br>
                  <h2 style="margin-bottom: -3px;margin-top: 1rem; color: red;">COUNTDOWN BEFORE DEADLINE</h2>
                  <ul>
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
                    <li><span id="seconds"></span>Seconds</li>
                  </ul>
                </div>

				     <a href="<?php echo base_url("admin/entryForm/".$id) ?>"  class="btn btn-primary btn-lg btn-block push-right" style="width: 20rem;" >Entry Form</a>
				    

            <!-- Initially, the button [Draw Winner] here are do not appear, unless countdown timer is zero. The content below shall be populated/updated depending on the info input in newRaffle -->
            <center>
              <br>
              <br>

              <?php  foreach($prizes as $prize){
				  ?>
				
				<p style="margin-top: 1rem;"><?php echo $prize['prize_name'] ?> : <?php echo $prize['prize_quantitiy'] ?> </p>  
				
				<div class="winner-list" id="winner-list-<?php echo $prize['prize_id'] ?>">
				<?php if(isset($winners[$prize['prize_id']])){
  				foreach($winners[$prize['prize_id']] as $winner){
				?>
        <p><?php echo $winner['entry_firstname'] .' '. $winner['entry_lastname'] ?></p>	
				<?php 
					}
				}
				?>
				</div>
				<?php if(!isset($winners[$prize['prize_id']]) || ($prize['prize_quantitiy']> count($winners[$prize['prize_id']]) ) ) { ?>
				<button type="button" style="display:none" class="popups btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" data-prize_id="<?php echo $prize['prize_id'] ?>" >
					Draw Winner
                </button>
				
				<?php } ?>
				
				
				
			  <?php } ?> 
	
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="font-size: 24px;"><strong>Drawing Winner</h5>
                        <button type="button" class="close" onclick='window.location.reload()' data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					   <div class="random">
						<img src="<?php echo base_url('assets/images/') ?>webRaffle.png" height="200px" width="450px">
							<?php for($k=0;$k<9; $k++){ ?>
						
						<div class="roulette_wrap digit<?php echo $k ?>"> 
						<div class="roulette" style="display:none;"> 
							<?php for($i=0;$i<10; $i++){
								echo '<img src="'. base_url('assets/images/').$i.'-gold.png"/>';	
							} ?>
						</div> 
						</div> 

							<?php } ?>
						</div>
						
                        <h2 id="winner_name" ></h2>
                        <h3 id="winner_email" ></h3>
                      </div>
                    </div>
                  </div>
                </div>
            </center>

          </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	 <script src="<?php echo base_url('assets/js/roulette.js') ?>" crossorigin="anonymous"></script>
	
	
                <script type="text/javascript">
                const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

             //let countDown = new Date('Sep 30, 2019 00:00:00').getTime(),
                let countDown = new Date('<?php echo $raffle['raffle_deadline']?>').getTime(),
                x = setInterval(function() {

                  let now = new Date().getTime(),
                  distance = countDown - now;

        					if(distance<=0){
        						clearInterval(x);
      						
      						$('.popups').show();
                  distance=0;
      					}
                document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
                
                //if timer is reached, draw winner should be abled.
	
              }, second)
	



  var i = 0;
  var digits = [];
$('#exampleModalCenter').on('shown.bs.modal', function (e) {

	$('#winner_name').html('');
	$('#winner_email').html('');

 $('.random').hide();
	prize_id = $(e.relatedTarget).data('prize_id');

//------------------------------------------------------------//

        $.ajax({
          url:'<?php echo base_url('/admin/draw/') ?>'+prize_id,
          success: function(res){
            o = $.parseJSON(res);
            
            if(o.error){
              if(o.button =='hide'){
                  $(e.relatedTarget).hide();  
              }
              $('#winner_name').html(o.error);
              return;
            } 

            phone_no = o.data.entry_phone_no;
            console.log(phone_no);
            phone_no = phone_no.slice(2,11)
            
          
            $('.random').show();      
                    $('div.roulette').each(function(k){
                      
                      speed = Math.floor(Math.random() * 5);
                      stopImageNumber = phone_no[k];//Math.floor(Math.random() * 10);
                      
                      var option = {
                        speed : speed ,
                        duration : 3,
                        stopImageNumber : stopImageNumber,
                        startCallback : function() {
                          //console.log('start');
                        },
                        slowDownCallback : function() {
                          //console.log('slowDown');
                        },
                        stopCallback : function($stopElm) {
                          i++;
                          
                          if(i%9  == 0){
                          $('#winner_name').html(o.data.entry_firstname+' '+o.data.entry_lastname);
                          $('#winner_email').html(o.data.entry_email);
                          $('#winner-list-'+prize_id).html(o.html);
                          }
                          
                        }
                      }
                      
                      
if(digits[k] === undefined){
  
                      digits[k] = $(this).roulette();
                      
                      
                      
                      digits[k].roulette('option',option)
                      digits[k].roulette('start')
}else{
  
  digits[k].roulette('option',{stopImageNumber : option.stopImageNumber});
                      digits[k].roulette('start')
  
}                     
                      
                    });

    }
        });
  

})

  </script>

  </body>
</html>