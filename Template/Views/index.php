<?php
require_once('nav.php');
?>
<main class="py-5">
	<section id="listado" class="mb-5">
		<div class="container">

			<h3> Usuarios en el archivo sql: </h3>
			<h3> user@gmail.com 	123456 </h3>
			<h3> utn@gmail.com 		123456 </h3>

			<h2 class="mb-4">Login</h2>
			<form action="<?php echo FRONT_ROOT?>User/LogIn" method="post" class="bg-light-alpha p-5">
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" name="email" value="" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" value="" class="form-control">
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-dark ml-auto d-block">Login</button>
			</form>
		</div>
	</section>
</main>