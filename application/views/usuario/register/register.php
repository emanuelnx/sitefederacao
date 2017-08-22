<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Registra-se</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Login</label>
					<input type="text" class="form-control" id="username" name="login" placeholder="Insira seu nome de usuario">
					<p class="help-block">Pelo menos 4 caracteres, letras ou números apenas</p>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Insira seu email">
					<p class="help-block">Um endereço de e-mail váido</p>
				</div>
				<div class="form-group">
					<label for="password">Senha</label>
					<input type="password" class="form-control" id="password" name="senha" placeholder="Insira sua senha">
					<p class="help-block">Pelo menos 6 caracteres</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirmação da senha</label>
					<input type="password" class="form-control" id="password_confirm" name="senha_confirm" placeholder="Confirme sua senha">
					<p class="help-block">Deve combinar sua senha</p>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Registrar">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->