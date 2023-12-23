<?php 
	session_start();
		include_once "./layouts/header2.php"; 
		include_once "./controllers/chatcontroller.php";
		include_once('./database/DB.php');
				$query = ChatController::read_whole_chat();
		?>
		
	<style>
		.display-chat{
			height:500px;
		}
	</style>
	
	<script>
		$(document).ready(function(){
		// Set trigger and container variables
			var trigger = $('.container .display-chat '),
				container = $('#content');
			// Fire on click
			trigger.on('click', function(){
				// Set $this for re-use. Set target from data attribute
				var $this = $(this),
				target = $this.data('target');       
				// Load target page into container
				container.load(target + '.php');
				// Stop normal link behavior
				return false;
			});
		});

	</script>
	
	<div class="container bg-dark mt-3 p-3 rounded-lg">
		<h2 class="text-light d-flex justify-content-center">Bienvenid@ &nbsp; <span style="color:#dd7ff3;"><?php echo $_SESSION['name']; ?> </span>!</h2>
		<h3 class="text-white d-flex justify-content-center">Chat general</h3>
		<div class="overflow-auto bg-dark mb-2 display-chat" id ="display-chat">
	
			<?php if(count($query) >0):
				foreach($query as $q):
				
					if($_SESSION['ID'] == $q->user): ?>
						<div class="d-flex justify-content-end mx-3 mb-1">
							<p class="bg-warning rounded-lg p-3">
								<span class="font-weight-bold"><?php echo $q->name; ?> :</span>
								<?php echo $q->message; ?>
							</p>
						</div>
					<?php else: ?>
						<div class="d-flex justify-content-start mx-3 mb-1">
							<p class="bg-info rounded-lg p-3">
								<span class="font-weight-bold"><?php echo $q->name; ?> :</span>
								<?php echo $q->message; ?>
							</p>
						</div>
					<?php endif; 
				endforeach; ?>
	
			<?php else: ?>
				<div class="message">
					<p class="bg-warning rounded-lg p-3 d-flex justify-content-center"> No hay ninguna conversación previa.</p>
				</div>
			<?php endif ?>
		</div>
		
		<form class="form-horizontal" method="post" action="./router/router.php">
			<div class="form-group d-flex justify-items-center p-2">
			<div class="col-sm-10">        
				<textarea name="msg" class="form-control" id="message" placeholder="Ingresa tu mensaje aquí..."></textarea>
			</div>  
			<div class="col-sm-2 p-2">
				<button type="submit" name="new_msg" value="new_msg" class="btn btn-primary form-control" >Enviar</button>
			</div>
			</div>
		</form>
	</div>
	
	
	</body>
	</html>
		

		
