<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php 	if (validation_errors()) { ?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
							<?= validation_errors() ?>
						</div>
					</div>
		<?php 	}
				if ($erro) { ?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
							<?= $erro ?>
						</div>
					</div>
		<?php 	} ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Login</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Usuario</label>
					<input type="text" class="form-control" id="username" name="login" placeholder="Seu login">
				</div>
				<div class="form-group">
					<label for="password">Senha</label>
					<input type="password" class="form-control" id="password" name="senha" placeholder="Sua senha">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Login">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->