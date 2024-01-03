<?php
session_start();
include_once "./layouts/header2.php";
include_once "./controllers/chatcontroller.php";
include_once "./controllers/usercontroller.php";
include_once('./database/DB.php');
$chats = ChatController::read_whole_chat();
$users = UserController::list_users();

?>

<style>
	#display_chat {
		height: 48vh;
	}

	#display_users {
		height: 85vh;

	}

	#anchor {
		overflow-anchor: auto;
		height: 1px;
	}
</style>

<script>
	$(document).ready(function () {
		// Set trigger and container variables
		var trigger = $('.container #display_chat '),
			container = $('#content');
		// Fire on click
		trigger.on('click', function () {
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

<div class="container">
	<div class="row">

		<div class="bg-dark mt-3 p-3 rounded-lg col-9">
			<h2 class="text-light d-flex justify-content-center">Bienvenid@&nbsp;<span style="color:#dd7ff3;">
					<?php echo ucfirst($_SESSION['name']) . " " . ucfirst($_SESSION['surname']); ?>
				</span>!</h2>
			<h3 class="text-white d-flex justify-content-center">Chat general</h3>
			<div class="overflow-auto bg-dark mb-2" id="display_chat">

				<?php if (count($chats) > 0):
					foreach ($chats as $c):

						if ($_SESSION['ID'] == $c->user): ?>
							<div class="d-flex justify-content-end mx-3 mb-1">
								<p class="bg-warning rounded-lg p-3">
									<span class="font-weight-bold">
										<?php echo ucfirst($c->name) . " " . ucfirst($c->surname); ?> :
									</span>
									<?php echo $c->message; ?>
								</p>
							</div>
						<?php else: ?>
							<div class="d-flex justify-content-start mx-3 mb-1">
								<p class="bg-info rounded-lg p-3">
									<span class="font-weight-bold">
										<?php echo ucfirst($c->name) . " " . ucfirst($c->surname); ?> :
									</span>
									<?php echo $c->message; ?>
								</p>
							</div>
						<?php endif;
					endforeach; ?>

				<?php else: ?>
					<div class="message">
						<p class="bg-warning rounded-lg p-3 d-flex justify-content-center"> No hay ninguna conversación
							previa.
						</p>
					</div>
				<?php endif ?>

				<div id="chat_anchor"></div>
			</div>

			<form class="form-horizontal" method="post" action="./router/router.php">
				<div class="form-group d-flex justify-items-center p-2">
					<div class="col-sm-10">
						<textarea name="msg" class="form-control" id="message"
							placeholder="Ingresa tu mensaje aquí..."></textarea>
					</div>
					<div class="col-sm-2 p-2">
						<button type="submit" name="new_msg" value="new_msg"
							class="btn btn-primary form-control">Enviar</button>
					</div>
				</div>
			</form>
		</div>

		<div class="col-sm">
			<div class="overflow-auto bg-dark mt-3 p-3 rounded-lg" id="display_users">
				<?php foreach ($users as $u):
					if ($u->id != $_SESSION['ID']): ?>
						<form class="form-horizontal" method="get" action="./specific_chat.php">

							<input type="hidden" value="<?php echo $u->id; ?>" name="receiver_id">
							<input type="hidden" value="<?php echo $u->name; ?>" name="receiver_name">
							<input type="hidden" value="<?php echo $u->surname; ?>" name="receiver_surname">

							<button type="submit" name="contact_user" class="btn-block bg-success rounded-lg h p-2 mb-2"
								value="contact_user">
								<span class="text-white font-weight-bold">
									<?php echo ucfirst($u->name) . " " . ucfirst($u->surname) ?>
								</span>
								<div class="text-white">
									<?php echo ucfirst($u->department); ?>
								</div>
							</button>
						</form>

					<?php endif; endforeach; ?>
			</div>
		</div>
	</div>
</div>

<script>
	// Pin the chat scroll to bottom

	document.getElementById("chat_anchor").scrollIntoView({ block: "end" });

</script>


</body>

</html>