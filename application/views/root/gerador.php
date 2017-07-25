<form name="form" method="post" id="form" class="form-horizontal" action="<?=base_url('Gerador/create')?>">
	<div class="col-xs-6 col-sm-4 col-md-2 facts">
		<label>Pasta</label>
		<input type="text" name="pasta">
	</div>
	<div class="col-xs-6 col-sm-4 col-md-2 facts">
		<label>Tabela</label>
		<?=$selectTabelas?>
	</div>
	<div>
		<input type="submit" value="Criar" />
	</div>
</form>